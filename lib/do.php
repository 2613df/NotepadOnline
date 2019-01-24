<?php ($visit) ? ("") : (header('location: /'));?>
<?php
/**

		这是云笔记的数据操作文件


如果您不具备PHP的基础知识，且不了解内容架构，请不要修改内容
注意！关于用户可随意修改笔记内容的严重问题将可能在几个版本后更新


**/

error_reporting(E_ALL^E_NOTICE^E_WARNING);//屏蔽新笔记因找不到笔记缓存而导致的错误

//笔记分配名称
$name = $_GET["f"];
$pwTagLen=strlen($pwTag);//获取密码标识符前缀长度
$pwLen=strlen(dataEncrypt("1"));//获取密码标识符前缀长度
$fileHeadLen=$pwTagLen+$pwLen+1;
global $fileHeadLen;
$isShareFolder=($readOnly)?("share/"):("");



function dataEncrypt($data){
	$dataPed=md5(md5($data).sha1($data));
	return $dataPed;
}



function randomkeys($length){//获取a-z的随机字符串的函数
	$output='';	
	for ($a = 0; $a<$length; $a++) {	
		$output .= chr(mt_rand(97, 122));	
	}	
	return $output;	
}



if ($name=="" or !$name) {//未定义URL后缀时，随机获取并跳转
	$name=randomkeys(4);
	while (file_exists($FOLDER."/".$name)) {//获取一个未使用过的笔记
		$name=randomkeys(4);
	}
	header("Location: ".$URL."/".$name);
	die();
}else{
	$isShareFolder=($readOnly)?("share/"):("");
	$namePed = str_replace(array("/"," ","."),"",trim($name));
	($name!=$namePed)?(header("Location: ".$URL."/".$isShareFolder.$namePed)):("");//防止非法字符串"/"|" "写入目录，解决含非法字符串笔记无法同步(无法写入目录)的问题
	(strlen($name)>10 and !$readOnly)?(header("Location: ".$URL."/".substr($name,0,10))):("");//只取地址前10位，防止Windows环境下地址过长出现无法访问的问题
}



$path=($readOnly)?($FOLDER."/".substr($name,6)):($FOLDER."/".$name);
global $path;
$file_head = file_get_contents($path,FALSE,NULL,0,$fileHeadLen);
//if(!file_exists($path)){
//}
$filePw=substr($file_head,$pwTagLen,$pwLen);
/*function sanitize_file_name($filename) {
	//借鉴于Wordpress
	$special_chars = array("?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"", "&", "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}", ".");
	$filename = str_replace($special_chars, '', $filename);
	$filename = preg_replace('/[\s-]+/', '-', $filename);
	$filename = trim($filename, '.-_');
	return $filename;
}*/





//判断是否加密
//$isLocked=substr($file_head,0,15) == $pwTag ? 1:0;
$isEncrypted=substr($file_head,0,15) == $pwTag ? 1:0;
$fileShare = ($isEncrypted)?(file_get_contents($path,FALSE,NULL,$fileHeadLen-1,1)):("1");
session_start();
?>