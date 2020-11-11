<form action="" method="post">
  <fieldset>
    <legend>수정</legend>
    <input type="hidden" name="action" value="update">
    <input type="text" name="contents" placeholder="내용 입력" value="<?php echo $selectedData?>" />
    <button type="submit">전송</button>
  </fieldset>
</form>
<a href="<?php echo BASE_URI ?>/">목록으로</a>
