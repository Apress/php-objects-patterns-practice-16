<?php
declare(strict_types = 1);

namespace popp\ch12\batch06;

/* listing 12.24 */
interface ViewComponent
{
    public function render(Request $request);
}
/* /listing 12.24 */
