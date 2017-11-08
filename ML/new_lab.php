
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Lab Name</label>
                  <input type="text" class="form-control" id="inputLab" name="inputLab" placeholder="Enter Lab Name">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="btnRegister" class="btn btn-primary">Register Lab</button>
              </div>
            </form>
<script>
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
    </script>