<?php

namespace App\DB;

use mysqli;

class Database
{
    static function connect()
    {
        $c = new mysqli("localhost", "root", "", "php_pos") or die("cannot connect to database");
        $c->set_charset("utf8");
        return $c;
    }
}
