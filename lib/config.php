<?php ($visit) ? ("") : (header('location: /'));?>
<?php
//统一前置配制文件

error_reporting(E_ALL^E_NOTICE^E_WARNING);//屏蔽因找不到笔记缓存而导致的错误

$name = sanitize_file_name($_GET["f"]);

/**

如果需要统一的一个固定URL，需设置为
$URL = "http://notepad.live";

如果允许用户自由访问空间绑定的域名，则采用如下默认设置
$URL = "http://".$_SERVER["HTTP_HOST"];

**/

$URL = "http://".$_SERVER["HTTP_HOST"];

//缓存内容存放文件夹
$FOLDER = "_tmp";

//密码标识前缀
$pw_tag = "**@_#PassWord**";

	
function sanitize_file_name($filename) {
	//借鉴于Wordpress
	$special_chars = array("?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"", "&", "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}", ".");
	$filename = str_replace($special_chars, '', $filename);
	$filename = preg_replace('/[\s-]+/', '-', $filename);
	$filename = trim($filename, '.-_');
	return $filename;
}

 function randomkeys($length){
	//获取a-z的随机字符串的函数
	$output='';	
	for ($a = 0; $a<$length; $a++) {	
		$output .= chr(mt_rand(97, 122));	
	}	
	return $output;	
}

if (!isset($_GET["f"])) {
	//如果用户没有设定URL后缀，则随机获取并跳转
	$name=randomkeys(4);
	while (file_exists($FOLDER."/".$name) && strlen($name) < 10) {
		$name=randomkeys(4);
	}
	if (strlen($name) < 10) {
		header("Location: ".$URL."/".$name);
	}
	die();
}
?>