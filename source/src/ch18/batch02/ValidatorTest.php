<?php
declare(strict_types = 1);

/* listing 18.07 */
namespace popp\ch18\batch02;

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

/* /listing 18.07 */
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

/* listing 18.09 */

// ValidatorTest

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
    }
/* /listing 18.09 */
/* listing 18.07 */
}
/* /listing 18.07 */
