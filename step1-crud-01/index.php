<?php
  /**
   * 간단하게 메모리를 이용하여 데이터를 넣고 빼고 할 예정
   * @link {https://www.php.net/manual/en/book.shmop.php}
   */
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
</body>
</html>