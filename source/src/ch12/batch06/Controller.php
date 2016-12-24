<?php
declare(strict_types = 1);

namespace popp\ch12\batch06;

class Controller
{
    private $reg;
/* listing 12.19 */
    // Controller
    private function __construct()
    {
        $this->reg = Registry::instance();
    }

    private function handleRequest()
    {
        $request = $this->reg->getRequest();
        $controller = new AppController();
        $cmd = $controller->getCommand($request);
        $cmd->execute($request);
        $view = $controller->getView($request);
        $view->render($request);
    }
/* /listing 12.19 */

    public static function run()
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }

    private function init()
    {
        $this->reg->getApplicationHelper()->init();
    }
}
