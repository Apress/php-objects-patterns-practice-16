<?php
declare(strict_types = 1);

/* listing 18.16 */
namespace popp\ch18\batch04;

use popp\ch18\batch04\woo\controller\Controller;
use popp\ch18\batch04\woo\controller\Request;
use popp\ch18\batch04\woo\base\ApplicationRegistry;
use popp\ch18\batch04\woo\controller\ApplicationHelper;

class AddVenueTest extends \PHPUnit_Framework_TestCase
{
    public function testAddVenueVanilla()
    {
        $this->runCommand("AddVenue", ["venue_name"=>"bob"]);
    }

    public function runCommand($command = null, array $args = null)
    {
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();
        $request = ApplicationRegistry::getRequest();

        if (! is_null($args)) {
            foreach ($args as $key => $val) {
                $request->setProperty($key, $val);
            }
        }

        if (! is_null($command)) {
            $request->setProperty('cmd', $command);
        }

        woo\controller\Controller::run();
    }
}
