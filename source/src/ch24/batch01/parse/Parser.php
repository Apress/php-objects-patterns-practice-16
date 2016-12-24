<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.07 */
abstract class Parser
{
    const GIP_RESPECTSPACE = 1;

    protected $respectSpace = false;
    protected static $debug = false;
    protected $discard = false;
    protected $name;
    private static $count = 0;

    public function __construct(string $name = null, $options = [])
    {
        if (is_null($name)) {
            self::$count++;
            $this->name = get_class($this) . " (" . self::$count . ")";
        } else {
            $this->name = $name;
        }

        if (isset($options[self::GIP_RESPECTSPACE])) {
            $this->respectSpace=true;
        }
    }

    protected function next(Scanner $scanner)
    {
        $scanner->nextToken();

        if (! $this->respectSpace) {
            $scanner->eatWhiteSpace();
        }
    }

    public function spaceSignificant(bool $bool)
    {
        $this->respectSpace = $bool;
    }

    public static function setDebug(bool $bool)
    {
        self::$debug = $bool;
    }

    public function setHandler(Handler $handler)
    {
        $this->handler = $handler;
    }

    final public function scan(Scanner $scanner): bool
    {
        if ($scanner->tokenType() == Scanner::SOF) {
            $scanner->nextToken();
        }

        $ret = $this->doScan($scanner);

        if ($ret && ! $this->discard && $this->term()) {
            $this->push($scanner);
        }

        if ($ret) {
            $this->invokeHandler($scanner);
        }

        if ($this->term() && $ret) {
            $this->next($scanner);
        }

        $this->report("::scan returning $ret");

        return $ret;
    }

    public function discard()
    {
        $this->discard = true;
    }

    abstract public function trigger(Scanner $scanner): bool;

    public function term(): bool
    {
        return true;
    }

// private/protected

    protected function invokeHandler(Scanner $scanner)
    {
        if (! empty($this->handler)) {
            $this->report("calling handler: " . get_class($this->handler));
            $this->handler->handleMatch($this, $scanner);
        }
    }

    protected function report($msg)
    {
        if (self::$debug) {
            print "<{$this->name}> " . get_class($this) . ": $msg\n";
        }
    }

    protected function push(Scanner $scanner)
    {
        $context = $scanner->getContext();
        $context->pushResult($scanner->token());
    }

    abstract protected function doScan(Scanner $scan): bool;
}
