<?php
declare(strict_types = 1);

namespace popp\ch09\batch05;

abstract class Preferences
{
    private $props = [];
    private static $mockmode = false;
    private static $instance=null;

    private function __construct()
    {
    }

    public static function mockmode($which = true)
    {
        self::$mockmode = $which;
        self::$instance=null;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = (self::$mockmode)? new PreferencesMock(): new PreferencesImpl();
        }
        return self::$instance;
    }

    abstract public function getDsn();
    // ...
}
