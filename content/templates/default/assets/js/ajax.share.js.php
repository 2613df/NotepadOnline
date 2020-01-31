$("#pwJudge").click(function(){
	//$("Pw").click();
	$.ajax({
	url: '../lib/handle.php',
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
	$("#moreTog").attr("style","display:none");
	$("#newPageBtn").attr("style","display:none");
	$("#teamworkBtn").attr("style","display:none");
	$("#pills-config-tab").attr("style","display:none");
	$("#shareBtn").attr("style","display:none");
	$(".w-e-toolbar").attr("style","display:none");
	
	editor.$textElem.attr('contenteditable', false)

    //初次访问
	$.ajax({
		url: '../lib/handle.php',
		type: "POST",
		//data: "&t=" + encodeURIComponent(content)
		data:{"es":"<?php echo $es?>","name":"<?php echo $name?>","do":"noteRead"},
		//data:{"1":"1"},
		success:function(data){
				if(data.status=='OK'){
					editor.txt.html(data.result);
					$("#savingStatus").html('&nbsp;<i class="far fa-check-circle"></i>&nbsp;请求成功').attr("class","text-success");
				}else if(data.status=='permissionDenied'){
					document.getElementById("keyJudgeBtn").click();
				}else if(data.status=='notExist'){
					$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，失败原因：' + data.status).attr("class","text-danger");
				}else if(data.status=='shareClosed'){
					$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，失败原因：分享被关闭').attr("class","text-danger");
				}

		},
		error:function(){
			$("#savingStatus").html('&nbsp;<i class="far fa-times-circle"></i>&nbsp;请求失败，失败原因：连接失败，请检查网络连接').attr("class","text-danger");
		},
		//error: function (XMLHttpRequest, textStatus, errorThrown) {
		//		alert(XMLHttpRequest.status);
		//		alert(XMLHttpRequest.readyState);
		//		alert(errorThrown);
		//},
		dataType:"json"
	});

});