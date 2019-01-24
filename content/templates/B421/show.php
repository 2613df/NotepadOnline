<?php ($visit) ? ("") : (header('location: /'));?>
<?php
//提示的展示页面
function loadTips($sort){
	$out='<div class="container">';//展示页面的容器开始
	if($sort=="inputError"){//密码输入错误的展示页面
		$out.='<div class="alert alert-danger" role="alert"><strong>魔法吟唱口令出错了，3s后再试试吧</strong><br>请检查输入的魔法吟唱口令与你当时定下契约的魔法吟唱口令是否一致。如果你忘记了你的魔法吟唱口令，资料将不可找回</div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="inputRight"){//密码输入正确的展示页面
		//密码输入完成后会直接跳转，该功能暂不予以实现
	}elseif($sort=="setPwSucceed"){//密码设定成功的展示界面
		//密码设定完成
		$out.='<div class="alert alert-success" role="alert"><strong>施法完成，3s后原地返回</strong><br>请记住你设下的魔法吟唱口令，遗失后不可找回！</div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="setPwOldError"){//密码设定时原密码错误
		$out.='<div class="alert alert-danger" role="alert"><strong>啊哦，原魔法吟唱口令有误，3s后重新认证</strong></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="setPwClear"){//加密笔记清除密码
		$out.='<div class="alert alert-success" role="alert"><strong>魔法吟唱口令已经消除辽，3s后原地返回</strong></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="setPwNewError"){//未加密笔记设定密码错误
		$out.='<div class="alert alert-danger" role="alert"><strong>新的魔法吟唱口令有问题诶，试试别的口令吧，3s后原地返回</strong></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="shareUrlError"){//笔记分享页面地址错误
		$out.='<div class="alert alert-danger" role="alert"><strong>这里不是你该来的地方，骚年</strong></div>';
	}elseif($sort=="shareNotAllowed"){//笔记未开放分享权限
		$out.='<div class="alert alert-warning" role="alert"><strong>笔记的原主人没给别人偷看Ta笔记的能力喔，所以你看不了的啦</strong></div>';
	}elseif($sort=="shareOpen"){//开放分享权限界面
		$out.='<div class="alert alert-success" role="alert"><strong>你已经打开了一道口子，分享权限开启成功</strong><br>注意：任何人获得只读地址后均可无密访问您的笔记，尽管分享页的笔记是只读的<a href='.$GLOBALS["shareLink"].'>只读地址</a>&nbsp;<a href="javascript:void(0)" onclick="history.go(-1)">返回</a></div>';
	}elseif($sort=="shareCloseSucceed"){//分享权限关闭成功
		$out.='<div class="alert alert-success" role="alert"><strong>你把这道口子关上啦！3s后原地返回</strong></div><meta http-equiv="refresh" content="3; url=/share/'.$_GET["f"].'">';
	}elseif($sort=="shareCloseError"){//分享权限关闭失败
		$out.='<div class="alert alert-warning" role="alert"><strong>分享权限关闭失败</strong><br>可能的原因<br>1.未设密码的笔记默认开启分享权限，不可关闭。如您要关闭分享权限，请设定密码<br>2.您没有关闭共享的权限，请联系笔记主人了解详细<br>3.您的授权时间到期，请<a href="/'.substr($_GET["f"],6).'">前往笔记页面</a>输入密码以续期<br><br><br><a href="javascript:void(0)" onclick="history.go(-1)">点此返回</a></div>';
	}elseif($sort=="shareCloseAlready"){//分享权限关闭失败
		$out.='<div class="alert alert-warning" role="alert"><strong>分享权限关闭失败</strong><br>原因：权限已被关闭</div>';
	}
	$out.="</div>";//展示页面的容器收束
	return $out;
}



//笔记的展示页面
function showNotes($sort){
	$out='<div class="txa">';//展示页面的容器开始
	if($sort=="encrypted"){//加密笔记的展示页面
		$out.='<textarea class="form-control content">'.htmlspecialchars(file_get_contents($GLOBALS["path"],FALSE,NULL,$GLOBALS["fileHeadLen"])).'</textarea>';
		//$out.='<textarea class="form-control content">'.$GLOBALS["fileHeadLen"].'</textarea>';
	}elseif($sort=="decoded"){//未加密笔记的展示页面
		$out.='<textarea class="form-control content">'.htmlspecialchars(file_get_contents($GLOBALS["path"])).'</textarea>';
	}else{//新笔记的展示页面
		$out.='<textarea class="form-control content"></textarea>';
	}
	$out.="</div>";//展示页面的容器收束
	return $out;
}


//只读笔记的展示页面
function showNotes_RO($sort){
	$out='<div class="txa">';//展示页面的容器开始
	if($sort=="encrypted"){//加密笔记的展示页面
		$out.='<pre class="form-control content">'.htmlspecialchars(file_get_contents($GLOBALS["path"],FALSE,NULL,$GLOBALS["fileHeadLen"])).'</pre>';
	}elseif($sort=="decoded"){//未加密笔记的展示页面
		$out.='<pre class="form-control content">'.htmlspecialchars(file_get_contents($GLOBALS["path"])).'</pre>';
	}
	$out.="</div>";//展示页面的容器收束
	return $out;
}



//表单的展示页面
function showForms($status){
	$out='<div class="container">';//展示页面的容器开始
	if($status=="inputPw"){//加密笔记-密码输入的展示页面
		$out.='<form action="/'.$_GET[f].'" method="post" class="form-inline obody">
					<span class="form-control-static">这里暗含他人隐私，如需一窥究竟，请吟唱特定魔法：</span>
					<input type="password" class="form-control" name="submit_pw" />
					<button type="submit" class="btn btn-success">我完事了</button>
					<input type="hidden" name="checkpw" value="yes" />
				</form>';
	}elseif($status=="inputSetPw"){//未加密笔记的密码设定页
		$out.='<form action="/'.$_GET[f].'" method="post" class="form-inline text-center">
					<span class="form-control-static">输入要定下契约的魔法吟唱口令：</span>
					<input type="password" class="form-control" name="submit_pw" />
					<div class="btn-group">
						<button type="submit" class="btn btn-success">就决定是你了！</button>
						<a href="javascript:void(0)" class="btn btn-light" onclick="history.go(-1)">算了算了</a>
					</div>
					<input type="hidden" name="setpw2" value="1" />
				</form>';
	}elseif($status=="inputSetPw_O"){//加密笔记的密码设定页
		$out.='<form action="/'.$_GET[f].'" method="post" class="form-inline obody">
					<span class="form-control-static">旧的不去：</span>
					<input type="password" class="form-control" name="submit_pw_old" />
					<span class="form-control-static">新的不来：</span>
					<input type="password" class="form-control" name="submit_pw" />
					<div class="btn-group">
						<button type="submit" class="btn btn-success">就决定是你了！</button>
						<a href="javascript:void(0)" class="btn btn-light" onclick="history.go(-1)">算了算了</a>
					</div>
					<input type="hidden" name="setpw2" value="1" />
				</form>';
	}
	$out.="</div>";//展示页面的容器收束
	return $out;
}


?>