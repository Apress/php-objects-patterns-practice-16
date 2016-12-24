<?php
declare(strict_types = 1);

namespace popp\ch12\batch05;

/* listing 12.11 */
class ApplicationHelper
{
    private $config = __DIR__ . "/data/woo_options.ini";
    private $reg;

    public function __construct()
    {
        $this->reg = Registry::instance();
    }

    public function init()
    {
        $this->setupOptions();

        if (isset($_SERVER['REQUEST_METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }

        $this->reg->setRequest($request);
    }

    private function setupOptions()
    {
        if (! file_exists($this->config)) {
            throw new AppException("Could not find options file");
        }

        $options = parse_ini_file($this->config, true);

        $conf = new Conf($options['config']);
        $this->reg->setConf($conf);

        $commands = new Conf($options['commands']);
        $this->reg->setCommands($commands);
    }
}
/* /listing 12.11 */
