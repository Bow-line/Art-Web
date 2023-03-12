<?php


class Session
{
    public static function addTemp($name, $value)
    {
        if(!is_array($_SESSION['tmp']))
        {
            $_SESSION['tmp'] = [];
        }

        $_SESSION['tmp'][$name] = $value;
    }

    public static function flushTemp()
    {
        unset($_SESSION['tmp']);
    }
}
