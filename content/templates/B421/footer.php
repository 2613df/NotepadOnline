<?php ($visit) ? ("") : (header('location: /'));?>
<div class="footer <?php ($do)?(print "footerNoBtn"):(print "footerBtn");?>"><div class="container"><div id="controls">
	<span>试试在别处上打开 <?php echo $URL."/".$isShareFolder.$name;?></span>
  <?php
    if(!$do and !$readOnly){//底部按钮
      $confirm="javascript:if(confirm('重置笔记将会使当前笔记内容丢失，并同时分配一个新的笔记地址，请确认您知道这么做的后果！')){location='/'}";
	  $confirmN="{if(confirm('重置后将分配新的笔记空间，原笔记只能通过浏览记录找回，您确认重置吗?')){window.location='/';return true;}return false;}";
      echo  '<br>
			<div class="btn-group">
				<a href="javascript:void(0)" class="btn btn-light" onclick="history.go(0)">刷新</a>
				<!--a href="'.$confirm.'" class="btn btn-warning">重置</a-->
				<a href="javascript:void(0)" class="btn btn-warning" onclick="'.$confirmN.'">重置</a>
				<form name="form9" method="post" action="/'.$name.'" style="display:none"> 
				  <INPUT TYPE="hidden" name="setpw" value="1" /> 
				  <input TYPE="submit" name="button"/>
				</form>
				<a href="javascript:void(0)" class="btn btn-success" target="_self" onclick="javascript:document.form9.button.click();">设密</a>
				<form name="form10" method="post" action="/'.$name.'" style="display:none"> 
				  <INPUT TYPE="hidden" name="share" value="1" /> 
				  <input TYPE="submit" name="button"/>
				</form>
				<a href="javascript:void(0)" class="btn btn-info" target="_self" onclick="javascript:document.form10.button.click();">分享</a>
			</div>';
    }
    if($readOnly and $fileShare){
      echo '<br><form name="form11" method="post" action="/share/'.$name.'" style="display:inline"> 
              <INPUT TYPE="hidden" name="share" value="0" /> 
              <INPUT TYPE="submit" name="" value ="关闭共享权限" class="btn btn-warning" >  
            </form>';

    }
  ?>
</div>
</div>
</div>


<!--备用的BootStrap JS 3.4以及Jquery 1.11.1地址
<script src="/<?php echo $templateFolder."assets/js/jquery.min.js";?>"></script>
<script src="/<?php echo $templateFolder."assets/js/bootstrap.min.js";?>"></script>
-->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="/assets/js/jquery.textarea.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>
