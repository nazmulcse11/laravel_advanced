
// Sticky nav
document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 50) {
            document.getElementById('navbar_top').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
          } else {
            document.getElementById('navbar_top').classList.remove('fixed-top');
             // remove padding top from body
            document.body.style.paddingTop = '0';
          } 
      });
    }); 


//check current password
  $('#current_password').keyup(function(){
    var current_password = $('#current_password').val();
    $.ajax({
      url:'/check-current-password',
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