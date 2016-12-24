<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\marklogic;

use popp\ch24\batch01\parse\Context;
use popp\ch24\batch01\parse\Scanner;
use popp\ch24\batch01\parse\Parser;
use popp\ch24\batch01\parse\StringReader;
use popp\ch24\batch01\parse\SequenceParse;
use popp\ch24\batch01\parse\AlternationParse;
use popp\ch24\batch01\parse\RepetitionParse;
use popp\ch24\batch01\parse\WordParse;
use popp\ch24\batch01\parse\StringLiteralParse;
use popp\ch24\batch01\parse\CharacterParse;

use popp\ch24\batch01\interpreter\InterpreterContext;
use popp\ch24\batch01\interpreter\VariableExpression;

/* listing 24.15 */
class MarkParse
{
    private $expression;
    private $operand;
    private $interpreter;
    private $context;

    public function __construct($statement)
    {
        $this->compile($statement);
    }

    public function evaluate($input)
    {
        $icontext = new InterpreterContext();
        $prefab = new VariableExpression('input', $input);
        // add the input variable to Context
        $prefab->interpret($icontext);

        $this->interpreter->interpret($icontext);
        $result = $icontext->lookup($this->interpreter);

        return $result;
    }

    public function compile($statementStr)
    {
        // build parse tree
        $context = new Context();
        $scanner = new Scanner(new StringReader($statementStr), $context);
        $statement = $this->expression();
        $scanresult = $statement->scan($scanner);

        if (! $scanresult || $scanner->tokenType() != Scanner::EOF) {
            $msg  = "";
            $msg .= " line: {$scanner->line_no()} ";
            $msg .= " char: {$scanner->char_no()}";
            $msg .= " token: {$scanner->token()}\n";
            throw new Exception($msg);
        }

        $this->interpreter = $scanner->getContext()->popResult();
    }

    public function expression(): Parser
    {
        if (! isset($this->expression)) {
            $this->expression = new SequenceParse();
            $this->expression->add($this->operand());
            $bools = new RepetitionParse();
            $whichbool = new AlternationParse();
            $whichbool->add($this->orExpr());
            $whichbool->add($this->andExpr());
            $bools->add($whichbool);
            $this->expression->add($bools);
        }

        return $this->expression;
    }

    public function orExpr(): Parser
    {
        $or = new SequenceParse();
        $or->add(new WordParse('or'))->discard();
        $or->add($this->operand());
        $or->setHandler(new BooleanOrHandler());

        return $or;
    }

    public function andExpr(): Parser
    {
        $and = new SequenceParse();
        $and->add(new WordParse('and'))->discard();
        $and->add($this->operand());
        $and->setHandler(new BooleanAndHandler());

        return $and;
    }

    public function operand(): Parser
    {
        if (! isset($this->operand)) {
            $this->operand = new SequenceParse();
            $comp = new AlternationParse();
            $exp = new SequenceParse();
            $exp->add(new CharacterParse('('))->discard();
            $exp->add($this->expression());
            $exp->add(new CharacterParse(')'))->discard();
            $comp->add($exp);
            $comp->add(new StringLiteralParse())
                ->setHandler(new StringLiteralHandler());
            $comp->add($this->variable());
            $this->operand->add($comp);
            $this->operand->add(new RepetitionParse())->add($this->eqExpr());
        }

        return $this->operand;
    }

    public function eqExpr(): Parser
    {
        $equals = new SequenceParse();
        $equals->add(new WordParse('equals'))->discard();
        $equals->add($this->operand());
        $equals->setHandler(new EqualsHandler());

        return $equals;
    }

    public function variable(): Parser
    {
        $variable = new SequenceParse();
        $variable->add(new CharacterParse('$'))->discard();
        $variable->add(new WordParse());
        $variable->setHandler(new VariableHandler());

        return $variable;
    }
}
