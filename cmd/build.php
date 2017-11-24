<?php

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 *
 * Need to run init.php
 *
 */

define ('PHP', '.php');
define ('PATH', implode (DIRECTORY_SEPARATOR, explode (DIRECTORY_SEPARATOR, dirname (str_replace (pathinfo (__FILE__, PATHINFO_BASENAME), '', __FILE__)))) . '/');
define ('PATH_CMD', PATH . 'cmd' . DIRECTORY_SEPARATOR);
define ('PATH_CMD_LIBS', PATH_CMD . 'libs' . DIRECTORY_SEPARATOR);
define ('PATH_CMD_LIBS_IMAGE', PATH_CMD_LIBS . 'Image' . DIRECTORY_SEPARATOR);

include_once PATH_CMD_LIBS . 'defines' . PHP;
include_once PATH_CMD_LIBS . 'Step' . PHP;
include_once PATH_CMD_LIBS_IMAGE . 'ImageUtility' . PHP;

Step::start ();

$file = array_shift ($argv);
$argv = Step::params ($argv, array (array ('-n', '-name'), array ('-c', '-copy')));

if (!isset ($argv['-n'])) {
  echo str_repeat ('=', 80) . "\n";
  echo ' ' . Step::color ('◎', 'R') . ' ' . Step::color ('錯誤囉！', 'r') . Step::color ('請確認參數是否正確，分別需要', 'p') . ' ' . Step::color ('-b', 'W') . '、' . Step::color ('-a', 'W') . '、' . Step::color ('-s', 'W') . Step::color (' 的參數！', 'p') . ' ' . Step::color ('◎', 'R');
  echo "\n" . str_repeat ('=', 80) . "\n\n";
  exit ();
}

Step::init ();
Step::filterBuildJson ($argv['-n'], isset ($argv['-c'][0]) && $argv['-c'][0]);
Step::buildAllJson ();

Step::usage ();
Step::end ();
echo "\n";
exit ();
