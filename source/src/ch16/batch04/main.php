<?php

require_once(__DIR__."/vendor/autoload.php");

use popp5\megaquiz\command\CommandContext;
use popp5\megaquiz\command\LoginCommand;
use popp5\megaquiz\quiztools\AccessManager;

$context = new CommandContext("megaquiz");
$context->addParam("username", "bob");
$context->addParam("pass", "tiddles");
$cmd = new LoginCommand(new AccessManager());
if (! $cmd->execute($context)) {
    print "an error occurred: ".$context->getError();
} else {
    print "successful login\n";
    $user_obj = $context->get("user");
}
