<?php ($visit) ? ("") : (header('location: /'));?>
<div id="controls">
	<span>试试在其他设备上打开<?php echo $URL."/".$isShareFolder.$name;?></span>
  <?php
    if(!$do and !$readOnly){//底部按钮
      $confirm="javascript:if(confirm('重置笔记将会使当前笔记内容丢失，并同时分配一个新的笔记地址，请确认您知道这么做的后果！')){location='/'}";
      echo  '<br>
            <a href="javascript:void(0)" class="btn btn-default" onclick="history.go(0)">刷新</a>
            <a href="'.$confirm.'" class="btn btn-danger">重置</a>
            <form name="form9" method="post" action="/'.$name.'" style="display:inline"> 
              <INPUT TYPE="hidden" name="setpw" value="1" /> 
              <INPUT TYPE="submit" name="" value ="设定密码" class="btn btn-success" >  
            </form>
            <form name="form10" method="post" action="/'.$name.'" style="display:inline"> 
              <INPUT TYPE="hidden" name="share" value="1" /> 
              <INPUT TYPE="submit" name="" value ="获取只读页面" class="btn btn-warning" >  
            </form>';
    }
    if($readOnly){
      echo '<br><form name="form11" method="post" action="/share/'.$name.'" style="display:inline"> 
              <INPUT TYPE="hidden" name="share" value="0" /> 
              <INPUT TYPE="submit" name="" value ="关闭共享权限" class="btn btn-warning" >  
            </form>';

    }
  ?>
</div>



<!--备用的BootStrap JS 3.4以及Jquery 1.11.1地址
<script src="/<?php echo $templateFolder."assets/js/jquery.min.js";?>"></script>
<script src="/<?php echo $templateFolder."assets/js/bootstrap.min.js";?>"></script>
-->
<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="/assets/js/jquery.textarea.js"></script>
<script src="/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
