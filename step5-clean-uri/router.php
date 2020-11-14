<?php

// PHP Built-in Server에서는 router.php 사용

$uri = $_SERVER['REQUEST_URI'];

if (!preg_match("/^[^.]+$/", $uri)) {
  return false;
}

$_GET['param'] = $uri !== '/' ? substr($uri, 1) : null;

include_once("./index.php");
