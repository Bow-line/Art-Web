<?php


class Resources
{
    const DEFAULT_PATH_IMAGE = URLROOT . '/zdjecia/';

    public static function image(string $filename) : string
    {
        return self::DEFAULT_PATH_IMAGE . $filename;
    }

    public static function route(string $route = null) : string
    {
        return URLROOT . '/' . $route;
    }
}