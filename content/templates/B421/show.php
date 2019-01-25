<?php ($visit) ? ("") : (header('location: /'));?>
<?php
//提示的展示页面
function loadTips($sort){
	$out='<div class="container containerContent containerTips">';//展示页面的容器开始
	if($sort=="inputError"){//密码输入错误的展示页面
		$out.='<div class="alert alert-danger" role="alert"><h4 class="alert-heading">魔法口令有误，3s后再试试吧</h4><p>请检查输入的魔法口令与你当时定下契约的魔法口令是否一致。<br>如果你忘记了你的魔法吟唱口令，资料将不可找回</p></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="inputRight"){//密码输入正确的展示页面
		//密码输入完成后会直接跳转，该功能暂不予以实现
	}elseif($sort=="setPwSucceed"){//密码设定成功的展示界面
		//密码设定完成
		$out.='<div class="alert alert-success" role="alert"><h4 class="alert-heading">施法完成，3s后原地返回</h4><p>请记住你设下的魔法口令，遗失后不可找回！</p></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="setPwOldError"){//密码设定时原密码错误
		$out.='<div class="alert alert-danger" role="alert"><h4 class="alert-heading">啊哦，原魔法口令有误，3s后重新认证</h4></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="setPwClear"){//加密笔记清除密码
		$out.='<div class="alert alert-success" role="alert"><h4 class="alert-heading">魔法口令已经消除辽，3s后原地返回</h4></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="setPwNewError"){//未加密笔记设定密码错误
		$out.='<div class="alert alert-danger" role="alert"><h4 class="alert-heading">新的魔法口令有问题诶，试试别的口令吧，3s后原地返回</h4></div><meta http-equiv="refresh" content="3; url=/'.$_GET[f].'">';
	}elseif($sort=="shareUrlError"){//笔记分享页面地址错误
		$out.='<div class="alert alert-danger" role="alert"><h4 class="alert-heading">这里不是你该来的地方，骚年</h4></div>';
	}elseif($sort=="shareNotAllowed"){//笔记未开放分享权限
		$out.='<div class="alert alert-warning" role="alert"><h4 class="alert-heading">笔记的原主人没给别人偷看Ta笔记的能力喔，所以你看不了的啦</h4></div>';
	}elseif($sort=="shareOpen"){//开放分享权限界面
		$out.='<div class="alert alert-success" role="alert"><h4 class="alert-heading">你已经打开了一道口子，分享权限开启成功</h4><p>注意：任何人获得只读页地址后均可无密访问您的笔记，尽管分享页的笔记是只读的<br>如果您要关闭分享，请前往分享页在底部关闭分享</p><hr><p>分享页地址：'.$GLOBALS["URL"].$GLOBALS["shareLink"].'<br><div class="btn-group"><a href="'.$GLOBALS["shareLink"].'" class="btn btn-warning" targer="_blank">前往分享页</a><a href="javascript:void(0)" class="btn btn-light" onclick="history.go(-1)">返回</a></div></p></div>';
	}elseif($sort=="shareCloseSucceed"){//分享权限关闭成功
		$out.='<div class="alert alert-success" role="alert"><h4 class="alert-heading">你把这道口子关上啦！3s后原地返回</h4></div><meta http-equiv="refresh" content="3; url=/share/'.$_GET["f"].'">';
	}elseif($sort=="shareCloseError"){//分享权限关闭失败
		$out.='<div class="alert alert-warning" role="alert"><h4 class="alert-heading">分享权限关闭失败</h4><p>可能的原因<br>1.未设密码的笔记默认开启分享权限，不可关闭。如您要关闭分享权限，请设定密码<br>2.您没有关闭共享的权限，请联系笔记主人了解详细<br>3.您的授权时间到期，请<a href="/'.substr($_GET["f"],6).'" target="_blank">前往笔记页面</a>输入密码以续期</p><hr><p><a href="javascript:void(0)" onclick="history.go(-1)" class="btn btn-info">点此返回</a></p></div>';
	}elseif($sort=="shareCloseAlready"){//分享权限关闭失败
		$out.='<div class="alert alert-warning" role="alert"><h4 class="alert-heading">分享权限关闭失败</h4><p>原因：权限已被关闭</p></div>';
	}
	$out.="</div>";//展示页面的容器收束
	return $out;
}



//笔记的展示页面
function showNotes($sort,$isRO=0){
	$RO=($isRO)?("pre"):("textarea");
	$out='<div class="container containerContent"><'.$RO.' class="content">';//展示页面的容器开始
	if($sort=="encrypted"){//加密笔记的展示页面
		$out.=htmlspecialchars(file_get_contents($GLOBALS["path"],FALSE,NULL,$GLOBALS["fileHeadLen"]));
	}elseif($sort=="decoded"){//未加密笔记的展示页面
		$out.=htmlspecialchars(file_get_contents($GLOBALS["path"]));
	}
	$out.='</'.$RO.'></div>';//展示页面的容器收束
	return $out;
}



//表单的展示页面
function showForms($status){
	$out='<div class="container containerContent containerForm">';//展示页面的容器开始
	if($status=="inputPw"){//加密笔记-密码输入的展示页面
		$out.='<form action="/'.$_GET[f].'" method="post" class="pageForm">
					<lable>魔法口令：</lable>
					<input type="password" class="form-control pageFromInput" name="submit_pw" />
					<button type="submit" class="btn btn-success">吟唱</button>
					<input type="hidden" name="checkpw" value="yes" />
				</form>';
	}elseif($status=="inputSetPw"){//未加密笔记的密码设定页
		$out.='<form action="/'.$_GET[f].'" method="post" class="pageForm">
					<lable>设定魔法口令：</lable>
					<input type="password" class="form-control pageFromInput" name="submit_pw" />
					<div class="btn-group">
						<button type="submit" class="btn btn-success">吟唱</button>
						<a href="javascript:void(0)" class="btn btn-light" onclick="history.go(-1)">中断</a>
					</div>
					<input type="hidden" name="setpw2" value="1" />
				</form>';
	}elseif($status=="inputSetPw_O"){//加密笔记的密码设定页
		$out.='<form action="/'.$_GET[f].'" method="post" class="pageForm">
					<div class="row">
					<div class="col-md-8">
						<lable>旧口令：</lable>
						<input type="password" class="form-control pageFromInput" name="submit_pw_old" /><br>
						<lable>新口令：</lable>
						<input type="password" class="form-control pageFromInput" name="submit_pw" />
					</div>
					<div class="col-md-4 pageFromButton">
						<div class="btn-group">
							<button type="submit" class="btn btn-success">吟唱</button>
							<a href="javascript:void(0)" class="btn btn-light" onclick="history.go(-1)">中断</a>
						</div>
					</div>
					</div>
					<input type="hidden" name="setpw2" value="1" />
				</form>';
	}
	$out.="</div>";//展示页面的容器收束
	return $out;
}


?>