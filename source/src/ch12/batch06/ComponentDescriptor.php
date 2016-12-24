<?php
declare(strict_types = 1);

namespace popp\ch12\batch06;

/* listing 12.22 */
class ComponentDescriptor
{
    private $path;
    private static $refcmd;
    private $cmdstr;

    public function __construct(string $path, string $cmdstr)
    {
        self::$refcmd = new \ReflectionClass(Command::class);
        $this->path = $path;
        $this->cmdstr = $cmdstr;
    }

    public function getCommand(): Command
    {
        return $this->resolveCommand($this->cmdstr);
    }

    public function setView(int $status, ViewComponent $view)
    {
        $this->views[$status] = $view;
    }

    public function getView(Request $request): ViewComponent
    {
        $status = $request->getCmdStatus();
        $status = (is_null($status)) ? 0 : $status;

        if (isset($this->views[$status])) {
            return $this->views[$status];
        }

        if (isset($this->views[0])) {
            return $this->views[0];
        }

        throw new AppException("no view found");
    }

    public function resolveCommand(string $class): Command
    {
        if (is_null($class)) {
            throw new AppException("unknown class '$class'");
        }

        if (! class_exists($class)) {
            throw new AppException("class '$class' not found");
        }

        $refclass = new \ReflectionClass($class);

        if (! $refclass->isSubClassOf(self::$refcmd)) {
            throw new AppException("command '$class' is not a Command");
        }

        return $refclass->newInstance();
    }
}
/* /listing 12.22 */
