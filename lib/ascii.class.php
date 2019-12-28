<?php ($visit) ? ("") : (header('location: /'));?>
<?php
/*这是NPO的库文件
**------------------
**如果您不了解PHP或程序的功能实现方式及内容架构，请勿修改内容*/

class ascii {
  function decode($str, $prefix="&#") {
    $str = str_replace($prefix, "", $str);
    $a = explode(";", $str);
    array_pop($a);//去掉最后一个空字符串
    foreach ($a as $dec) {
      if ($dec < 128) {
        $utf .= chr($dec);
      } else if ($dec < 2048) {
        $utf .= chr(192 + (($dec - ($dec % 64)) / 64));
        $utf .= chr(128 + ($dec % 64));
      } else {
        $utf .= chr(224 + (($dec - ($dec % 4096)) / 4096));
        $utf .= chr(128 + ((($dec % 4096) - ($dec % 64)) / 64));
        $utf .= chr(128 + ($dec % 64));
      }
    }
    return $utf;
  }
  function encode($c, $prefix="&#") {
    $len = strlen($c);
    $a = 0;
    while ($a < $len) {
      $ud = 0;
      if (ord($c{$a}) >= 0 && ord($c{$a}) <= 127) {
        $ud = ord($c{$a});
        $a += 1;
      } else if (ord($c{$a}) >= 192 && ord($c{$a}) <= 223) {
        $ud = (ord($c{$a}) - 192) * 64 + (ord($c{$a + 1}) - 128);
        $a += 2;
      } else if (ord($c{$a}) >= 224 && ord($c{$a}) <= 239) {
        $ud = (ord($c{$a}) - 224) * 4096 + (ord($c{$a + 1}) - 128) * 64 + (ord($c{$a + 2}) - 128);
        $a += 3;
      } else if (ord($c{$a}) >= 240 && ord($c{$a}) <= 247) {
        $ud = (ord($c{$a}) - 240) * 262144 + (ord($c{$a + 1}) - 128) * 4096 + (ord($c{$a + 2}) - 128) * 64 + (ord($c{$a + 3}) - 128);
        $a += 4;
      } else if (ord($c{$a}) >= 248 && ord($c{$a}) <= 251) {
        $ud = (ord($c{$a}) - 248) * 16777216 + (ord($c{$a + 1}) - 128) * 262144 + (ord($c{$a + 2}) - 128) * 4096 + (ord($c{$a + 3}) - 128) * 64 + (ord($c{$a + 4}) - 128);
        $a += 5;
      } else if (ord($c{$a}) >= 252 && ord($c{$a}) <= 253) {
        $ud = (ord($c{$a}) - 252) * 1073741824 + (ord($c{$a + 1}) - 128) * 16777216 + (ord($c{$a + 2}) - 128) * 262144 + (ord($c{$a + 3}) - 128) * 4096 + (ord($c{$a + 4}) - 128) * 64 + (ord($c{$a + 5}) - 128);
        $a += 6;
      } else if (ord($c{$a}) >= 254 && ord($c{$a}) <= 255) { //error
        $ud = false;
      }
      $scill .= $prefix.$ud.";";
    }
    return $scill;
  }
}
?>