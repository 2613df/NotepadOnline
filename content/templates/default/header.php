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
	<nav class="navbar navbar-expand-lg navbar-dark">
	<div class="container">
		<span class="navbar-brand"><?php ($esN)?(print $name."(只读)"):(print $name);?> - NPO</span>
		<div class="btn-group">
			<a href="#" class="btn btn-light" id="clearNotes">清空</a>
			<a class="btn btn-dark" id="mode" title="Enable dark mode">🌘</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php ($offline)?(""):(print "active"); ?>">
					<a class="nav-link" href="/">云笔记</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://www.94joy.cn" target="_blank">返回主站</a>
				</li>
			</ul>
		  <form class="form-inline my-2 my-lg-0" action="/<?php echo $esL;?>" id="goto" method="POST">
			<input type="text" name="f" class="form-control" placeholder="笔记后缀,如 <?php print $name;?>">
			<input type="submit" value="前往" class="btn btn-outline-light">
		  </form>
		</div>
		</div>
	</nav>
