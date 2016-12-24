<?php

namespace popp\ch11\batch01;

class Runner
{
    public static function run()
    {
/* listing 11.04 */
        $context = new InterpreterContext();
        $literal = new LiteralExpression('four');
        $literal->interpret($context);
        print $context->lookup($literal) . "\n";
/* /listing 11.04 */
    }


    public static function run2()
    {
/* listing 11.06 */
        $context = new InterpreterContext();
        $myvar = new VariableExpression('input', 'four');
        $myvar->interpret($context);
        print $context->lookup($myvar) . "\n";
        // output: four

        $newvar = new VariableExpression('input');
        $newvar->interpret($context);
        print $context->lookup($newvar) . "\n";
        // output: four

        $myvar->setValue("five");
        $myvar->interpret($context);
        print $context->lookup($myvar) . "\n";
        // output: five
        print $context->lookup($newvar) . "\n";
        // output: five
/* /listing 11.06 */
    }

    public static function run3()
    {
/* listing 11.11 */
        $context = new InterpreterContext();
        $input = new VariableExpression('input');
        $statement = new BooleanOrExpression(
            new EqualsExpression($input, new LiteralExpression('four')),
            new EqualsExpression($input, new LiteralExpression('4'))
        );
/* /listing 11.11 */

/* listing 11.12 */
        foreach (array( "four", "4", "52" ) as $val) {
            $input->setValue($val);
            print "$val:\n";
            $statement->interpret($context);
            if ($context->lookup($statement)) {
                print "top marks\n\n";
            } else {
                print "dunce hat on\n\n";
            }
        }
/* /listing 11.12 */
    }
}
