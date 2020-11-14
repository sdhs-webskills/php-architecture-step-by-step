<?php
$uri = $_SERVER['REQUEST_URI'];

if (!preg_match("/^[^.]+$/", $uri)) {
  return false;
}

include_once("./index.php");
