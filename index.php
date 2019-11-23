<?php
$visit=true;
$readOnly=false;
include_once "./lib/config.php";
include_once "./lib/do.php";

if(strtoupper($name)=="OFFLINE"){
	$do=1;
	$offline="1";
	$name="offline";
	include $templateFolder."header.php";
	include "./lib/offline.php";
	die();
}
include $templateFolder."header.php";
include $templateFolder."show.php";

//if(!$isEncrypted){
$_SESSION[dataEncrypt($name)]=(!$isEncrypted)?(1):($_SESSION[dataEncrypt($name)]);
//}



if (isset($_POST["checkpw"])) {//检查密码正确性
	$do=1;
	if (dataEncrypt($_POST["submit_pw"]) == $filePw ){
		//$isLocked=0;
		$do=0;
		$_SESSION[dataEncrypt($name)]=1;
	}else{
		echo loadTips("inputError");
	}
}



if (isset($_POST["goto"])) {//页面跳转，另建此函数而不是让程序直接发送名为f的GET请求是为了提高安全性
	$do=1;
	$gotoPed = str_replace(array("/"," ","."),"",trim($_POST["goto"]));//可有可无
	header("Location: ".$URL."/".$gotoPed);
	die();
}



if (isset($_POST["setpw"])) {//用户设定密码页面
	$do=1;
	if(!$isEncrypted){
		echo showForms("inputSetPw");
	}else{
		echo showForms("inputSetPw_O");
	}
}



if (isset($_POST["setpw2"])) {//后台处理用户设定密码的操作
	$do=1;
	if(!$isEncrypted){
		if($_POST["submit_pw"] or $_POST["submit_pw"]==="0"){
			$new_text = $pwTag.dataEncrypt($_POST['submit_pw'])."0".file_get_contents($path);
			file_put_contents($path, $new_text);
			echo loadTips("setPwSucceed");
			//$isLocked=1;
			$isEncrypted=1;
			$_SESSION[dataEncrypt($name)]=0;
		}else{
			echo loadTips("setPwNewError");
		}
	}else{
		if (dataEncrypt($_POST["submit_pw_old"]) == $filePw ){
				if($_POST["submit_pw"] or $_POST["submit_pw"]==="0"){
					$new_text = $pwTag.dataEncrypt($_POST['submit_pw']).$fileShare.file_get_contents($path,FALSE,NULL,$fileHeadLen);
					file_put_contents($path, $new_text);
					echo loadTips("setPwSucceed");
					//$isLocked=1;
					$isEncrypted=1;
					$_SESSION[dataEncrypt($name)]=0;
				}else{
					$new_text = file_get_contents($path,FALSE,NULL,$fileHeadLen);
					file_put_contents($path, $new_text);
					echo loadTips("setPwClear");
					//$isLocked=0;
					$isEncrypted=0;
				}
		}else{
			echo loadTips("setPwOldError");
			$_SESSION[dataEncrypt($name)]=0;
			//$isLocked=1;
			$isEncrypted=1;
		}
	}
}



if (isset($_POST["t"]) and $_SESSION[dataEncrypt($name)]) {//异步处理-笔记内容更新操作
	if ($isEncrypted){
		$tt = $pwTag.$filePw.$fileShare.$_POST["t"];
	}else{
		$tt = $_POST["t"];
	}
	file_put_contents($path, $tt);
	die();
}



if ($_POST["share"]=="1" and $_SESSION[dataEncrypt($name)]) {//开放分享权限
	$do=1;
	$md5_path = md5($name);
	$shareLink="/share/".substr($md5_path,3,6).$name;
	global $shareLink;
	if ($isEncrypted){

		$tt = $pwTag.$filePw."1".file_get_contents($path,FALSE,NULL,$fileHeadLen);
		file_put_contents($path, $tt);

	}
	echo loadTips("shareOpen");
}/*elseif($_POST["share"]=="0" and $_SESSION[dataEncrypt(substr($name,6))]){
	$do=1;
	if ($isEncrypted){
		if($fileShare=="0"){
			echo loadTips("shareCloseAlready");
		}else{
		$tt = $pwTag.$filePw."0".file_get_contents($path,FALSE,NULL,$fileHeadLen);
		file_put_contents($path, $tt);
		echo loadTips("shareCloseSucceed");
		die();
		}
	}else{
		echo loadTips("shareCloseError");
	}
}elseif($_POST["share"]=="0" and !$_SESSION[dataEncrypt(substr($name,6))]){
	$do=1;
	echo loadTips("shareCloseError");
}*/



if(!$do){//读取笔记内容
	if (file_exists($path)) {
		if ($isEncrypted){
			if ($_SESSION[dataEncrypt($name)]) {
				echo showNotes("encrypted");
			}else{
				echo showForms("inputPw");
				$do=1;
			}
		}else{
			echo showNotes("decoded");
		}
	}else{
		echo showNotes("");
	}
}



include $templateFolder."footer.php";
?>