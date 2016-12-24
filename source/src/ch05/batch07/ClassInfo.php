<?php
declare(strict_types=1);

namespace popp\ch05\batch07;

class ClassInfo
{

/* listing 05.36 */
    // class ClassInfo

    public static function getData(\ReflectionClass $class)
    {
        $details = "";
        $name = $class->getName();
        if ($class->isUserDefined()) {
            $details .= "$name is user defined\n";
        }
        if ($class->isInternal()) {
            $details .= "$name is built-in\n";
        }
        if ($class->isInterface()) {
            $details .= "$name is interface\n";
        }
        if ($class->isAbstract()) {
            $details .= "$name is an abstract class\n";
        }
        if ($class->isFinal()) {
            $details .= "$name is a final class\n";
        }
        if ($class->isInstantiable()) {
            $details .= "$name can be instantiated\n";
        } else {
            $details .= "$name can not be instantiated\n";
        }

        if ($class->isCloneable()) {
            $details .= "$name can be cloned\n";
        } else {
            $details .= "$name can not be cloned\n";
        }
        return $details;
    }
/* /listing 05.36 */


/* listing 05.41 */

    // class ClassInfo
    public static function methodData(\ReflectionMethod $method)
    {
        $details = "";
        $name = $method->getName();
        if ($method->isUserDefined()) {
            $details .= "$name is user defined\n";
        }
        if ($method->isInternal()) {
            $details .= "$name is built-in\n";
        }
        if ($method->isAbstract()) {
            $details .= "$name is abstract\n";
        }
        if ($method->isPublic()) {
            $details .= "$name is public\n";
        }
        if ($method->isProtected()) {
            $details .= "$name is protected\n";
        }
        if ($method->isPrivate()) {
            $details .= "$name is private\n";
        }
        if ($method->isStatic()) {
            $details .= "$name is static\n";
        }
        if ($method->isFinal()) {
            $details .= "$name is final\n";
        }
        if ($method->isConstructor()) {
            $details .= "$name is the constructor\n";
        }
        if ($method->returnsReference()) {
            $details .= "$name returns a reference (as opposed to a value)\n";
        }
        return $details;
    }
/* /listing 05.41 */

/* listing 05.45 */

    // class ClassInfo
    public function argData(\ReflectionParameter $arg)
    {
        $details = "";
        $declaringclass = $arg->getDeclaringClass();
        $name  = $arg->getName();
        $class = $arg->getClass();
        $position = $arg->getPosition();
        $details .= "\$$name has position $position\n";
        if (! empty($class)) {
            $classname = $class->getName();
            $details .= "\$$name must be a $classname object\n";
        }
      
        if ($arg->isPassedByReference()) {
            $details .= "\$$name is passed by reference\n";
        }

        if ($arg->isDefaultValueAvailable()) {
            $def = $arg->getDefaultValue();
            $details .= "\$$name has default: $def\n";
        }

        if ($arg->allowsNull()) {
            $details .= "\$$name can be null\n";
        }

        return $details;
    }
/* /listing 05.45 */
}
