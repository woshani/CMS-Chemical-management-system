$('#btnUpdateUser').on('click',function(e){
    e.preventDefault();
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var notel = $('#notel').val();
    var userid = $('#userid').val();
    var userkey = $('#userkey').val();
    var datas = {fname:fname,lname:lname,email:email,notel:notel,userid:userid,method:"updateUser",key:userkey};
    console.log(datas);
    $.ajax({
      type:"post",
      url:"function/manageAccountFunction.php",
      data:datas,
      success:function(databack){
        console.log(databack);
        if(databack.trim()==="updateSuccess"){
          alert("your profile is saved!");
        }else{
          alert("you cannot do that now,something is wrong,try again later");
        }
      }
    });
  });

  $('#btnUpdatePass').on('click',function(e){
    e.preventDefault();
    var old = $.md5($('#old').val());
    var newPass = $.md5($('#new').val());
    var retypePass = $.md5($('#retype').val());
    

    if(old != ori){
      alert("your old password is incorrect!");
      $('#old').focus();
      console.log(ori);
    }else if(newPass != retypePass){
      alert("please make sure you re-type the new password correctly.");
      $('#retype').focus();
    }else if(old ==="" || newPass === "" || retypePass ===""){
      alert("do not leave the fields empty!");
    }else{
      
      var datas = {new:newPass,method:"updatePass",key:userkey,userid:userid};
      $.ajax({
        type:"post",
        url:"function/manageAccountFunction.php",
        data:datas,
        success:function(databack){
          console.log(databack);
          if(databack.trim()==="updateSuccess"){
            alert("your password is changed!");
            $('#old').val('');
            $('#new').val('');
            $('#retype').val('');
            location.reload();
          }else{
            alert("you cannot do that now,something is wrong,try again later");
          }
        }
      });
    }
  });