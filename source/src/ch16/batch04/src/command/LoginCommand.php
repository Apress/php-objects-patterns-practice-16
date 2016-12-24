<?php

namespace popp5\megaquiz\command;

use popp5\megaquiz\quiztools\ReceiverFactory;

/**
 * @license   http://www.example.com Borsetshire Open License
 * @package   command
 */

/**
 * @package command
 */
class LoginCommand extends Command
{

    public function execute(CommandContext $context)
    {
        $manager = ReceiverFactory::getAccessManager();
        $user = $context->get('username');
        $pass = $context->get('pass');
        $user = $manager->login($user, $pass);
        if (! $user) {
            $this->context->setError($manager->getError());
            return false;
        }
        $context->addParam("user", $user);
        return true;
    }
}
