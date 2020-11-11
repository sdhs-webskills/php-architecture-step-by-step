<?php

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