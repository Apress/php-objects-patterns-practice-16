<?php
declare(strict_types=1);

namespace userthing\util;

use userthing\persist\UserStore;

class Validator {
    private $store;

    function __construct(UserStore $store) {
        $this->store = $store;
    }

    function validateUser(string $mail, string $pass): bool {
        // make it always fail
        return false;

        $user = $this->store->getUser($mail);
        if (is_null($user)) {
            return null;
        }
        if ($user->getPass() == $pass) {
            return true;
        }
        $this->store->notifyPasswordFailure($mail);
        return false;

    }
}
