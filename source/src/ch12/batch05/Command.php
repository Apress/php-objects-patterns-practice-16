<?php
declare(strict_types = 1);

namespace popp\ch12\batch05;

/* listing 12.14 */
abstract class Command
{
    final public function __construct()
    {
    }

    public function execute(Request $request)
    {
        $this->doExecute($request);
    }

    abstract public function doExecute(Request $request);
}
/* /listing 12.14 */
