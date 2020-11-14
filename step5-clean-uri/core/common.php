<?php

// uri 정의
$param = isset($_GET['param']) ? explode('/', $_GET['param']) : [];
$page = $param[0] ?? 'list';
$dataKey = $param[1] ?? null;

// data 가져오기
$path = CORE . "/data.json";
$data = file_exists($path) ? json_decode(file_get_contents($path)) : [];
$selectedData = isset($dataKey) ? $data[$dataKey] : null;
