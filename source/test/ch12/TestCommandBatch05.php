<?php
declare(strict_types=1);

namespace popp\test\ch12;

use popp\ch12\batch05\Command;
use popp\ch12\batch05\Request;

class TestCommandBatch05 extends Command {
    public function doExecute(Request $request): int
    {
        // do nothing
        return Command::CMD_DEFAULT;
    }
}
