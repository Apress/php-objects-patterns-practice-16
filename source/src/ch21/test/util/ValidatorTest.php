<?php
declare(strict_types = 1);

namespace userthing\util;

use userthing\persist\UserStore;
use userthing\domain\User;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    public function setUp()
    {
        $store = new UserStore();
        $store->addUser("bob williams", "bob@example.com", "12345");
        $this->validator = new Validator($store);
    }

    public function tearDown()
    {
    }

    public function testValidateCorrectPass()
    {
        $this->assertTrue(
            $this->validator->validateUser("bob@example.com", "12345"),
            "Expecting successful validation"
        );
    }

    public function testValidateFalsePassFirst()
    {
        $store = $this->createMock("\\userthing\\persist\\UserStore");
        $this->validator = new Validator($store);

        $store->expects($this->once())
              ->method('notifyPasswordFailure')
              ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
              ->method("getUser")
              ->will($this->returnValue(new User("bob williams", "bob@example.com", "right")));

        $this->validator->validateUser("bob@example.com", "wrong");
    }
}
