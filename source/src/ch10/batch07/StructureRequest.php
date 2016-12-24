<?php
declare(strict_types = 1);

namespace popp\ch10\batch07;

/* listing 10.34 */
class StructureRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        print __CLASS__ . ": structuring request data\n";
        $this->processrequest->process($req);
    }
}
