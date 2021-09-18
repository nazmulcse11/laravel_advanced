
//check current password
  $('#current_password').keyup(function(){
    var current_password = $('#current_password').val();
    $.ajax({
      url:'/admin/check-current-password',
      method:'post',
      data:{current_password:current_password},
      success:function(data){  
        if(data =='true'){
          $('#checkCurrentPassword').html('<p class="text-success">Current password is correct</p>');
        }else if(data == 'false'){
          $('#checkCurrentPassword').html('<p class="text-danger">Current password is wrong</p>');
        }
      },error:function(){
        alert('Error');
      }
    });
  });