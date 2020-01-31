$("#pwChangeShare").click(function(){
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"s","name":"<?php echo dencrypt(1,$name)?>","do":"pwChange","opw":$("#oldPwShare").val(),"npw":$("#newPwShare").val()},
	//data:{"1":"1"},
	success:function(data){
			if(data.status=='OK'){
				$("#shareKeyStatus").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>修改成功</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}else{
				$("#shareKeyStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>修改失败</strong><br>旧密码错误。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
	},
	error:function(){
		$("#shareKeyStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>修改失败</strong><br>请求错误，请稍后再试或检查网络连接。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	},
	/*error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.status);
			alert(XMLHttpRequest.readyState);
			alert(errorThrown);
	},*/
	dataType:"json"
	});

});


$("#getShareBtn").click(function(){
	$.ajax({
		url: './lib/handle.php',
		type: "POST",
		data:{"es":"s","name":"<?php echo dencrypt(1,$name)?>","do":"noteRead"},
		success:function(data){
				if(data.status=='OK'){
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)" checked><label class="custom-control-label" for="shareSwitch">当前已打开</label></div>&nbsp;<small>获得分享链的人都可以访问内容</small>');
				}else if(data.status=='permissionDenied'){
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)" checked><label class="custom-control-label" for="shareSwitch">当前已打开</label></div>&nbsp;<small>获得分享链的人都可以访问内容</small>');
				}else if(data.status=='notExist'){
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)"><label class="custom-control-label" for="shareSwitch">当前已关闭</label></div>&nbsp;<small>只有知道当前文档的地址或文档名才可以访问</small>');
				}else if(data.status=='shareClosed'){
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)"><label class="custom-control-label" for="shareSwitch">当前已关闭</label></div>&nbsp;<small>只有知道当前文档的地址或文档名才可以访问</small>');
				}else{
					$("#getShareDiv").html('<a href="#" id="getShareBtn">请求失败，出错原因：' + data.status + '点此重试</a>');
				}
		},
		error:function(){
			$("#getShareDiv").html('<a href="#" id="getShareBtn">请求失败，点此重试</a>');
		},
		//error: function (XMLHttpRequest, textStatus, errorThrown) {
		//		alert(XMLHttpRequest.status);
		//		alert(XMLHttpRequest.readyState);
		//		alert(errorThrown);
		//},
		dataType:"json"
	});



});


function shareSwitchEve($shareSwitch){
	if ($shareSwitch == true){
		$.ajax({
		url: './lib/handle.php',
		type: "POST",
		data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"shareOpen"},
		success:function(data){
				if(data.status=='OK'){
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)" checked><label class="custom-control-label" for="shareSwitch">当前已打开</label></div>&nbsp;<small>获得分享链的人都可以访问内容</small>');
					$("#shareStatus").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>分享开启成功</strong><br>复制下方 分享链 给您的好友来完成分享吧。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}else{
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)"><label class="custom-control-label" for="shareSwitch">当前已关闭</label></div>&nbsp;<small>只有知道当前文档的地址或文档名才可以访问</small>');
					$("#shareStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>分享开启失败</strong><br>请稍候再试吧。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
		},
		error:function(){
			$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)"><label class="custom-control-label" for="shareSwitch">当前已关闭</label></div>&nbsp;<small>只有知道当前文档的地址或文档名才可以访问</small>');
			$("#shareStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>分享开启失败</strong><br>网络请求失败，请稍候再试吧。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		},
		dataType:"json"
		});
	}else{
		$.ajax({
		url: './lib/handle.php',
		type: "POST",
		//data: "&t=" + encodeURIComponent(content)
		data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"shareClose"},
		//data:{"1":"1"},
		success:function(data){
				if(data.status=='OK'){
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)"><label class="custom-control-label" for="shareSwitch">当前已关闭</label></div>&nbsp;<small>只有知道当前文档的地址或文档名才可以访问</small>');
					$("#shareStatus").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>分享关闭成功</strong><br>链接已无法访问。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				}else{
					$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)" checked><label class="custom-control-label" for="shareSwitch">当前已打开</label></div>&nbsp;<small>获得分享链的人都可以访问内容</small>');
					$("#shareStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>分享关闭失败</strong><br>请稍候再试吧。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
		},
		error:function(){
			$("#getShareDiv").html('<div class="custom-control custom-switch switchDiv"><input type="checkbox" class="custom-control-input" id="shareSwitch" onclick="shareSwitchEve(this.checked)" checked><label class="custom-control-label" for="shareSwitch">当前已打开</label></div>&nbsp;<small>获得分享链的人都可以访问内容</small>');
			$("#shareStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>分享关闭失败</strong><br>网络请求失败，请稍候再试吧。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		},
		dataType:"json"
		});
	}
};


$("#pwChange").click(function(){
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"pwChange","opw":$("#oldPw").val(),"npw":$("#newPw").val()},
	//data:{"1":"1"},
	success:function(data){
			if(data.status!='OK'){
				$("#configKeyStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>修改失败</strong><br>旧密码错误。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}else{
				$("#configKeyStatus").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>修改成功</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				history.go(0);
			}
	},
	error:function(){
		$("#configKeyStatus").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>修改失败</strong><br>请求错误，请稍后再试或检查网络连接。<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	},
	/*error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.status);
			alert(XMLHttpRequest.readyState);
			alert(errorThrown);
	},*/
	dataType:"json"
	});

});
$("#pwJudge").click(function(){
	//$("Pw").click();
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"pwJudge","pw":$("#Pw").val()},
	//data:{"1":"1"},
	success:function(data){
			if(data.status!='OK'){
				alert("密码错误");
			}else{
				history.go(0);
				//$("#pwChangeCancel").CLICK();
			}
	},
	error:function(){
		alert("请求失败");
	},
	/*error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert(XMLHttpRequest.status);
			alert(XMLHttpRequest.readyState);
			alert(errorThrown);
	},*/
	dataType:"json"
	});

});

