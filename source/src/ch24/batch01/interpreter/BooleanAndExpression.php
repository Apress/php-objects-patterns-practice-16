<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\interpreter;

class BooleanAndExpression extends OperatorExpression
{
    protected function doInterpret(
        InterpreterContext $context,
        $result_l,
        $result_r
    ) {
        $context->replace($this, $result_l && $result_r);
    }
}
