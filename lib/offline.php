<?php ($visit) ? ("") : (header('location: /'));?>

<?php
/*$visit=true;
$do=1;$offline="1";
include_once "./lib/config.php";
$name="Offline";
include $templateFolder."header.php";
*/

	$out='<div class="container containerTips"><textarea class="content" id="content" placeholder="记录点滴" autofocus>';//展示页面的容器开始
	$out.='</textarea></div>';//展示页面的容器收束
	echo $out;



include $templateFolder."footer.php";
echo '<script src="/assets/js/offline.js"></script>';
?>