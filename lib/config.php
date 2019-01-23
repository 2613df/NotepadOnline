<?php ($visit) ? ("") : (header('location: /'));?>
<?php
/**				这是云笔记的配置文件
**
**	即使解释完备，但如果您不具备PHP的基础知识，不建议修改内容
**/


//统一URL前缀(不支持子目录)
$URL = "http://".$_SERVER["HTTP_HOST"];
/*
默认情况下自动获取域名地址，即
$URL = "http://".$_SERVER["HTTP_HOST"];

但如果您需要设定一个固定URL，请设置为 $URL = "您的域名"; ，如
$URL = "http://n.94joy.cn";

注意，暂不支持对子目录的固定URL设定，如"http://www.94joy.cn/notepad/",设定后会出现不可弥补的错误。
将会在数个版本后支持子目录云笔记的搭建
*/

//缓存内容存放文件夹
$FOLDER = "_tmp";

//密码标识前缀(目前只支持15个子字符串，将可能在数个版本后支持任意长度的字符串)
$pwTag = "**@_#PassWord**";

//主题与资料库配置
define("contentFolder","./content");//定义资料库文件夹地址，末尾不带短斜线
$template="default";//定义当前主题
$templateFolder=contentFolder."/templates/".$template."/";//获取当前主题文件夹地址
	
?>
