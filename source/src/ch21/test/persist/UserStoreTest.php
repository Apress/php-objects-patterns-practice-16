<?php
declare(strict_types = 1);

namespace userthing\persist;

class UserStoreTest extends \PHPUnit_Framework_TestCase
{
    private $store;

    public function setUp()
    {
        $this->store = new UserStore();
    }

    public function testAddUserShortPass2()
    {
        try {
            $this->store->addUser("bob williams", "bob@example.com", "ff");
            $this->fail("Short password exception expected");
        } catch (\Exception $e) {
        }
        // ...
    }

    public function testAddUserShortPass()
    {
        $this->setExpectedException('\\Exception');
        $this->store->addUser("bob williams", "a@b.com", "ff");
        $this->fail("Short password exception expected");
    }

    public function testAddUserDuplicate()
    {
        try {
            $ret = $this->store->addUser("bob williams", "a@b.com", "123456");
            $ret = $this->store->addUser("bob stevens", "a@b.com", "123456");
            self::fail("Exception should have been thrown");
        } catch (\Exception $e) {
            $const = $this->logicalAnd(
                //$this->logicalNot( $this->contains("bob stevens")),
                    $this->isType('object')
            );
            self::AssertThat($this->store->getUser("a@b.com"), $const);
        }
    }


// UserStoreTest

    public function testGetUser()
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");
        $this->assertEquals($user->getMail(), "a@b.com");
    }
}
