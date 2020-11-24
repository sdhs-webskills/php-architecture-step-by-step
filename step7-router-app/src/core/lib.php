<?php

function print_pre ($el) {
    echo "<pre>";
    print_r($el);
    echo "</pre>";
}

function __autoload ($className) {
    echo $className;
}

function fetchData ($prefix = null) {
    $data = file_get_contents(ROOT . '/data/data.json');
    $root = json_decode($data);
    if (!isset($prefix)) return $root;
    return $root->$prefix ?? null;
}

function setData ($data) {
    file_put_contents(ROOT . '/data/dats.json', json_encode($data));
}

spl_autoload_register(function ($className) {
    include_once(ROOT . '/' . str_replace("\\", '/', $className) . '.php');
});
