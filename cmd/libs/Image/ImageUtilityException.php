<?php

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

if (!function_exists ('array_2d_to_1d')) {
  function array_2d_to_1d ($array) {
    $messages = array ();
    foreach ($array as $key => $value)
      if (is_array ($value)) $messages = array_merge ($messages, $value);
      else array_push ($messages, $value);
    return $messages;
  }
}

class ImageUtilityException extends Exception {
  private $messages = array ();

  public function __construct () {
    $this->messages = array_2d_to_1d (func_get_args ());
  }
  // return array
  public function getMessages () {
    return $this->messages;
  }
}