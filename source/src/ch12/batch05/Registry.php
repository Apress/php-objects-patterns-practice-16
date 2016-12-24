<?php
declare(strict_types = 1);

namespace popp\ch12\batch05;

//use popp\ch18\batch04\woo\controller\ApplicationHelper;
//
class Registry
{
    private $values = [];
    private static $instance = null;
    private $request = null;
    private $conf = null;
    private $commands = null;
    private $applicationHelper = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

/* listing 12.12 */
    // must be initialized by some smarter component
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            throw new \Exception("No Request set");
        }

        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper)) {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    public function setConf(Conf $conf)
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }

        return $this->conf;
    }

    public function setCommands(Conf $commands)
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        return $this->commands;
    }

/* /listing 12.12 */
    public function getDSN()
    {
        $conf = $this->getConf();

        return $conf->get("dsn");
    }
}
