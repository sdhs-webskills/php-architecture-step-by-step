<?php

define('BASE_URI', '');

define('ROOT', __dir__);
define('CORE', ROOT . '/core');
define('PAGES', ROOT . '/pages');

include_once(CORE . '/common.php');
include_once(CORE . '/lib.php');

if (isset($_POST['action'])) {
  include_once(ROOT . '/actions.php');
  exit;
}

include_once(PAGES . '/header.php');
include_once(PAGES . "/{$page}.php");
include_once(PAGES . '/footer.php');
