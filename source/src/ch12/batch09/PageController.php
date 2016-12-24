<?php
declare(strict_types = 1);

namespace popp\ch12\batch09;

use popp\ch12\batch06\Registry;
use popp\ch12\batch06\Request;
use popp\ch12\batch06\HttpRequest;
use popp\ch12\batch08\CliRequest;

abstract class PageController
{
    abstract public function process();

    public function init()
    {
        $reg = Registry::instance();

        if (isset($_SERVER['REQUEST_METHOD'])) {
            $request = new HttpRequest();
        } else {
            $request = new CliRequest();
        }

        $reg->setRequest($request);
    }

    public function forward(string $resource)
    {
        $request = $this->getRequest();
        $request->forward($resource);
    }

/* listing 12.38 */
    public function render(string $resource, Request $request)
    {
        $vh = new ViewHelper();
        // now the template will have the $vh variable
        include($resource);
    }
/* /listing 12.38 */

    public function getRequest()
    {
        $reg = Registry::instance();
        return $reg->getRequest();
    }
}
