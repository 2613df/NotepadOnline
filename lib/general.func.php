<?php ($visit) ? ("") : (header('location: /'));?>
<?php
/*这是NPO的库文件
**------------------
**如果您不了解PHP或程序的功能实现方式及内容架构，请勿修改内容*/

session_start();//必要session启动器
error_reporting(E_ALL^E_NOTICE^E_WARNING);//屏蔽新笔记因找不到笔记缓存而导致的错误

function dencrypt($mode=2,$data,$key = "94joy"){
	/*加密解密函数
	**原有加解密函数因长度过长已被弃用;
	**勿改key值,若base64编码后首字母为数字可能会导致session变量无法找到;
	**可逆加密	mode=1
	**可逆解密	mode=-1
	**不可逆加密	mode=2*/
	switch($mode){
		case 1:return str_replace("/","-",base64_encode($key.$data));
		case -1:return substr(base64_decode(str_replace("-","/",$data)),strlen($key));
		case 2:return md5(md5($data).sha1($data));
	}
}
?>