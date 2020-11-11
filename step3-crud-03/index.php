<?php
  include_once('./common.php');
  include_once('./lib.php');
  if (isset($_POST['action'])) {
    include_once('./actions.php');
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