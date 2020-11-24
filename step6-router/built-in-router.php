<?php

// PHP Built-in Server에서는 built-in-router.php 사용
if (preg_match("/^\/static/", str_replace('/step6-router', '', $_SERVER['REQUEST_URI']))) {
    return false;
}
include_once(__DIR__ . "/index.php");
