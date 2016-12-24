<?php
/* listing 18.19 */
namespace popp\ch18\batch04;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;

class SeleniumTest2 extends \PHPUnit_Framework_TestCase
{
    private $driver;

    protected function setUp()
    {
        $host = "http://127.0.0.1:4444/wd/hub";
        $capabilities = [WebDriverCapabilityType::BROWSER_NAME => 'firefox'];
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }

    public function testAddVenue()
    {
    }
}
