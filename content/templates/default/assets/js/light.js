$(document).ready(function(){

  let darkmodeText = '关灯';
  let lightmodeText = '开灯';
  let darkmodeClass = 'btn btn-dark';
  let lightmodeClass = 'btn btn-light';

  if(localStorage.getItem('mode') && localStorage.getItem('mode')!=''){
    if(localStorage.getItem('mode') == 'dark'){
      $(document.body).addClass('dark');
      $('#mode').html('☀️').attr('title', lightmodeText).attr('class', lightmodeClass);
    }else{
      $(document.body).removeClass('dark');
      $('#mode').html('🌘').attr('title', darkmodeText).attr('class', darkmodeClass);
    }
  }

  $('#clearNotes').on('click', function(){
    // $('#content').val('').focus();
    editor.txt.html('');
  });
	

  $('#mode').click(function(){
    $(document.body).toggleClass('dark');
    let bodyClass = $(document.body).attr('class');

    if(bodyClass == 'dark'){
      localStorage.setItem('mode', 'dark');
      $(this).html('☀️').attr('title', lightmodeText).attr('class', lightmodeClass);
    } else {
      localStorage.setItem('mode', 'light');
      $(this).html('🌘').attr('title', darkmodeText).attr('class', darkmodeClass);
    }
  });

});

