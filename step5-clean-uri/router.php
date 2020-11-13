<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
  return false;    // serve the requested resource as-is.
}

include_once(__dir__ . $_SERVER['REQUEST_URI'] . "/index.php");