<?php
declare(strict_types = 1);

namespace popp\ch12\batch06;

/* listing 12.25 */
class TemplateViewComponent implements ViewComponent
{
    private $name = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render(Request $request)
    {
        $reg = Registry::instance();
        $conf = $reg->getConf();
        $path = $conf->get("templatepath");

        if (is_null($path)) {
            throw new AppException("no template directory");
        }

        $fullpath = "{$path}/{$this->name}.php";

        if (! file_exists($fullpath)) {
            throw new AppException("no template at {$fullpath}");
        }

        include($fullpath);
    }
}
/* /listing 12.25 */
