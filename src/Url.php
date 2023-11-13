<?php

namespace App;

class Url
{
    public const BASE_URL = 'http://192.168.54.15/poly-web-02-laravel/class16/e-comercee/';
    public static function link($path="")
    {
        return rtrim(Url::BASE_URL, '/') . '/' . $path;
    }
}
