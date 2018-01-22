            $(document).ready(function(){
                
                //role to show and hide functioanlity
                
                switch(admin) {
                    case "No":
                        $('#regislabli').hide();
                        $('#assignlabli').hide();
                        $('#listlabli').hide();
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


$('#tbleAssignCh #btnAssign').on('click',function(e){
  var row = $(this).closest('tr');
  var id = row.find('#hiddenvaluess').val();
  $('#modalassignlab #labidHidden').val(id);
  console.log(id);
});

    $('#modalassignlab').on('hidden.bs.modal', function (e) {
       $(this)
               .find("input,textarea,select")
               .val('')
               .end()
               .find("input[type=checkbox], input[type=radio]")
               .prop("checked", "")
               .end();
    });

  $("#pjName").on('keyup', function () { 
        var input = $(this).val(); 
        if (input.length >= 2) { 
            $('#matchPJ').html('<img src="../img/LoaderIcon.gif"/>'); 
            var dataFields = {'input': input};
            $.ajax({
                type: "POST",
                url: "query/searchPJ.php",
                data: dataFields, 
                timeout: 3000,
                success: function (dataBack) { 
                    $('#matchPJ').html(dataBack); 
                    $('#matchListPJ li').on('click', function () { 
                        $('#pjName').val($(this).text());
                        $('#matchPJ').text('');
                        searchSVid(); 
                    });
                },
                error: function () { 
                    $('#matchPJ').text('Problem!');
                }
            });
        } else {
            $('#matchPJ').text('');
        }
});

 function searchSVid() {

    var id = $.trim($('#pjName').val());
    console.log(id);
    $.ajax({
        type: 'post',
        url: 'query/searchPJID.php',
        data: {'input': id},
        success: function (reply_data) {
          console.log(reply_data);
          var array_data = reply_data.split("|");
          var email = array_data[1];
          var userid = array_data[0];
          $('#pjID').val(userid.trim());
        }
    });

}

$('#modalassignlab #assignthepj').on('click',function(e){
  var idstaff = $('#modalassignlab #pjID').val();
  var idlab = $('#modalassignlab #labidHidden').val();
  var datas = {staff:idstaff,lab:idlab};
  if(idlab===""){
    alert("Please Choose the Lab Correctly");
  }else if(idstaff===""){
    alert("Please Choose the PJ First!");
  }else{
    $.ajax({
      type:"post",
      url:"query/assignTheLab.php",
      data:datas,
      success:function(databack){
        var x  = databack.trim();
        if(x === "already"){
          alert("this PJ already assign");
        }else if(x === "success"){
          alert("success Assigning the PJ");
          location.reload();
        }else if(x === "fail"){
          alert("fail to assign the PJ");
        }
      }
    });
  }
});

$('#selectLab').on('change',function(){
  var labid = $(this).val();
  $('#divLabList #viewTable tbody').html("");
  $.ajax({
      type:"post",
      url:"query/listChemLab.php",
      data:{labid:labid},
      success:function(databack){
        $('#divLabList #viewTable tbody').append(databack);
      }
  });
});


 $('#divLabList').on('click','#viewTable #btnView',function(e){
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