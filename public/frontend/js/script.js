
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


  // enroll now
  $('#enroll_form').on('submit',function(e){
    e.preventDefault();
    let name = $('#name').val();
    let mobile = $('#mobile').val();
    let course = $('#course').val();
    // alert(name + mobile + course);
    $.ajax({
      url:'/enroll-for-course',
      method:'post',
      data:{name:name,mobile:mobile,course:course},
      success:function(data){ 
        console.log(data);
        
        if(data.status =='true'){
          $('#enroll_success').html('<p class="text-success">Enroll success. We will contact you soon.</p>');
          $('#enroll_form')['0'].reset();
          $('#name_error').text('');
          $('#mobile_error').text('');
          $('#course_error').text('');
        }
      },error:function(data){
          $('#name_error').text(data.responseJSON.errors.name);
          $('#mobile_error').text(data.responseJSON.errors.mobile);
          $('#course_error').text(data.responseJSON.errors.course);
       }
    });
  })