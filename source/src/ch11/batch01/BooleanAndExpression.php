<?php
declare(strict_types = 1);

namespace popp\ch11\batch01;

/* listing 11.10 */
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
