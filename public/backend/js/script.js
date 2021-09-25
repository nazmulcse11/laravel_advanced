
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

//data table
  $(function () {
    $("#example1").DataTable({
       "responsive": true,
       "lengthChange": false, 
       "autoWidth": false,
    });
  });


  //delete record
   $('.confirmDelete').click(function(){
      let record = $(this).attr('record');
      let recordid = $(this).attr('recordid');
      Swal.fire({
        title: 'Are you sure to delete?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => { 
        if (result.value) {
          window.location.href="/admin/delete-"+record+"/"+recordid;
        }
      })
    })