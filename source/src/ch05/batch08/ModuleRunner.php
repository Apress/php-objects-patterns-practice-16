<?php
declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.50 */
class ModuleRunner
{
    private $configData = [
        "popp\\ch05\\batch08\\PersonModule" => ['person' => 'bob'],
        "popp\\ch05\\batch08\\FtpModule"    => [
            'host' => 'example.com',
            'user' => 'anon'
        ]
    ];

    private $modules = [];

    // ...
/* /listing 05.50 */
/* listing 05.51 */

    // class ModuleRunner
    public function init()
    {
        $interface = new \ReflectionClass('popp\\ch05\\batch08\\Module');
        foreach ($this->configData as $modulename => $params) {
            $module_class = new \ReflectionClass($modulename);
            if (! $module_class->isSubclassOf($interface)) {
                throw new Exception("unknown module type: $modulename");
            }
            $module = $module_class->newInstance();
            foreach ($module_class->getMethods() as $method) {
                $this->handleMethod($module, $method, $params);
                // we cover handleMethod() in a future listing!
            }
            array_push($this->modules, $module);
        }
    }
/* /listing 05.51 */

/* listing 05.53 */

    // class ModuleRunner
    public function handleMethod(Module $module, \ReflectionMethod $method, $params)
    {
        $name = $method->getName();
        $args = $method->getParameters();

        if (count($args) != 1 || substr($name, 0, 3) != "set" ) {
            return false;
        }

        $property = strtolower(substr($name, 3));

        if (! isset($params[$property])) {
            return false;
        }

        $arg_class = $args[0]->getClass();

        if (empty($arg_class)) {
            $method->invoke($module, $params[$property]);
        } else {
            $method->invoke(
                $module,
                $arg_class->newInstance($params[$property])
            );
        }
    }
/* /listing 05.53 */

/* listing 05.50 */
}
/* /listing 05.50 */