$(function() {

	var content = editor.txt.html();
	var $lastEditTime = 0;

	$.ajax({//初次访问
		url: './lib/handle.php',
		type: "POST",
		//data: "&t=" + encodeURIComponent(content)
		data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteRead"},
		//data:{"1":"1"},
		success:function(data){
				if(data.status=='OK' || data.status=='notExist'){
					editor.txt.html(data.result);
					content = editor.txt.html();
					$("#savingStatus").html('&nbsp;<i class="far fa-check-circle"></i>&nbsp;请求成功').attr("class","text-success");
				}else if(data.status=='permissionDenied'){
					document.getElementById("keyJudgeBtn").click();
				}else if(data.status!='notExist'){
					$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，失败原因：' + data.status).attr("class","text-danger");
				}

		},
		error:function(){
			//alert("请求失败1");
			//$("#savingStatus").text(' X');
			$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，请务必在本地自行保存您的笔记，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
		},
		//error: function (XMLHttpRequest, textStatus, errorThrown) {
		//		alert(XMLHttpRequest.status);
		//		alert(XMLHttpRequest.readyState);
		//		alert(errorThrown);
		//},
		dataType:"json"
	});	


	function sync(){
	    
		$.ajax({
			url: './lib/handle.php',
			type: "POST",
			//data: "&t=" + encodeURIComponent(content)
			data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteRead"},
			//data:{"1":"1"},
			success:function(data){
					if(data.status=='OK' || data.status=='notExist'){
						editor.txt.html(data.result);
						content = editor.txt.html();
						$("#savingStatus").html('&nbsp;<i class="far fa-check-circle"></i>&nbsp;同步成功').attr("class","text-success");
					}else if(data.status!='notExist'){
						$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;同步失败，失败原因：' + data.status).attr("class","text-danger");
					}

			},
			error:function(){
				$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;同步失败，请务必在本地自行保存您的笔记，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
			},
			//error: function (XMLHttpRequest, textStatus, errorThrown) {
			//		alert(XMLHttpRequest.status);
			//		alert(XMLHttpRequest.readyState);
			//		alert(errorThrown);
			//},
			dataType:"json"
		});	

	}

	function updateN() {
            content = editor.txt.html();
			$.ajax({
				url: './lib/handle.php',
				type: "POST",
				//data: "&t=" + encodeURIComponent(content)
				data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteChange","data":content,"lastEditTime":$lastEditTime},
				//data:{"1":"1"},
				success:function(data){
						if(data.status!='OK'){
							$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;保存失败，请务必在本地自行保存您的笔记，失败原因：' + data.status).attr("class","text-danger");
						}else{
							editor.txt.html(data.result);
							$("#savingStatus").html('&nbsp;<i class="far fa-check-circle"></i>&nbsp;自动保存成功').attr("class","text-success");;
							
						}
				},
				error:function(){
					$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;保存失败，请务必在本地自行保存您的笔记，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
				},
				/*error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.readyState);
						alert(errorThrown);
				},*/
				dataType:"json"
			});
	};

	setInterval(function() {
        if (content != editor.txt.html()) {
            content = editor.txt.html();
            $("#savingStatus").html('&nbsp;<i class="fas fa-sync-alt savingIcon"></i>&nbsp;正在同步...').attr("class","text-muted");
			//setTimeout(updateN, 1000 );
			$lastEditTime = new Date().getTime();
        }
	}, 500);
	setInterval(function() {
		$.ajax({
			url: './lib/handle.php',
			type: "POST",
			data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"getLastTime"},
			success:function(data){
					//alert("data.result");
					//alert("Stime:" + parseInt(data.result) + "-Atime:" + $lastEditTime);
					if(parseInt(data.result) > $lastEditTime){
						$("#savingStatus").html('&nbsp;<i class="fas fa-sync-alt savingIcon"></i>&nbsp;正在同步...').attr("class","text-muted");
						sync();
						$lastEditTime=parseInt(data.result);
					}else if(parseInt(data.result) < $lastEditTime){
						updateN();
					}
			},
			error:function(){
				$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;同步失败，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
			},
			dataType:"json"
		});

	}, 1500);
});