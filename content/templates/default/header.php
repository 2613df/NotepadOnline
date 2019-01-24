<?php ($visit) ? ("") : (header('location: /'));?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="94joy.cn" />
    <meta name="keywords" content="跨端传输,同屏传输,在线笔记,简单,简约,笔记,94Joy,NotePad" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $name;($readOnly)?(print "(只读)"):("");?> - 94Notepad</title>
	<!--备用的BootStrap CSS 3.4地址
	<link rel="stylesheet" href="/<?php echo $templateFolder."assets/css/bootstrap.min.css";?>">
	-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
	<link rel="stylesheet" href="/<?php echo $templateFolder."assets/css/main.css";?>" crossorigin="anonymous">
	
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
            <span class="sr-only">下拉导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			</button>
          <a class="navbar-brand" href="#"><?php print $name; ?> - 94Notepad</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
		  	<li><a>试试在其他设备上打开<?php echo $URL."/".$isShareFolder.$name;?></a></li>
          </ul>
		  <form class="navbar-form navbar-left" action="/<?php echo $name;?>" method="POST">
			  <input type="text" name="goto" class="form-control" placeholder="笔记后缀">
			<input type="submit" value="前往" class="btn btn-default">
		  </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">云笔记</a></li>
            <li><a href="http://tools.94joy.cn/notepad">本地笔记</a></li>
		    <li><a href="http://www.94joy.cn">返回主站</a></li>
          </ul>
        </div>
      </div>
    </nav>
