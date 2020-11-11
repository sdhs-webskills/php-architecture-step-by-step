<?php
$path = CORE . "/data.json";
$data = file_exists($path) ? json_decode(file_get_contents($path)) : [];
$page = $_GET['page'] ?? 'list';
$dataKey = $_GET['key'] ?? null;
$selectedData = isset($dataKey) ? $data[$dataKey] : null;