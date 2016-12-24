<?php
declare(strict_types = 1);

namespace popp\ch11\batch05;

/* listing 11.24 */
interface Observable
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}
