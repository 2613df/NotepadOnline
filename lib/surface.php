<?php ($visit) ? ("") : (header('location: /'));?>
<?
/*这是NPO的操作文件
**------------------
**如果您不了解PHP或程序的功能实现方式及内容架构，请勿修改内容*/

$name = $_POST["f"] ? $_POST["f"] : $_GET["f"];
$URL = $_SERVER['HTTPS'] == "on" ? "https://" :"http://";
$URL = $URL.$_SERVER["HTTP_HOST"];
$esN = $es != e ? 1 : 0;
$esL = $esN ? 'share/' : '';
function randomkeys($length = 4){
	/*获取4位a-z的随机字符串的函数*/
	$output='';	
	for ($a = 0; $a<$length; $a++) {	
		$output .= chr(mt_rand(97, 122));	
	}	
	return $output;	
}
if ($name=="" or !$name) {//未定义URL后缀时，随机获取并跳转
	//待解决share下name为空的问题
	$name=randomkeys(4);
	$isExist=json_decode(file_get_contents($URL."/lib/handle.php?api=1&name=".$name."&es=".$es),true)['result'];
	while($isExist){
		$name=randomkeys(4);
	}
	header("Location: ".$URL."/".$name);
	die();
}else{
	$namePed = str_replace(array("/"," ",".","*",":","|"),"",trim($name));
	if($es=='e') $namePed = mb_substr($namePed,0,12);
	if($name!=$namePed or $_POST["f"]){
		header("Location: ".$URL."/".$esL.$namePed);die();
	}
}
?>