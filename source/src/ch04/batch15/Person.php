<?php
declare(strict_types=1);

namespace popp\ch04\batch15;

/* listing 04.71 */
class Person
{
    public function __get(string $property)
    {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

/* /listing 04.71 */
/* listing 04.72 */
    public function __isset(string $property)
    {
        $method = "get{$property}";
        return (method_exists($this, $method));
    }
/* /listing 04.72 */
/* listing 04.71 */
    public function getName(): string
    {
        return "Bob";
    }

    public function getAge(): int
    {
        return 44;
    }
}
/* /listing 04.71 */
