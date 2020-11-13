<?php

  function alert ($msg) {
    echo "<script>alert('{$msg}')</script>";
  }

  function move ($str) {
    echo "<script>location.replace('{$str}');</script>";
    exit;
  }