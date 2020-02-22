<?php


namespace todo;


class Registry
{
    use TSingleton;

    public static $properties = [];

    public function getProperties()
    {
        return self::$properties;
    }

    public function setProper($name, $date)
    {
        self::$properties[$name] = $date;
    }

    public function getProper($name)
    {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return false;
    }


}