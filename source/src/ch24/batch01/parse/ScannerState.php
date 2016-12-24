<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.02 */
class ScannerState
{
    public $line_no;
    public $char_no;
    public $token;
    public $token_type;
    public $r;
}
