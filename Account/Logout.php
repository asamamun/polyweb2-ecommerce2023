<?php
require_once(__DIR__ . '/../src/Url.php');

use App\Url;

session_start();
session_unset();
session_destroy();
header("location: " . Url::link('/index.php'));
