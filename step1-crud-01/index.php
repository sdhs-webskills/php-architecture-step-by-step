<?php
  $path = "./data.json";
  $data = file_exists($path) ? json_decode(file_get_contents($path)) : [];
?>
<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>Create, Read, Update, Delete</title>
</head>
<body>
  <form action="./write_ok.php" method="post">
    <fieldset>
      <legend>추가</legend>
      <input type="text" name="contents" placeholder="내용 입력" />
      <button type="submit">전송</button>
    </fieldset>
  </form>
  <section>
    <h2>아이템 목록</h2>
    <ul>
      <?php foreach ($data as $item) { ?>
        <li><?php echo $item ?></li>
      <?php } ?>
    </ul>
  </section>
</body>
</html>