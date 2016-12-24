<?php
declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.48 */
class FtpModule implements Module
{
    public function setHost($host)
    {
        print "FtpModule::setHost(): $host\n";
    }

    public function setUser($user)
    {
        print "FtpModule::setUser(): $user\n";
    }

    public function execute()
    {
        // do things
    }
}
