<section>
  <h2>아이템 목록</h2>
  <?php if (count($data) == 0) { ?>
  <p>아이템이 존재하지 않습니다.</p>
  <?php } ?>
  <ul>
    <?php foreach ($data as $key => $item) { ?>
      <li>
        <?php echo $key ?> /
        <?php echo $item ?> /
        <a href="<?php echo BASE_URI?>/?page=update&amp;key=<?php echo $key?>">수정</a> /
        <a href="<?php echo BASE_URI?>/?page=delete&amp;key=<?php echo $key?>">삭제</a> /
      </li>
    <?php } ?>
  </ul>
  <a href="<?php echo BASE_URI?>/?page=add">아이템 추가</a>
</section>
