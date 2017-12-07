 $('#btnRegister').on('click',function(e){
                e.preventDefault();
                var labname = $('#inputLab').val();
                
                if(labname===""){
                  alert("Please fill in lab name fields to proceed with registration");
                }else{
                    $.ajax({
                     type:"post",
                     url:"query/registerLab.php",
                     data:{"labname":labname},
                     success:function(databack){
                         console.log(databack);
                         if(databack.trim()==="success"){
                             alert("Registration succeed!");
                             window.location = "index.php";
                         }else{
                             alert("Registration Fail,Something wrong and please try again later");
                         }
                     }
                    });
                }
            });