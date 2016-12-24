<?php
declare(strict_types = 1);

namespace popp\ch18\batch03;

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
        $store = $this->getMock(__NAMESPACE__ . "\\UserStore");
        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue([
                "name" => "bob@example.com",
                "pass" => "right"
            ]));

        $this->validator->validateUser("bob@example.com", "wrong");
    }

    public function testValidateFalsePass()
    {
        $store = $this->getMock(__NAMESPACE__ . "\\UserStore");
        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->equalTo('bob@example.com'));

        $store->expects($this->any())
            ->method("getUser")
            ->will($this->returnValue([
                "name" => "bob williams",
                "mail" => "bob@example.com",
                "pass" => "right"
            ]));

        $this->validator->validateUser("bob@example.com", "wrong");
/*
        $store = $this->getMock("UserStore");
        $store->expects( $this->once() )
              ->method('notifyPasswordFailure');
        //$store->expects( $this->at( 1 ) ) // raise bug
        $store->expects( $this->once( ) )
              ->method("getUser")
              ->with( $this->equalTo('henry') );
*/
        //$store->getUser("bob@bob.com");
    }
}
