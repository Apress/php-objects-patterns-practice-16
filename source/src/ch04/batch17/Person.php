<?php
declare(strict_types=1);

namespace popp\ch04\batch17;

/* listing 04.73 */
class Person
{
    private $myname;
    private $myage;

    public function __set(string $property, $value)
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }
/* /listing 04.73 */
/* listing 04.74 */
    public function __unset(string $property)
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method(null);
        }
    }
/* /listing 04.74 */
/* listing 04.73 */

    public function setName(string $name)
    {
        $this->myname = $name;
        if (! is_null($name)) {
            $this->myname = strtoupper($this->myname);
        }
    }

    public function setAge(int $age)
    {
        $this->myage = $age;
    }
}
/* /listing 04.73 */
