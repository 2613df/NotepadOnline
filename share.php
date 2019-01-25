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
		$fileShare=0;
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
			($isEncrypted)?(print showNotes("encrypted",1)):(print showNotes("decoded",1));
		}else{
			echo loadTips("shareNotAllowed");
		}
	}else{
		echo loadTips("shareUrlError");
	}
}

include $templateFolder."footer.php";
?>