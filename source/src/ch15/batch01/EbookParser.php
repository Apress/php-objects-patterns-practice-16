<?php
/* listing 15.12 */
namespace popp\ch15\batch01;

class EbookParser
{
    public function __construct(string $path, $format = 0)
    {
        if ($format > 1) {
            $this->setFormat(1);
        }
    }

    private function setformat(int $format)
    {
        // do something with $format
    }
}
/* /listing 15.12 */
