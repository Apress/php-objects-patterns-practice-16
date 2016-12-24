<?php
declare(strict_types=1);
namespace popp\ch08\batch02;

/* listing 08.14 */
class MailNotifier extends Notifier
{
    public function inform($message)
    {
        print "MAIL notification: {$message}\n";
    }
}
/* /listing 08.14 */
