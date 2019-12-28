<?php ($visit) ? ("") : (header('location: /'));?>
<div class="modal fade" id="keyChangeWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">密码操作</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="col-form-label">旧密码：</label>
            <input type="text" class="form-control" id="oldPw" placeholder="若无请留空">
          </div>
          <div class="form-group">
            <label class="col-form-label">新密码：</label>
            <input type="text" class="form-control" id="newPw" placeholder="删密请留空">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="pwChangeCancel">算了</button>
        <input type='submit' class="btn btn-danger" id="pwChange" value='确认'>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="keyJudgeWindow" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">此笔记被加密，请输入密码</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="col-form-label">密码：</label>
            <input type="password" class="form-control" id="Pw" placeholder="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <input type='submit' class="btn btn-success" id="pwJudge" value='好的'>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="versionWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">注意事项</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>版本</h3>
        <p>当前版本为3.0RC1预发行版本<br>发行时间：2019/12/28<br>项目地址：<a href="https://github.com/2613df/NotepadOnline" target="_blank">Github</a><br>更新内容：代码重构，详见Github</p>
        <h3>注意事项</h3>
        <p>请注意，<?php echo $URL."/";?>不能也无法保证您笔记的安全与完整性，因此请勿存放重要内容。当前版本离线笔记功能已被删除，且未来可能不再加入。</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">好</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="shareWindow" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">分享成功！</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p>您的笔记已经分享成功了，您可以将您的想法通过共享笔记传达给您的朋友。<br>请注意，下方链接的共享笔记是只读的，他人可以查看您的笔记内容但无法修改，如希望他人修改请将本页链接共享给您的朋友。<br><b><font color="red">分享成功后请务必给当前页面下的笔记设下密码。</font></b></p><hr>
        <h3>访问方式</h3>
        <p>您可以通过访问<?php echo $URL."/share/".dencrypt(1,$name);?><br>或手机端扫描下方二维码访问<br><img src="http://qr.topscan.com/api.php?text=<?php echo $URL."/share/".dencrypt(1,$name);?>"/></p><hr>
        <h3>共享笔记密码操作</h3>
        <p>共享笔记默认无密码，可以为您分享的笔记设下密码或更换密码，来指定您的访问对象</p>
        <form>
          <div class="form-group">
            <label class="col-form-label">旧密码：</label>
            <input type="text" class="form-control" id="oldPwShare" placeholder="若无请留空">
          </div>
          <div class="form-group">
            <label class="col-form-label">新密码：</label>
            <input type="text" class="form-control" id="newPwShare" placeholder="删密请留空">
          </div>
          <button type="button" class="btn btn-danger" id="pwChangeShare">确认</button>
        </form>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="shareCloseBtn">取消共享</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">知道了</button>
      </div>
    </div>
  </div>
</div>

<div class="footer"><div class="container"><div id="controls">
	<span><?php echo $URL."/".$esL.$name;?></span><span id="processOK"> ...</span><br>
	<div class="btn-group">
    <a href="javascript:void(0)" class="btn btn-light" onclick="history.go(0)">刷新</a>
    <button type="button" class="btn btn-success" id = "keyBtn" data-toggle="modal" data-target="#keyChangeWindow">密码</button>
    <button type="button" class="btn btn-info" id = "shareBtn">分享</button>
    <button type="button" class="btn btn-secondary" id = "versionBtn" data-toggle="modal" data-target="#versionWindow">关于</button>
</div>
<button type="button" class="btn btn-success" id = "keyJudgeBtn" data-toggle="modal" data-target="#keyJudgeWindow" style="display: none;">输入密码</button>
<button type="button" class="btn btn-info" id = "shareSuccessBtn" data-toggle="modal" data-target="#shareWindow" style="display: none;">分享成功</button>
</div>
</div>
</div>
<script src="https://cdnjs.loli.net/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.loli.net/ajax/libs/popper.js/1.16.0/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script crossorigin="anonymous" src="https://cdnjs.loli.net/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
<script src="/<?php echo $templateFolder."assets/js/jquery.textarea.js";?>"></script>
<script type="text/javascript">
<?php
$ajaxJs = $es=='e'? "edit":"share";
include_once $templateFolder."assets/js/ajax.".$ajaxJs.".js.php";
?>
</script>
<script src="/<?php echo $templateFolder."assets/js/light.js";?>"></script>

</body>
</html>
