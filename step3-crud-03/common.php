<?php
  $path = "./data.json";
  $data = file_exists($path) ? json_decode(file_get_contents($path)) : [];
