<?php
  $path = "./data.json";
  $data = file_exists($path) ? json_decode(file_get_contents($path)) : [];

  function alert ($msg) {
    echo "<script>alert('{$msg}')</script>";
  }

  function move ($str) {
    echo "<script>location.replace('{$str}');</script>";
    exit;
  }

  if (isset($_POST['action'])) {
    $msg = '';
    switch ($_POST['action']) {
      case 'write':
        $data[] = $_POST['contents'];
        $msg = '추가되었습니다.';
        break;
      case 'update':
        $data[$_POST['key']] = $_POST['contents'];
        $msg = '수정되었습니다.';
        break;
      case 'delete':
        array_splice($data, $_POST['key'], 1);
        $msg = '삭제되었습니다.';
        break;
    }

    file_put_contents($path, json_encode($data));

    alert($msg);
    move('./');
  }
?>
<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>Create, Read, Update, Delete</title>
</head>
<body>
  <form action="" method="post">
    <fieldset>
      <legend>추가</legend>
      <input type="hidden" name="action" value="write">
      <input type="text" name="contents" placeholder="내용 입력" />
      <button type="submit">전송</button>
    </fieldset>
  </form>
  <form action="" method="post">
    <fieldset>
      <legend>수정</legend>
      <input type="hidden" name="action" value="update">
      <input type="text" name="key" placeholder="번호 입력" />
      <input type="text" name="contents" placeholder="내용 입력" />
      <button type="submit">전송</button>
    </fieldset>
  </form>
  <form action="" method="post">
    <fieldset>
      <legend>삭제</legend>
      <input type="hidden" name="action" value="delete">
      <input type="text" name="key" placeholder="번호 입력" />
      <button type="submit">전송</button>
    </fieldset>
  </form>
  <section>
    <h2>아이템 목록</h2>
    <ul>
      <?php foreach ($data as $key => $item) { ?>
        <li>
          <?php echo $key ?> / <?php echo $item ?>
        </li>
      <?php } ?>
    </ul>
  </section>
</body>
</html>