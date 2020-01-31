<?php ($visit) ? ("") : (header('location: /'));?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="94joy.cn" />
    <meta name="keywords" content="跨端传输,同屏传输,在线笔记,简单,简约,笔记,94Joy,NotePad,NPO,NotePadOnLine" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php ($esN)?(print $name."(只读)"):(print $name);?> - NPO</title>
	<link rel="stylesheet" href="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="/<?php echo $templateFolder."assets/css/main.css";?>" crossorigin="anonymous">
	<link crossorigin="anonymous" href="https://cdnjs.loli.net/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light navbarTop">
	<!-- <div class="container"> -->
		<div class="btn-group">
			<a href="/" id="newPageBtn" class="btn btn-primary" target="_blank" data-toggle="tooltip" data-placement="bottom" title="新建一个空白文档"><i class="fas fa-plus"></i></a>
			<a href="javascript:void(0)" class="btn btn-light" onclick="history.go(0)" data-toggle="tooltip" data-placement="bottom" title="刷新页面"><i class="fas fa-sync-alt"></i></a>
		</div>
		<span class="navbar-brand">&nbsp;&nbsp;<?php ($esN)?(print $name."(只读)"):(print $name);?> - NPO</span>
		<small id="savingStatus" class="text-muted">&nbsp;<i class="fas fa-download"></i>&nbsp;正在读取...</small>
		&nbsp;
		<!-- <div class="spinner-border text-secondary spinner-border-sm" role="status"><span class="sr-only"></span></div>&nbsp;正在保存... -->
		<!-- <div class="btn-group">
			<a href="#" class="btn btn-light" id="clearNotes">清空</a>
			<a class="btn btn-dark" id="mode" title="Enable dark mode">🌘</a>
		</div> -->
		<button class="navbar-toggler navbarTopCollapse" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

			</ul>
<!-- 			<div class="broadcastTop alert alert-info mb-0" role="alert">
			  <strong>广播</strong> 顶部广播
			</div> -->
			<div class="broadcastTop text-info d-none d-lg-block">
			  <strong>广播DEMO</strong> 这里是广播DEMO内容
			</div>
		  <div class="btn-group">
			<a tabindex="0" id="teamworkBtn" class="btn btn-light" role="button" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="开发日志" data-content='"协作"功能目前正在开发中，可能会在数个版本后更新，也可能中途被砍掉'><i class="fas fa-user-friends"></i></a>
			<a href="#" class="btn btn-light" id="mobBtn" data-toggle="popover" data-placement="bottom" data-trigger="hover" title="移动端扫码以继续访问" data-html=true data-content='<img width=100% src="http://qr.topscan.com/api.php?text=<?php echo $URL."/".$esL.$name;?>"/>'><i class="fas fa-mobile-alt"></i></a>
			<!-- <a href="#" class="btn btn-light" id="shareBtn" data-toggle="tooltip" data-placement="bottom" title="只读分享给他人"><i class="fas fa-share-square"></i>&nbsp;只读分享</a> -->
			<a href="#" class="btn btn-light" id="shareBtn" data-toggle="modal" data-target="#shareWindow"><i class="fas fa-share-square"></i></a>
			
			
			<a href="#" class="btn btn-light" id="configBtn" data-toggle="modal" data-target="#configWindow"><i class="fas fa-cog"></i></a>
		  </div>
		  <div class="btn-group">
			<button type="button" class="btn btn-success" id = "keyJudgeBtn" data-toggle="modal" data-target="#keyJudgeWindow" style="display: none;">输入密码</button>
			<!-- <button type="button" class="btn btn-info" id = "shareSuccessBtn" data-toggle="modal" data-target="#shareWindow" style="display: none;">分享成功</button> -->
		  </div>
		&nbsp;&nbsp;
		<div class="dropdown" id="moreTog">
		  <a class="btn btn-light dropdown-toggle" type="button" id="moreBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <i class="fas fa-ellipsis-v"></i>
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreBtn">
			<form class="px-4 py-3" action="/<?php echo $esL;?>" method="POST" target="_blank">
			<div class="form-group">
			  <label>找回文档</label>
			  <input type="text" class="form-control" name="f" placeholder="文档名，如 <?php print $name;?>">
			</div>
			<button type="submit" class="btn btn-primary">前往</button>
			</form>

			<div class="dropdown-divider"></div>
			<a class="dropdown-item disabled" href="#">创建副本（开发中）</a>
			<a class="dropdown-item disabled" href="#">另存为副本（开发中）</a>
		    <!-- <div class="dropdown-divider"></div> -->
			<a class="dropdown-item" id="exportBtnWord" href="#">导出为&nbsp;Word</a>
			<a class="dropdown-item disabled" href="#">打印（开发中）</a>
		    <!-- <div id="exportBtnGroup">
				<a class="dropdown-item" id="exportBtn0">导出为</a>
				<a class="dropdown-item" id="exportBtnWord" href="#" style="display: none;">导出为Word</a>
				<a class="dropdown-item" id="exportBtnPdf" href="#" style="display: none;">导出为Pdf</a>
				<a class="dropdown-item disabled" href="#">打印（开发中）</a>
			</div> -->
			<div class="dropdown-divider"></div>
			<a class="dropdown-item disabled" href="#">历史回溯（开发中）</a>
			<a class="dropdown-item disabled" href="#">文档信息（开发中）</a>
			<a class="dropdown-item disabled" href="#">版权声明（开发中）</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#" id = "versionBtn" data-toggle="modal" data-target="#versionWindow">关于</a>
		  </div>
		</div>

		</div>
		<!-- </div> -->
	</nav>
