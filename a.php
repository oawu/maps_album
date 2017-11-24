// <?php
//   define ('PATH', implode (DIRECTORY_SEPARATOR, explode (DIRECTORY_SEPARATOR, dirname (__FILE__))) . '/');
//   define ('NAME', ($temps = array_filter (explode (DIRECTORY_SEPARATOR, PATH))) ? end ($temps) : '');

//   function mergeArrayRecursive ($files, &$a, $k = null) {
//     if (!($files && is_array ($files))) return false;
//     foreach ($files as $key => $file)
//       if (is_array ($file)) $key . mergeArrayRecursive ($file, $a, ($k ? rtrim ($k, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR : '') . $key);
//       else array_push ($a, ($k ? rtrim ($k, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR : '') . $file);
//   }


//   function directoryMap ($sourceDir, $directoryDepth = 0, $hidden = false) {
//     if ($fp = @opendir ($sourceDir)) {
//       $filedata = array ();
//       $new_depth  = $directoryDepth - 1;
//       $sourceDir = rtrim ($sourceDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

//       while (false !== ($file = readdir ($fp))) {
//         if (!trim ($file, '.') || (($hidden == false) && ($file[0] == '.')) || is_link ($file) || ($file == 'cmd')) continue;

//         if ((($directoryDepth < 1) || ($new_depth > 0)) && @is_dir ($sourceDir . $file)) $filedata[$file] = directoryMap ($sourceDir . $file . DIRECTORY_SEPARATOR, $new_depth, $hidden);
//         else array_push ($filedata, $file);
//       }

//       closedir ($fp);
//       return $filedata;
//     }

//     return false;
//   }

//   function read_gps_location ($info) {
//     if (!(isset ($info['GPSLatitude']) && isset ($info['GPSLongitude']) && isset ($info['GPSLatitudeRef']) && isset ($info['GPSLongitudeRef']) && in_array ($info['GPSLatitudeRef'], array ('E','W','N','S')) && in_array ($info['GPSLongitudeRef'], array ('E','W','N','S')) && ($lat_d_a = explode ('/',$info['GPSLatitude'][0])) && ($lat_m_a = explode ('/',$info['GPSLatitude'][1])) && ($lat_s_a = explode ('/',$info['GPSLatitude'][2])) && ($lng_d_a = explode ('/',$info['GPSLongitude'][0])) && ($lng_m_a = explode ('/',$info['GPSLongitude'][1])) && ($lng_s_a = explode ('/',$info['GPSLongitude'][2])) && (count ($lat_d_a) >= 2) && (count ($lat_m_a) >= 2) && (count ($lat_s_a) >= 2) && (count ($lng_d_a) >= 2) && (count ($lng_m_a) >= 2) && (count ($lng_s_a) >= 2) && in_array ($lat_r = strtolower (trim ($info['GPSLatitudeRef'])), array ('n', 's')) && in_array ($lng_r = strtolower (trim ($info['GPSLongitudeRef'])), array ('w', 'e'))))
//       return array ();

//     $lat = (float) ($lat_d_a[0] / $lat_d_a[1]) + (((($lat_m_a[0] / $lat_m_a[1]) * 60) + ($lat_s_a[0] / $lat_s_a[1])) / 3600);
//     $lng = (float) ($lng_d_a[0] / $lng_d_a[1]) + (((($lng_m_a[0] / $lng_m_a[1]) * 60) + ($lng_s_a[0] / $lng_s_a[1])) / 3600);

//     return array (
//       'latitude' => ($lat_r == 's' ? -1 : 1)* $lat,
//       'longitude' => ($lng_r == 'w' ? -1 : 1) * $lng
//     );
//   }
//   function read_create_time ($info) {
//     if (isset ($info['DateTimeOriginal']))
//       return date ('Y-m-d H:i:s', strtotime ($info['DateTimeOriginal']));
    
//     if (isset ($info['DateTime']))
//       return date ('Y-m-d H:i:s', strtotime ($info['DateTime']));
    
//     if (isset ($info['DateTimeDigitized']))
//       return date ('Y-m-d H:i:s', strtotime ($info['DateTimeDigitized']));

//     return '';
//   }
//   function read_size ($info) {
//     if (isset ($info['COMPUTED']['Height']) && isset ($info['COMPUTED']['Width']))
//       return array (
//           'width' => $info['COMPUTED']['Width'],
//           'height' => $info['COMPUTED']['Height'],
//         );
    
//     if (isset ($info['ExifImageWidth']) && isset ($info['ExifImageLength']))
//       return array (
//           'width' => $info['ExifImageWidth'],
//           'height' => $info['ExifImageLength'],
//         );
      
//     return array ();
//   }


//   $files = array ();
//   mergeArrayRecursive (directoryMap (PATH . 'img/iphone/'), $files, PATH . 'img/iphone/');

//   $files = array_map (function ($file) {
//     $info = @exif_read_data ($file);
//     $create_at = read_create_time ($info);
//     $location = read_gps_location ($info);

//     return array (
//         'ori' => $file,
//         'src' => str_replace (PATH, '', $file),
//         'create' => $create_at,
//         'location' => $location,
//       );
//   }, $files);

//   $dates = array ();

//   foreach ($files as $file) {
//     $key = date ('Y-m-d', strtotime ($file['create']));
//     if (!isset ($dates[$key])) $dates[$key] = array ($file);
//     else array_push ($dates[$key], $file);
//   }

// // echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" /><pre>';
// // echo '<link href="css/a.css" rel="stylesheet" type="text/css" />';

// //   foreach ($dates as $date => $data) {
// //     echo $date;
// //     echo "<div class='pics'>";
// //     foreach ($data as $value) {
// //       echo "<img src='" . $value['src'] . "' />";
// //     }
// //     echo "</div>";
// //   }
// // var_dump ($dates);
// exit ();
//   // foreach ($files as $i => $file)
//     // rename ($file['ori'], PATH . 'img/iphone/img_' . sprintf('%04d', $i + 1) . '.' . strtolower (pathinfo ($file['ori'], PATHINFO_EXTENSION))); 
  
//   exit ();