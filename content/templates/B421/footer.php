<?php ($visit) ? ("") : (header('location: /'));?>
<div id="controls">
	<span>试试在别处上打开 <?php echo $URL."/".$isShareFolder.$name;?></span>
  <?php
    if(!$do and !$readOnly){//底部按钮
      $confirm="javascript:if(confirm('重置笔记将会使当前笔记内容丢失，并同时分配一个新的笔记地址，请确认您知道这么做的后果！')){location='/'}";
      echo  '<br><div class="btn-group">
            <a href="javascript:void(0)" class="btn btn-light" onclick="history.go(0)">刷新</a>
            <a href="'.$confirm.'" class="btn btn-danger">重置</a>
            <form name="form9" method="post" action="/'.$name.'" style="display:inline"> 
              <INPUT TYPE="hidden" name="setpw" value="1" /> 
              <button TYPE="submit" class="btn btn-success" >设定密码</button>
            </form>
            <form name="form10" method="post" action="/'.$name.'" style="display:inline"> 
              <INPUT TYPE="hidden" name="share" value="1" /> 
              <button TYPE="submit" class="btn btn-warning">获取只读页面</button>
            </form></div>';
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
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="/assets/js/jquery.textarea.js"></script>
<script src="/assets/js/script.js"></script>
</body>
</html>
