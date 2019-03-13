<?php

namespace App\Session;

class Session
{
    public static function exists($key)
    {
        return (isset($_SESSION[$key])) ? true : false;
    }

    public static function unserialize($objName)
    {
        $object = unserialize($_SESSION[$objName]);
        return $object[0];
    }

    public static function set($key, $value = null)
    {
        if(is_array($key)) {
			foreach($key as $sessionKey => $sessionValue) {
				$_SESSION[$sessionKey] = $sessionValue;
			}
			return;
        }

		$_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (self::exists($key)) {
            return $_SESSION[$key];
        }

        return $default;
    }

    public static function clear(...$key)
    {
        foreach($key as $sessionKey) {
			unset($_SESSION[$sessionKey]);
		}
    }

    public static function flash($key)
    {
        if(self::exists($key)) {

            $flash = self::get($key);
            self::clear($key);
            return $flash;

        }
    }


}