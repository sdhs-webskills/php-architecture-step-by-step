<?php
  $path = "./data.json";
  $data = file_exists($path) ? json_decode(file_get_contents($path)) : [];

  array_splice($data, $_POST['key'], 1);

  file_put_contents($path, json_encode($data));

  echo "
    <script>
      alert('삭제 되었습니다.');
      location.replace('./');
    </script>
  ";