<?php
$visit=true;
$readOnly=true;
include_once "./lib/config.php";
include_once "./lib/do.php";
include $templateFolder."header.php";
include $templateFolder."show.php";


if($_POST["share"]=="0" and $_SESSION[dataEncrypt(substr($name,6))]){
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
	if($fileShare=="0"){
		echo loadTips("shareCloseAlready");
	}else{
		echo loadTips("shareCloseError");
	}
}


if(!$do){
	if(substr($name,0,6)==substr(md5(substr($name,6)),3,6)){
		if($fileShare){
			($isEncrypted)?(print showNotes_RO("encrypted")):(print showNotes_RO("decoded"));
		}else{
			echo loadTips("shareNotAllowed");
		}
	}else{
		echo loadTips("shareUrlError");
	}
}

include $templateFolder."footer.php";
?>