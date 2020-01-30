<?php ($visit) ? ("") : (header('location: /'));?>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">关于</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>感谢捐助</h3>
        <p>Alex Lee</p>
        <h3>使用的开源程序</h3>
        <p>Bootstrap | Jquery | Popper | font-awesome | wangeditor | clipboard.js | QRCode.js</p>
        <h3>idea来源</h3>
        <p>Notepad_live | 石墨文档</p>
        <h3>关于NPO</h3>
        <p>项目地址：<a href="https://github.com/2613df/NotepadOnline" target="_blank">Github</a><br>当前版本：3.1</p>
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
        <h5 class="modal-title" id="exampleModalScrollableTitle">分享</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">基本</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">密码</a>
		  </li>
		  <!-- <li class="nav-item">
		    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
		  </li> -->
		</ul>
		<div class="tab-content" id="pills-tabContent">
		  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		    <form>
			<p><b>分享开关：</b>
			<button type="button" class="btn btn-secondary" data-dismiss="modal" id="shareCloseBtn">取消共享</button>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="shareSwitch" checked>
				<label class="custom-control-label" for="shareSwitch">分享</label>
				<small>打开开关后，获取链接的人都可以只读访问，但无法修改您的内容</small>
			</div>
			</p>
			<p><b>链接：</b>
			<div class="input-group">
				<input type="text" class="form-control" id="shareUrl" aria-describedby="inputGroupAppend" value="<?php echo $URL."/share/".dencrypt(1,$name);?>" readonly>
				<div class="input-group-append">
				  <span class="input-group-text" id="inputGroupPrepend"><a href="#" class="copy" data-clipboard-target="#shareUrl"><i class="fas fa-clipboard-list"></i>复制链接</a></span>
				</div>
			</div>
			</p>
			<p><b>二维码：</b><br>

			<img src="http://qr.topscan.com/api.php?text=<?php echo $URL."/share/".dencrypt(1,$name);?>"/></p>
			</form>


		  </div>
		  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			  <div class="form-group">
			    <label class="col-form-label">旧密码：</label>
			    <input type="text" class="form-control" id="oldPwShare" placeholder="若无请留空">
			  </div>
			  <div class="form-group">
			    <label class="col-form-label">新密码：</label>
			    <input type="text" class="form-control" id="newPwShare" placeholder="删密请留空">
			  </div>
			  
			<button type="button" class="btn btn-danger" id="pwChangeShare">确认</button>



		  </div>
		  <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">..3.</div> -->
		</div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">知道了</button>
      </div> -->
    </div>
  </div>
</div>





<div class="modal fade" id="configWindow" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">设定</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<ul class="nav nav-pills mb-3" id="pills-config-tab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="pills-config-tab-std" data-toggle="pill" href="#pills-config-std" role="tab" aria-controls="pills-config-std" aria-selected="true">基本</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="pills-config-tab-key" data-toggle="pill" href="#pills-config-key" role="tab" aria-controls="pills-config-key" aria-selected="false">密码</a>
		  </li>

		</ul>
		<div class="tab-content" id="pills-tabContent">
		  <div class="tab-pane fade show active" id="pills-config-std" role="tabpanel" aria-labelledby="pills-config-tab-std">
		    <form>
			<p><b>链接：</b>
			<div class="input-group">
				<input type="text" class="form-control" id="crtUrl" aria-describedby="inputGroupAppend" value="<?php echo $URL."/".$esL.$name;?>" readonly>
				<div class="input-group-append">
				  <span class="input-group-text" id="inputGroupPrepend"><a href="#" class="copy" data-clipboard-target="#crtUrl"><i class="fas fa-clipboard-list"></i>复制链接</a></span>
				</div>
			</div>
			</p>
			<p><b>二维码：</b><br>

			<img src="http://qr.topscan.com/api.php?text=<?php echo $URL."/".$esL.$name;?>"/></p>
			</form>


		  </div>
		  <div class="tab-pane fade" id="pills-config-key" role="tabpanel" aria-labelledby="pills-config-tab-key">
	        <form>
	          <div class="form-group">
	            <label class="col-form-label">旧密码：</label>
	            <input type="text" class="form-control" id="oldPw" placeholder="若无请留空">
	          </div>
	          <div class="form-group">
	            <label class="col-form-label">新密码：</label>
	            <input type="text" class="form-control" id="newPw" placeholder="删密请留空">
	          </div>
	        <input type='submit' class="btn btn-danger" id="pwChange" value='确认'>
	        </form>
		  </div>
		</div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">知道了</button>
      </div> -->
    </div>
  </div>
</div>









<script src="https://cdnjs.loli.net/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.loli.net/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script crossorigin="anonymous" src="https://cdnjs.loli.net/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
<script src="/<?php echo $templateFolder."assets/js/jquery.textarea.js";?>"></script>
<script type="text/javascript">
<?php
$ajaxJs = $es=='e'? "edit":"share";
include_once $templateFolder."assets/js/ajax.".$ajaxJs.".js.php";
?>
</script>
<script src="/<?php echo $templateFolder."assets/js/light.js";?>"></script>
<script src="https://unpkg.com/wangeditor/release/wangEditor.min.js"></script>
<script>
	var E = window.wangEditor
	var editor = new E('#toolDiv','#editorDiv')
	editor.customConfig.zIndex = 1000
	editor.create();
	$(".w-e-text-container").css('height','calc(100% - 36px)').css('z-index','100');//修正Editor高度
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<script src="https://cdnjs.loli.net/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script>
new ClipboardJS('.copy');
</script>
</body>
</html>
