$(document).ready(function(){
  $('#content').keyup(debounce(function(){
    localStorage.setItem('content', $(this).val());
  },500));

  let initialText = `这是一个简单的离线笔记

  注意！
    
    - 离线笔记不会上传您的任何信息，因此十分安全。如果您对在线笔记安全性尚存疑虑，则可以临时储存于此
    - 离线笔记依赖浏览器缓存功能，因此清理缓存时请谨慎
    - 离线笔记目前尚处于早期测试阶段，一旦更新源代码，浏览器缓存将会重置，请不要在此存放任何贵重信息
    - 手机端访问时不妨试试"添加到主屏幕"
    - 离线笔记目前需要在线访问，将在1-2个版本后支持离线访问
    - 离线笔记参考了amitmerchant1990的notepad开源项目
  
  ** 尽情开始吧！ **`;

  if(localStorage.getItem('content') && localStorage.getItem('content')!=''){
    var contentItem = localStorage.getItem('content');
    $('#content').val(contentItem);
  } else {
    $('#content').val(initialText);
  }
  $('#clearNotes').on('click', function(){
    localStorage.setItem("content", '');
  });
});

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};