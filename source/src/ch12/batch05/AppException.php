<?php
declare(strict_types = 1);

namespace popp\ch12\batch05;

class AppException extends \Exception
{
    public function __construct($msg = "", $code = 0, $previous = null)
    {
        parent::__construct($msg, $code, $previous);
    }
}
