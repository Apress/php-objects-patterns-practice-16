<?php
declare(strict_types = 1);

namespace popp\ch12\batch06;

/* listing 12.26 */
class ForwardViewComponent implements ViewComponent
{
    private $path = null;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function render(Request $request)
    {
        $request->forward($this->path);
    }
}
/* /listing 12.26 */
