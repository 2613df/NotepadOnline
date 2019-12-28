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
    var $textarea = $(".content");
    var content = $textarea.val();

    // Use jQuery Tabby Plugin to enable the tab key on textareas.
    $textarea.tabby();
	$textarea.focus();

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
					$textarea.text(data.result);
					$("#processOK").text(' √');
				}else if(data.status=='permissionDenied'){
					document.getElementById("keyJudgeBtn").click();
				}else if(data.status!='notExist'){
					alert(data.status);
					$("#processOK").text(' X');

				}

		},
		//error:function(){
		//	alert("请求失败1");
		//	$("#processOK").text(' X');
//
		//},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert(XMLHttpRequest.status);
				alert(XMLHttpRequest.readyState);
				alert(errorThrown);
		},
		dataType:"json"
	});

    // If content changes, update it.
	setInterval(function() {
        if (content !== $textarea.val()) {
            content = $textarea.val();
            //$("#processOK").text('&nbsp;...');
			$.ajax({
				url: './lib/handle.php',
				type: "POST",
				//data: "&t=" + encodeURIComponent(content)
				data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteChange","data":content},
				//data:{"1":"1"},
				success:function(data){
						if(data.status!='OK'){
							alert(data.status);
							$("#processOK").text(' X');
						}else{
							$textarea.text(data.result);
							$("#processOK").text(' ...');
							
						}
				},
				error:function(){
					alert("请求失败");
					$("#processOK").text(' X');

				},
				/*error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert(XMLHttpRequest.status);
						alert(XMLHttpRequest.readyState);
						alert(errorThrown);
				},*/
				dataType:"json"
			});

        }else{
			$("#processOK").text(' √');

        }
	}, 500);
});