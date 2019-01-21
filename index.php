<?php
$visit=true;
include_once "./lib/config.php";
$path = $FOLDER."/".$name;
$file_head = file_get_contents($path,FALSE,NULL,0,47);
include "./content/templates/default/header.php";
?>
<div class="txa">
<?php
$isLocked=substr($file_head,0,15) == $pw_tag ? 1:0;
$isEncrypted=$isLocked;
if (isset($_POST["checkpw"])) {
	$do=1;
	if (md5($_POST["submit_pw"]) == substr($file_head,15,32) ){
	$isLocked=0;
	$do=0;
	}else {
	echo '<div class="alert alert-danger" role="alert"><strong>密码错误，将在3s后重试</strong>密码遗失不可找回</div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	$needBtn=0;
	}
}
if (isset($_POST["setpw"])) {
		$do=1;
		if(!$isEncrypted){
			echo "<br><br><br><br><br>
					<form action='/$_GET[f]' method='post' class='form-inline obody'>
						<div class='form-group'>
							<p class='form-control-static'>请设定密码：</p>
							<input type='password' class='form-control' name='submit_pw' />
						</div>
						<input type='submit' class='btn btn-default' value='确认' />
						<a href='javascript:void(0)' class='btn btn-default' onclick='history.go(-1)'>算了</a>
						<input type='hidden' name='setpw2' value='1' />	";
	
			//exit();
			$needBtn=0;
		}else{
					echo "<br><br><br><br><br>
					<form action='/$_GET[f]' method='post' class='form-inline obody'>
						<div class='form-group'>
							<span class='form-control-static'>旧密码：</span>
							<input type='password' class='form-control' name='submit_pw_old' />
							<span class='form-control-static'>请设定密码：</span>
							<input type='password' class='form-control' name='submit_pw' />
						</div>
						<input type='submit' class='btn btn-default' value='确认' />
						<a href='javascript:void(0)' class='btn btn-default' onclick='history.go(-1)'>算了</a>
						<input type='hidden' name='setpw2' value='1' />	";
		}
}
if (isset($_POST["setpw2"])) {
		$do=1;
	if(!$isEncrypted){
		if (substr($file_head,0,15) == $pw_tag ){
			$new_text = $pw_tag.md5($_POST['submit_pw']).file_get_contents($path,FALSE,NULL,47);
			file_put_contents($path, $new_text);
			}else {
				$new_text = $pw_tag.md5($_POST['submit_pw']).file_get_contents($path);
				file_put_contents($path, $new_text);
				}
		echo '<div class="alert alert-success" role="alert"><strong>设定完成，将在3s后跳转</strong>请务必牢记您的密码！遗失后不可找回！</div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
		$isLocked=1;
		$isEncrypted=1;
		$needBtn=0;
	}else{
		if (md5($_POST["submit_pw_old"]) == substr($file_head,15,32) ){
			if (substr($file_head,0,15) == $pw_tag ){
			$new_text = $pw_tag.md5($_POST['submit_pw']).file_get_contents($path,FALSE,NULL,47);
			file_put_contents($path, $new_text);
			}else {
				$new_text = $pw_tag.md5($_POST['submit_pw']).file_get_contents($path);
				
				//echo ($new_text);
				file_put_contents($path, $new_text);
				}
			echo '<div class="alert alert-success" role="alert"><strong>设定完成，将在3s后跳转</strong>请务必牢记您的密码！遗失后不可找回！</div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
			$isLocked=1;
			$isEncrypted=1;
			$needBtn=0;
		}else{
			echo '<div class="alert alert-danger" role="alert"><strong>原密码错误，请在3s后重新认证</strong></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
			$isLocked=1;
			$isEncrypted=1;
			$needBtn=0;
		}
	}
}
if (isset($_POST["t"])) {
	// Update content of file
	
	if (substr($file_head,0,15) == $pw_tag ){
		
		$tt = $pw_tag.substr($file_head,15,32).$_POST["t"];
		
	}else{
		$tt = $_POST["t"];
		}
	file_put_contents($path, $tt);
	die();
}
			if(!$do){if (file_exists($path)) {
				$needBtn=1;
				if ($isEncrypted){
					if (!$isLocked) {
						echo "<textarea class='form-control content'>". htmlspecialchars(file_get_contents($path,FALSE,NULL,47))."</textarea>";
						$needBtn=1;
					}else {
						echo "
					<br><br>
					<br><br><br><br><br>
					<form action='/$_GET[f]' method='post' class='form-inline obody'>
						<div class='form-group'>
						<p class='form-control-static'>这是私人笔记，请输入密码：</p>
						<input type='password' class='form-control' name='submit_pw' /></div>
						<input type='submit' class='btn btn-default' value='确认' />
						<input type='hidden' name='checkpw' value='yes' />
						</form>
						";
						$needBtn=0;
					}
				}
				else {
					echo "<textarea class='form-control content'>". htmlspecialchars(file_get_contents($path))."</textarea>";
					$needBtn=1;
				}
			}
			else{
			echo "<textarea class='form-control content'></textarea>";
					$needBtn=1;
			}
		}
?>
</div>
<?php ($needBtn) ? (include "./content/templates/default/footer.php"):(include "./content/templates/default/footer_nobtn.php");?>