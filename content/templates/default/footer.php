<?php ($visit) ? ("") : (header('location: /'));?>
<div id="controls">


	<span>试试在其他设备上打开<?php echo $_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"] ?></span><br>
<a href="javascript:void(0)" class="btn btn-default" onclick="history.go(0)">刷新</a>
<a href="javascript:if(confirm('重置笔记将会使当前笔记内容丢失，并同时分配一个新的笔记地址，请确认您知道这么做的后果！')){location='/'}"" class="btn btn-danger">重置</a>
<form name="form9" method="post" action="<?php echo "/".$_GET['f']; ?>" style="display:inline"> 
	<INPUT TYPE="hidden" name="setpw" value="1" /> 
	<INPUT TYPE="submit" name="" value ="设定密码" class="btn btn-success" >  
</form> 
<?php $md5_path = md5($_GET['f']);$zhidu_link="/share/".substr($md5_path,3,6).$_GET['f'];?>
<a href="<?php echo($zhidu_link);?>" class="btn btn-warning" target="_blank">只读页面</a>
</div>
    <script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="/lib/jquery.textarea.js"></script>
    <script src="/lib/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
