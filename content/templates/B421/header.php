<?php ($visit) ? ("") : (header('location: /'));?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="94joy.cn" />
    <meta name="keywords" content="跨端传输,同屏传输,在线笔记,简单,简约,笔记,94Joy,NotePad" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php ($readOnly)?(print substr($name,6)."(只读)"):(print $name);?> - 94Notepad</title>
	<!--备用的BootStrap CSS 3.4地址
	<link rel="stylesheet" href="/<?php echo $templateFolder."assets/css/bootstrap.min.css";?>">
	-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="/<?php echo $templateFolder."assets/css/main.css";?>" crossorigin="anonymous">
	
</head>
<body class="<?php ($do)?(print "bodyNoBtn"):(print "bodyBtn");?>">
	<!--nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"-->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="./">
			<!--img src="logo.svg" width="30" height="30" alt=""--><?php ($readOnly)?(print substr($name,6)."(只读)"):(print $name);?> - 94Notepad</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">云笔记</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://tools.94joy.cn/notepad">本地笔记</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://www.94joy.cn" target="_blank">返回主站</a>
				</li>
				<!--li class="nav-item"><a class="nav-link">试试在别处上打开 <?php echo $URL."/".$isShareFolder.$name;?></a></li-->
			</ul>
			<!--form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="搜寻项目、计划与文档" aria-label="Search">
				<button class="btn btn-outline-light my-2 my-sm-0" type="submit">搜寻</button>
			</form-->
		  <form class="form-inline my-2 my-lg-0" action="/<?php echo $name;?>" method="POST">
			<input type="text" name="goto" class="form-control" placeholder="笔记后缀,如 <?php ($readOnly)?(print substr($name,6)):(print $name);?>">
			<input type="submit" value="前往" class="btn btn-outline-light">
		  </form>
		</div>
		</div>
	</nav>
