<?php
  array_splice($data, $_GET['key'], 1);
  file_put_contents($path, json_encode($data));
  alert("삭제 되었습니다.");
  move(BASE_URI . '/');