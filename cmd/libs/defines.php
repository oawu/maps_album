<?php

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

mb_regex_encoding ("UTF-8");
mb_internal_encoding ('UTF-8');

date_default_timezone_set ('Asia/Taipei');

define ('PROTOCOL', "http://");

define ('JS', '.js');
define ('CSS', '.css');
define ('JSON', '.json');
define ('HTML', '.html');
define ('TXT', '.txt');
define ('XML', '.xml');

define ('NAME', ($temps = array_filter (explode (DIRECTORY_SEPARATOR, PATH))) ? end ($temps) : '');

define ('OA', '吳政賢');
define ('OA_URL', 'http://www.ioa.tw/');
define ('OA_FB_URL', 'https://www.facebook.com/comdan66/');
define ('OA_FB_UID', '100000100541088');
define ('FB_APP_ID', '199589883770118');
define ('FB_ADMIN_ID', OA_FB_UID);

define ('DIR_IMG', 'img' . DIRECTORY_SEPARATOR);
define ('DIR_ALBUMS', 'albums' . DIRECTORY_SEPARATOR);
define ('DIR_IMG_ALBUMS', DIR_IMG . DIR_ALBUMS);
define ('DIR_IMG_ALBUMS_ORI', DIR_IMG_ALBUMS . 'ori' . DIRECTORY_SEPARATOR);
define ('DIR_IMG_ALBUMS_BIG', DIR_IMG_ALBUMS . 'big' . DIRECTORY_SEPARATOR);
define ('DIR_IMG_ALBUMS_MID', DIR_IMG_ALBUMS . 'mid' . DIRECTORY_SEPARATOR);
define ('DIR_IMG_ALBUMS_SMALL', DIR_IMG_ALBUMS . 'small' . DIRECTORY_SEPARATOR);

define ('DIR_API', 'api' . DIRECTORY_SEPARATOR);

define ('PATH_IMG', PATH . DIR_IMG);
define ('PATH_IMG_ALBUMS', PATH . DIR_IMG_ALBUMS);
define ('PATH_IMG_ALBUMS_ORI', PATH . DIR_IMG_ALBUMS_ORI);
define ('PATH_IMG_ALBUMS_BIG', PATH . DIR_IMG_ALBUMS_BIG);
define ('PATH_IMG_ALBUMS_MID', PATH . DIR_IMG_ALBUMS_MID);
define ('PATH_IMG_ALBUMS_SMALL', PATH . DIR_IMG_ALBUMS_SMALL);

define ('PATH_API', PATH . DIR_API);
define ('PATH_API_ALBUMS', PATH_API . DIR_ALBUMS);


