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
        <p>Bootstrap | Jquery | Popper | font-awesome | wangeditor | clipboard.js | QRCode.js | FileSaver.js | jquery.wordexport.js
        <h3>创意来源</h3>
        <p>Notepad_live | 石墨文档</p>
        <h3>关于NPO</h3>
        <p>项目地址：<a href="https://github.com/2613df/NotepadOnline" target="_blank">Github</a><br>当前版本：3.21<br>更新内容：<br>1 优化滚动条样式和显示逻辑<br>2 优化保存 / 同步逻辑，支持多终端同步<br>3 优化文档样式<br>4 新增顶部广播<br>5 顶栏不再能被选中<br>6 优化分享功能<br>7 支持导出Word<br>8 修复一定情况下Word导出失败的问题<br>9 捕获组合按键，优化体验<br>10 优化工具栏<br>11 进一步优化移动端(含iPad)体验</p>
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
		<ul class="nav nav-pills mb-3" id="pills-share-tab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="pills-share-tab-std" data-toggle="pill" href="#pills-share-std" role="tab" aria-controls="pills-share-std" aria-selected="true">基本</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="pills-share-tab-key" data-toggle="pill" href="#pills-share-key" role="tab" aria-controls="pills-share-key" aria-selected="false">密码</a>
		  </li>
		  <!-- <li class="nav-item">
		    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
		  </li> -->
		</ul>
		<div class="tab-content" id="pills-tabContent">
		  <div class="tab-pane fade show active" id="pills-share-std" role="tabpanel" aria-labelledby="pills-share-tab-std">
			<div id="shareStatus"></div>
		    <form>
			<b>分享开关：</b><div id="getShareDiv"><a href="#" id="getShareBtn">点此获取当前状态</a></div>
			<br>
			<b>分享权限：</b><div class="custom-control custom-switch switchDiv"><input type="checkbox" id="shareRight" class="custom-control-input" disabled><label class="custom-control-label" for="shareRight">只能阅读</label></div>&nbsp;<small>分享链内容无法编辑只能阅读</small>
			<br><small>开发日志：分享链暂时不支持编辑</small><br>
			<p><b>固定分享链：</b>
			<div class="input-group">
				<input type="text" class="form-control" id="shareUrl" aria-describedby="inputGroupAppend" value="<?php echo $URL."/share/".dencrypt(1,$name);?>" readonly>
				<div class="input-group-append">
				  <span class="input-group-text" id="inputGroupPrepend"><a href="#" class="copy" data-clipboard-target="#shareUrl"><i class="fas fa-clipboard-list"></i>&nbsp;复制链接</a></span>
				</div>
			</div>
			</p>
			<p><b>二维码：</b><br>

			<img src="/lib/qr.php?urlcode=<?php echo $URL."/share/".dencrypt(1,$name);?>"/></p>
			</form>


		  </div>
		  <div class="tab-pane fade" id="pills-share-key" role="tabpanel" aria-labelledby="pills-share-tab-key">
		  	<div id="shareKeyStatus"></div>
		  	<b class="text-danger">请您保管好密码，密码遗失后将无法通过分享链访问您的内容<br>即使关闭分享后再次打开，密码依然存在，直至您在此删除密码</b>
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
				  <span class="input-group-text" id="inputGroupPrepend"><a href="#" class="copy" data-clipboard-target="#crtUrl"><i class="fas fa-clipboard-list"></i>&nbsp;复制链接</a></span>
				</div>
			</div>
			</p>
			<p><b>二维码：</b><br>

			<img src="/lib/qr.php?urlcode=<?php echo $URL."/".$esL.$name;?>"/></p>
			</form>


		  </div>
		  <div class="tab-pane fade" id="pills-config-key" role="tabpanel" aria-labelledby="pills-config-tab-key">
		  	<div id="configKeyStatus"></div>
		  	<b class="text-danger">请您保管好密码，密码遗失后将无法访问您的文档</b><br>
		  	
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

<div id="toastTop">
	<div id="toastTopTitle">
		<span id="toastTopTitleText"></span>
		<a href="#" id="toastTopClose">&times;</a></div>
	<div id="toastTopBody"></div>
</div>

