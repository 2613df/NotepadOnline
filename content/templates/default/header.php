<?php ($visit) ? ("") : (header('location: /'));?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $name;($readOnly)?(print "(只读)"):("");?> - 94Notepad</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
	.content {
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size:1.2em;
		line-height: 1.5em;
		color: #777;
		width: 100%;
		height: 100%;
		min-height: 100%;
		resize: none;
		overflow-y: auto;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	textarea {
		overflow: auto;
		vertical-align: top;
	}
	#controls {
		position: absolute;
		left: 0;
		height: 25px;
		text-align: center;
		right: 0;
		bottom: 5%;
	}
	pre {
		white-space: pre-wrap;       
		white-space: -moz-pre-wrap;  
		white-space: -pre-wrap;      
		white-space: -o-pre-wrap;    
		word-wrap: break-word;       
	}
	body {padding-top: 5em;}
	.txa {
		position:absolute;
		top:10%;
		bottom:10%;
		left:5%;
		right:5%;
	}
	.obody {text-align:center;}
	* {
		transition: all 0.5s;
		-moz-transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-o-transition: all 0.5s;
	}
	</style>
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
		  	<li><a>试试在其他设备上打开<?php echo $_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"] ?></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">云笔记</a></li>
            <li><a href="http://tools.94joy.cn/notepad">本地笔记</a></li>
		    <li><a href="http://www.94joy.cn">返回主站</a></li>
          </ul>
        </div>
      </div>
    </nav>
