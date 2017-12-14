            $(document).ready(function(){
                
                //role to show and hide functioanlity
                
                switch(admin) {
                    case "No":
                        $('#regislabli').hide();
                        $('#assignlabli').hide();
                        $('#regis_lab').hide();
                        $('#assign_lab').hide();
                        $('#listchemicalli').show();
                        $('#list_Chemical_lab').show();
                        break;
                    case "Yes":
                        $('#regislabli').show();
                        $('#assignlabli').show();
                        $('#listchemicalli').show();
                        break;
                }
            });
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
 $('#viewTable #btnView').on('click',function(e){
                e.preventDefault();
                
                 var row = $(this).closest('tr');
                  var id = row.find('#id').val();
                  var name = row.find('#chemical').text();
                  var type = row.find('#type').val();
                  var status = row.find('#status').val();
                  var datein = row.find('#datein').val();
                  var expdate = row.find('#expdate').text();
                  var supliername = row.find('#supliername').val();
                  var qrcode = row.find('#qrcode').val();
                  var nameSv = row.find('#name').val();
                  var sds = row.find('#sds').val();
                  console.log(sds);
                  // console.log("Value: "+id+" "+name+" "+type+" "+status+" "+datein+" "+supliername+" "+qrcode+" "+nameSv);
                 $('#modalDetailChemical #tbleDetails td#LIchemicalName').html(name);
                 $('#modalDetailChemical #tbleDetails td#LItypeChemical').html(type);
                 $('#modalDetailChemical #tbleDetails td#LIstatusChemical').html(status);
                 $('#modalDetailChemical #tbleDetails td#LIdate').html(datein);
                 $('#modalDetailChemical #tbleDetails td#LIsupplierName').html(supliername);
                 $('#modalDetailChemical #tbleDetails td#LIqrcode').html(qrcode);
                 $('#modalDetailChemical #tbleDetails td#LIlab').html(nameSv);
                 $('#modalDetailChemical #tbleDetails td#LIexpdate').html(expdate);
                 $('#modalDetailChemical #tbleDetails a#LISDS').attr("href", "../SDS/"+sds);
                 $('#modalDetailChemical #tbleDetails a#LISDS').text(sds);
             
                 });