<script src="http://cdn.staticfile.org/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
<script src="http://cdn.staticfile.org/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script crossorigin="anonymous" src="http://cdn.staticfile.org/font-awesome/5.13.0/js/all.min.js"></script>
<script type="text/javascript">
<?php
$ajaxJs = $es=='e'? "edit":"share";
include_once $templateFolder."assets/js/ajax.".$ajaxJs.".js.php";
?>
</script>
<!-- <script src="/<?php echo $templateFolder."assets/js/light.js";?>"></script> -->
<script src="https://cdn.staticfile.org/wangEditor/10.0.13/wangEditor.min.js"></script>
<script src="https://cdn.staticfile.org/clipboard.js/2.0.6/clipboard.min.js"></script>
<script src="https://cdn.staticfile.org/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script src="/assets/js/jquery.wordexport.js"></script>
<script>
//编辑器初始化
var E = window.wangEditor
var editor = new E('#toolDiv','#editorDiv')
editor.customConfig.zIndex = 1000;
editor.customConfig.menus = [
'head',  // 标题
'bold',  // 粗体
'fontSize',  // 字号
'fontName',  // 字体
'italic',  // 斜体
'underline',  // 下划线
'strikeThrough',  // 删除线
'foreColor',  // 文字颜色
'backColor',  // 背景颜色
'link',  // 插入链接
'list',  // 列表
'justify',  // 对齐方式
//'quote',  // 引用
//'emoticon',  // 表情
//'image',  // 插入图片
'table',  // 表格
//'video',  // 插入视频
//'code',  // 插入代码
'undo',  // 撤销
'redo'  // 重复
];
editor.create();
$(function () {
  $('[data-toggle="popover"]').popover()
  $('[data-toggle="tooltip"]').tooltip()
  // $('.w-e-menu').eq(6).after('<div class="visible-md-block">');
  // $('.w-e-menu').eq(13).after('</div>');
  $('.w-e-toolbar').attr("class","w-e-toolbar d-none d-lg-block")
})






//复制剪切板初始化
new ClipboardJS('.copy');

//toast初始化
var closeToastSTO;

//导出word初始化
function exportWordDo(){
	clearTimeout(closeToastSTO);
	$("#toastTop").attr("style","display:block");
	$("#toastTopTitleText").html('<i class="far fa-check-circle"></i>&nbsp;文档生成完毕');
	$("#toastTopBody").html('您的文档已开始下载。<br>若未出现下载提示，请确认浏览器是否拦截，以及在文档中是否包含引用、表情、图片、视频、代码等内容');
	$(".w-e-text").wordExport("<?php ($esN)?(print $name."(只读)"):(print $name);?>");
	closeToastSTO = setTimeout(function(){$("#toastTop").attr("style","display:none");},5000);
}
$("#exportBtnWord").click(function(){
	clearTimeout(closeToastSTO);
	$("#toastTop").attr("style","display:block");
	$("#toastTopTitleText").html('<i class="fas fa-sync-alt savingIcon"></i>&nbsp;文档生成中...');
	$("#toastTopBody").html('<span class="text-danger font-weight-bold">在文档中请勿包含引用、表情、图片、视频、代码，否则将生成失败或发生遗漏</span><br>文档正在生成导出中，请稍后');
	setTimeout(exportWordDo,2000);
});
$("#toastTopClose").click(function(){
	$("#toastTop").attr("style","display:none");
});

//组合键捕获初始化
$(function(){
 
	document.addEventListener('keydown', function(e){
		e = window.event || e;
		var keycode = e.keyCode || e.which;     
 
		// if(e.ctrlKey && keycode == 87){   //屏蔽Ctrl+w  
  //           e.preventDefault();
  //           window.event.returnValue = false;  
  //        }
  //        if(e.ctrlKey && keycode == 82){   //Ctrl + R 
  //           e.preventDefault(); 
  //           window.event.returnValue= false; 
  //        }
         if(e.ctrlKey && keycode== 83){ //Ctrl + S  
         	clearTimeout(closeToastSTO);
            e.preventDefault();
            window.event.returnValue= false;
			$("#toastTop").attr("style","display:block");
			$("#toastTopTitleText").html('小贴士');
			$("#toastTopBody").html('文档会自动保存');
			closeToastSTO = setTimeout(function(){$("#toastTop").attr("style","display:none");},2000);
         }
 
         // if(e.ctrlKey && keycode == 72){   //Ctrl + H 
         //    e.preventDefault();
         //    window.event.returnValue= false; 
         // }
         // if(e.ctrlKey && keycode == 74){   //Ctrl + J
         //    e.preventDefault(); 
         //    window.event.returnValue= false; 
         // }
         // if(e.ctrlKey && keycode == 75){   //Ctrl + K 
         //    e.preventDefault();
         //    window.event.returnValue= false; 
         // }
         // if(e.ctrlKey && keycode == 78){   //Ctrl + N
         //    e.preventDefault();
         //    window.event.returnValue= false; 
         // }        
	});
});
</script>
</body>
</html>
