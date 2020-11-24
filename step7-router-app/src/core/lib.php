<?php

function print_pre ($el) {
    echo "<pre>";
    print_r($el);
    echo "</pre>";
}

function __autoload ($className) {
    echo $className;
}

spl_autoload_register(function ($className) {
    include_once(ROOT . '/' . str_replace("\\", '/', $className) . '.php');
});
