$("#pwChangeShare").click(function(){
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"s","name":"<?php echo dencrypt(1,$name)?>","do":"pwChange","opw":$("#oldPwShare").val(),"npw":$("#newPwShare").val()},
	//data:{"1":"1"},
	success:function(data){
			if(data.status=='OK'){
				alert("修改成功");
			}else{
				alert("旧密码错误");
				//history.go(0);
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

$("#shareCloseBtn").click(function(){
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"shareClose"},
	//data:{"1":"1"},
	success:function(data){
			if(data.status=='OK'){
				alert("关闭分享成功");
			}else{
				alert("关闭分享失败，请尝试刷新后再试");
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
$("#shareBtn").click(function(){
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"shareOpen"},
	//data:{"1":"1"},
	success:function(data){
			if(data.status=='OK'){
				document.getElementById("shareSuccessBtn").click();
			}else{
				alert("分享失败，请尝试刷新后再试");
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
$("#pwChange").click(function(){
	$.ajax({
	url: './lib/handle.php',
	type: "POST",
	//data: "&t=" + encodeURIComponent(content)
	data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"pwChange","opw":$("#oldPw").val(),"npw":$("#newPw").val()},
	//data:{"1":"1"},
	success:function(data){
			if(data.status!='OK'){
				alert("旧密码错误");
			}else{
				alert("修改成功");
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
    //var $textarea = $(".content");
    var content = editor.txt.html();

    // Use jQuery Tabby Plugin to enable the tab key on textareas.
    //$textarea.tabby();
	//$textarea.focus();

    // Make content available to print.
    //$(".print").text(content);

    //初次访问
	$.ajax({
		url: './lib/handle.php',
		type: "POST",
		//data: "&t=" + encodeURIComponent(content)
		data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteRead"},
		//data:{"1":"1"},
		success:function(data){
				if(data.status=='OK'){
					editor.txt.html(data.result);
					$("#processOK").html('&nbsp;<i class="far fa-check-circle"></i>&nbsp;请求成功').attr("class","text-muted");
				}else if(data.status=='permissionDenied'){
					document.getElementById("keyJudgeBtn").click();
				}else if(data.status!='notExist'){
					$("#processOK").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，失败原因：' + data.status).attr("class","text-danger");
				}

		},
		error:function(){
			//alert("请求失败1");
			//$("#processOK").text(' X');
			$("#processOK").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，请务必在本地自行保存您的笔记，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
		},
		//error: function (XMLHttpRequest, textStatus, errorThrown) {
		//		alert(XMLHttpRequest.status);
		//		alert(XMLHttpRequest.readyState);
		//		alert(errorThrown);
		//},
		dataType:"json"
	});

    // If content changes, update it.
    //var syncSwitch = true;
	setInterval(function() {
        if (content !== editor.txt.html()) {
            content = editor.txt.html();
            $("#processOK").html('&nbsp;<div class="spinner-border text-secondary spinner-border-sm" role="status"><span class="sr-only"></span></div>&nbsp;正在保存...').attr("class","text-muted");;
			$.ajax({
				url: './lib/handle.php',
				type: "POST",
				//data: "&t=" + encodeURIComponent(content)
				data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteChange","data":content},
				//data:{"1":"1"},
				success:function(data){
						if(data.status!='OK'){
							$("#processOK").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;保存失败，请务必在本地自行保存您的笔记，失败原因：' + data.status).attr("class","text-danger");
						}else{
							editor.txt.html(data.result);
							$("#processOK").html('&nbsp;<i class="far fa-check-circle"></i>&nbsp;自动保存成功').attr("class","text-muted");;
							
						}
				},
				error:function(){
					$("#processOK").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;保存失败，请务必在本地自行保存您的笔记，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
				},
				/*error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.readyState);
						alert(errorThrown);
				},*/
				dataType:"json"
			});
        }
	}, 1000);
});