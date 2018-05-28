
// this for create object for qr scanner
let scannerReuse = new Instascan.Scanner({ video: document.getElementById('camReuse') });
let scannerReturn = new Instascan.Scanner({ video: document.getElementById('camReturn') });
let scannerDispose = new Instascan.Scanner({ video: document.getElementById('camDispose') });
let scannerRegister = new Instascan.Scanner({ video: document.getElementById('camRegister') });
/////////////////////////////////////
$(document).ready(function () {
    var tarikhHarini = new Date();
    $('#expired').datepicker({ changeYear: true, changeMonth: true, minDate: tarikhHarini });
    // $('#spanImgDate').datepicker({changeYear: true,changeMonth: true, minDate: tarikhHarini});
    $('#camRegister').hide();
    $('#camReuse').hide();
    $('#camReturn').hide();
    $('#camDispose').hide();
    $('#viewTable').dataTable({
        "language": {
            "emptyTable": "No chemical that you registered"
        }
    });
    $('#viewTableDua').dataTable({
        "language": {
            "emptyTable": "No Chemical in your use's list"
        }
    });
    //role to show and hide functioanlity

    switch (role) {
        case "PJ":
            $('#ownerNamePJ').show();
            break;
        case "Student":
            $('#ownerNamePJ').hide();
            $('#liListChemical').hide();
            $('#list_chemical').hide();

            $('#liapprovePrivate').hide();
            $('#approve_chemical').hide();

            $('#liapproveRegisChem').hide();
            $('#approve_chemical_regis').hide();

            $('#list_chemical_using').addClass("active");
            $('#ownerNamePJ #ownerID').val(supervisorid);

            $('#lidispose').hide();
            $('#dispose_chemical').hide();

            $('#lireport').hide();
            break;
        default:
            $('#ownerNamePJ').hide();
            $('#ownerNamePJ #ownerID').val(useridxx);
    }
});

function newName(qrcode, id_chemical) {
    var name = "SDS" + id_chemical + "_" + qrcode;
    return name;
}
// upload SDS function---------------------------------------------------------------------
function uploadFile(newname) {
    var input = document.getElementById("sdsfile");
    file = input.files[0];
    formData = new FormData();
    formData.append("PDF", file);

    formData.append("newname", newname);
    $.ajax({
        url: "function/upload.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log("nama baru file" + data);
        }
    });
    var ext = file.name.slice((Math.max(0, file.name.lastIndexOf(".")) || Infinity) + 1);
    return newname + "." + ext;
}
//----------------------------------------------------------------------
//----- seach owner name n id ------------------------------------------

$("#owner").on('keyup', function () {
    var input = $(this).val();
    if (input.length >= 2) {
        $('#matchOwner').html('<img src="../img/LoaderIcon.gif"/>');
        var dataFields = { 'input': input };
        $.ajax({
            type: "POST",
            url: "function/searchOwner.php",
            data: dataFields,
            timeout: 3000,
            success: function (dataBack) {
                $('#matchOwner').html(dataBack);
                $('#matchListOwner li').on('click', function () {
                    $('#owner').val($(this).text());
                    $('#matchOwner').text('');
                    searchOwnerid();
                });
            },
            error: function () {
                $('#matchOwner').text('Problem!');
            }
        });
    } else {
        $('#matchOwner').text('');
    }
});

function searchOwnerid() {
    var id = $.trim($('#matchOwner').val());
    console.log(id);
    $.ajax({
        type: 'post',
        url: 'function/searchOwnerID.php',
        data: { 'input': id },
        success: function (reply_data) {
            console.log(reply_data);
            var array_data = reply_data.split("|");
            var email = array_data[1];
            var userid = array_data[0];
            $('#ownerID').val(userid.trim());
            $('#ownerEmail').val(email.trim());
        }
    });

}
//-------------------------------------------------------------------------------------------------
//--------------- search chemical name ---------------------------------
$("#Chemicalname").on('keyup', function () {
    var input = $(this).val();
    if (input.length >= 2) {
        $('#matchChemical').html('<img src="../img/LoaderIcon.gif"/>');
        var dataFields = { 'input': input };
        $.ajax({
            type: "POST",
            url: "function/searchChemical.php",
            data: dataFields,
            timeout: 3000,
            success: function (dataBack) {
                $('#matchChemical').html(dataBack);
                $('#matchListChemical li').on('click', function () {
                    $('#Chemicalname').val($(this).text());
                    $('#matchChemical').text('');
                    searchChemicalid();
                });
            },
            error: function () {
                $('#matchChemical').text('Problem!');
            }
        });
    } else {
        $('#matchChemical').text('');
    }
});

function searchChemicalid() {

    var id = $.trim($('#Chemicalname').val());
    console.log(id);
    $.ajax({
        type: 'post',
        url: 'function/searchChemicalID.php',
        data: { 'input': id },
        success: function (reply_data) {
            console.log(reply_data);
            var array_data = reply_data.split("|");
            var name = array_data[1];
            var id = array_data[0];
            var typeC = array_data[2];
            var physicalType = array_data[3];
            var engcontrol = array_data[4];
            var ppe = array_data[5];
            var tclass = array_data[6];
            var ghs = array_data[7];
            $('#chemicalIDRegis').val(id.trim());
            $('#type').val(typeC.trim());
            $('input[name=eng][value=' + engcontrol.trim() + ']').prop('checked', true);
            $('input[name=ppe][value=' + ppe.trim() + ']').prop('checked', true);

            $('#tableResultSearchChemical #resName').text(name);
            $('#tableResultSearchChemical #resType').text(physicalType);
            $('#tableResultSearchChemical #resCon').text(engcontrol);
            $('#tableResultSearchChemical #resPP').text(ppe);
            $('#tableResultSearchChemical #resClass').text(tclass);
            $('#tableResultSearchChemical #resGHS').text(ghs);

        }
    });

}

$('#btn_register_chemical').on('click', function (e) {
    $body.addClass("loading");
    var id_chemical = $.trim($('#chemicalIDRegis').val());
    var id_owner = $.trim($('#ownerID').val());
    var email_owner = $.trim($('#ownerEmail').val());
    var id_user = useridxx;
    var id_lab = $.trim($('#lab').val());
    var dateexp = $.trim($('#expired').val());
    var splitdate = dateexp.split("/");
    var newDate = splitdate[2] + "-" + splitdate[0] + "-" + splitdate[1];
    var status = $.trim($('#statusChemicalPrivatePublic').val());
    var supplier = $.trim($('#supplier').val());
    var qrcode = $.trim($('#qrcodeRegisterID').val());
    var stats = "";
    var newname = newName(qrcode, id_chemical);
    var sds = uploadFile(newname);
    var identifyid = identifyidxx;
    var quantity = $.trim($('#quantity').val());
    console.log("id chemicals " + id_chemical);
    if ($("#REGtypechemical").is(':checked')) {
        stats = "In Use";
    } else {
        stats = "Available";
    }


    if (id_chemical == "") {
        alert("Please make sure you entered the correct chemical name");
    } else if (id_owner == "") {
        alert("Please make sure you entered the correct owner name");
    } else if (id_lab == "") {
        alert("Please make sure you select the lab");
    } else if (dateexp == "") {
        alert("Please make sure you select the expired date for this chemical");
    } else if (status == "") {
        alert("Please make sure you select the type of chemical for public or private");
    } else if (qrcode == "") {
        alert("Please make sure you scan the qrcode first");
    } else if (sds == "") {
        alert("Please make sure you choose SDS file to upload");
    } else if (supplier == "") {
        alert("Please make sure you fill the supplier name");
    } else if (quantity == " ") {
        alert("Please make sure you fill the amount of quantity");
    } else {
        $.ajax({
            type: "post",
            url: "function/registerChemical.php",
            data: { id_chemical: id_chemical, id_owner: id_owner, id_lab: id_lab, dateexp: newDate, status: status, supplier: supplier, qrcode: qrcode, stats: stats, sds: sds, identifyid: identifyid, id_user: id_user, quantity: quantity, email: email_owner },
            success: function (databack) {
                if ($.trim(databack) === "success") {
                    console.log(stats);
                    if (stats == "In Use") {
                        $.ajax({
                            type: "post",
                            url: "function/registerChemicalUsage.php",
                            data: { id_chemical: id_chemical, id_owner: id_user, id_lab: id_lab, dateexp: newDate, status: status, supplier: supplier, qrcode: qrcode, stats: stats, sds: sds },
                            success: function (data) {
                                console.log(data);
                                $body.removeClass("loading");
                                if ($.trim(data) === "success") {
                                    alert("Registration succeed,please wait for approval");
                                    location.reload();
                                }
                            }
                        });
                    } else {
                        $body.removeClass("loading");
                        alert("Registration succeed,please wait for approval");
                        location.reload();
                    }

                } else if ($.trim(databack) === "qrcode") {
                    $body.removeClass("loading");
                    alert("The QrCode has already being used!,please use another QrCode!");
                } else {
                    $body.removeClass("loading");
                    alert("Registration failed");
                    console.log(databack);
                }
            }
        })
    }


});


$('#userTable #btnAccept').on('click', function (e) {
    e.preventDefault();
    $body.addClass("loading");
    var row = $(this).closest('tr');
    var key = row.find('#keyStud').text();
    var keyEmail = row.find('#keyEmali').text();
    var ciid = row.find('#ciidapprove').val();
    var ciud = row.find('#ciudapprove').val();
    // alert(key);
    var datas = { method: "updateRole", identifyid: key, email: keyEmail, subject: "CMS- User Reuse Chemical Request", message: "Your Request to used the chemical are Successfully, Thank You", ciid: ciid, ciud: ciud };
    $.ajax({
        type: "post",
        url: "function/manageChemicalApprove.php",
        data: datas,
        success: function (databack) {
            //console.log(databack);
            $body.removeClass("loading");
            if (databack.trim() === "updateSuccess") {
                alert("Request successfully approve");
            } else if (databack.trim() === "chemicalused") {
                alert("Chemical already being used by someone else");
            } else if (databack.trim() === "updateFailed") {
                alert("Failed to approve the student request!,try again later.");
            } else {
                alert("request has been approved,but email notification has some issues.");
            }
            location.reload();
        }
    });

});

$('#userTable #btnReject').on('click', function (e) {
    e.preventDefault();
    $body.addClass("loading");
    var row = $(this).closest('tr');
    var key = row.find('#keyStud').text();
    var keyEmail = row.find('#keyEmali').text();
    var ciid = row.find('#ciidapprove').val();
    var ciud = row.find('#ciudapprove').val();
    // alert(key);
    var datas = { method: "rejectApprove", identifyid: key, email: keyEmail, subject: "CMS- User Reuse Chemical Request", message: "Your request to used the chemical are Rejected Please context your supervisor / PJ, Thank You", ciid: ciid, ciud: ciud };
    $.ajax({
        type: "post",
        url: "function/manageChemicalApprove.php",
        data: datas,
        success: function (databack) {
            $body.removeClass("loading");
            //console.log(databack);
            if (databack.trim() === "updateSuccess") {
                alert("request rejected");
            } else if (databack.trim() === "chemicalused") {
                alert("Chemical already being used by someone else");
            } else if (databack.trim() === "updateFailed") {
                alert("Failed to reject the student request!,try again later.");
            } else {
                alert("request has been rejected,but email notification has some issues.");
            }
            location.reload();
        }
    });

});
$('#qrcodeReuse').on('click', function () {
    $('#camReuse').toggle(function () {
        if ($(this).is(':visible')) {
            scannerReuse.addListener('scan', function (content) {
                console.log(content);
                //document.getElementById("qrcodeReuse").value=content;
                // $('#qrcodeReuse').val(content);
                document.getElementById("qrcodeReuseInput").value = content;
                scannerReuse.stop();
                getReuse();
                $('#camReuse').hide();

            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scannerReuse.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        } else if ($(this).is(':hidden')) {
            scannerReuse.stop();
        }
    });

});

$('#qrcodeReturn').on('click', function () {
    $('#camReturn').toggle(function () {
        if ($(this).is(':visible')) {
            scannerReturn.addListener('scan', function (content) {
                console.log(content);
                //document.getElementById("qrcodeReuse").value=content;
                // $('#qrcodeReuse').val(content);
                document.getElementById("qrcodeReturnInput").value = content;
                scannerReturn.stop();
                getReturn();
                $('#camReturn').hide();

            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scannerReturn.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        } else if ($(this).is(':hidden')) {
            scannerReturn.stop();
        }
    });
});



function getReuse() {
    var QrCode = $('#qrcodeReuseInput').val();
    $.ajax({
        type: "post",
        url: "function/reuseChemical.php",
        data: { 'QrCode': QrCode },
        success: function (databack) {
            $('#reuseData').html(databack);
            $('#insert_btnReuse').prop('disabled', false);
        }
    });
}
function getReturn() {
    var QrCode = $('#qrcodeReturnInput').val();
    var useridreturn = useridxx;

    $.ajax({
        type: "post",
        url: "function/returnChemical.php",
        data: { 'QrCode': QrCode, userid: useridreturn },
        success: function (databack) {
            $('#returnData').html(databack);
            $('#insert_btnReturn').prop('disabled', false);
        }
    });
}

$('#insert_btnReuse').on('click', function (e) {

    var chemicalId = $('#chemicalInId').val();
    var cserId = $('#chemicalUserId').val();
    var email = $('#email').val();
    var sub = $('#sub').val();
    var message = $('#message').val();
    var type = $('#chemicalTypePrivate').val();
    var ownerid = $('#ownerid').val();
    var messagepublic = $('#messagepublic').val();
    var quantity = $('#initial_quantity').val();
    if (quantity === "") {
        alert("Please make sure quantity is inserted");
    } else {
        $body.addClass("loading");
        $.ajax({
            type: "post",
            url: "function/reuseNewChemical.php",
            data: { 'chemicalId': chemicalId, 'cserId': cserId, 'email': email, 'sub': sub, 'message': message, 'type': type, ownerid: ownerid, messagepublic: messagepublic, quantity: quantity },
            success: function (databack) {
                $body.removeClass("loading");
                if (databack.trim() === "success") {
                    alert("Request success");
                } else if (databack.trim() === "fail") {
                    alert("Request failed! Please request later");
                } else {
                    alert("Request Success,but email notification seem has an issues");
                    console.log(databack);
                }
                //location.reload();
            }
        });
    }


});


$('#insert_btnReturn').on('click', function (e) {
    $body.addClass("loading");
    var chemicalId = $('#chemicalInId').val();
    var cserId = $('#chemicalUserId').val();
    var userchemicalid = $('#chemicalUserIdPeminjam').val();
    var email = $('#email').val();
    var sub = $('#sub').val();
    var message = $('#message').val();
    var status = $('#returnStatus').val();
    var cuid = $('#chemicalusagepunyeid').val();
    var remaining = $('#remaining_quantity').val();

    if (status === "Available" && remaining === "") {
        alert("Please make sure remaining quantity of the chemical is inserted");
    } else {
        $.ajax({
            type: "post",
            url: "function/returnNewChemical.php",
            data: { 'chemicalId': chemicalId, 'cserId': cserId, 'email': email, 'sub': sub, 'message': message, status: status, peminjam: userchemicalid, cuid: cuid, remaining: remaining },
            success: function (databack) {
                console.log(databack);
                $body.removeClass("loading");
                if (databack.trim() === "success") {
                    alert("Return success");
                } else if (databack.trim() === "fail") {
                    alert("Return failed! Please request later");
                } else {
                    alert("Chemical has been return,but email notification has some issues");
                }
                location.reload();
            }
        });
    }


});

$('#qrcodeRegister').on('click', function () {
    $('#camRegister').toggle(function () {
        if ($(this).is(':visible')) {
            scannerRegister.addListener('scan', function (content) {
                console.log(content);
                //document.getElementById("qrcodeReuse").value=content;
                // $('#qrcodeReuse').val(content);
                document.getElementById("qrcodeRegisterID").value = content;
                scannerRegister.stop();
                $('#camRegister').hide();

            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scannerRegister.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        } else if ($(this).is(':hidden')) {
            scannerRegister.stop();
        }
    });
});



$('#viewTable #btnView').on('click', function (e) {
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
    console.log(id);
    // console.log("Value: "+id+" "+name+" "+type+" "+status+" "+datein+" "+supliername+" "+qrcode+" "+nameSv);
    $('#modalDetailChemical #tbleDetails td#LIchemicalName').html(name);
    $('#modalDetailChemical #tbleDetails td#LItypeChemical').html(type);
    $('#modalDetailChemical #tbleDetails td#LIstatusChemical').html(status);
    $('#modalDetailChemical #tbleDetails td#LIdate').html(datein);
    $('#modalDetailChemical #tbleDetails td#LIsupplierName').html(supliername);
    $('#modalDetailChemical #tbleDetails td#LIqrcode').html(qrcode);
    $('#modalDetailChemical #tbleDetails td#LIlab').html(nameSv);
    $('#modalDetailChemical #tbleDetails td#LIexpdate').html(expdate);
    $('#modalDetailChemical #tbleDetails a#LISDS').attr("href", "../SDS/" + sds);
    $('#modalDetailChemical #tbleDetails a#LISDS').text(sds);

    if (status === "In Use") {
        $.ajax({
            type: "post",
            url: "function/findWhoUseIt.php",
            data: { id: id },
            success: function (databack) {
                console.log(databack);
                var array_datass = databack.split('|');
                var fname = array_datass[0];
                var fmatric = array_datass[1];
                var ftelno = array_datass[2];
                var femail = array_datass[3];
                var fdate = array_datass[4];
                $('#modalDetailChemical #tbleDetails td#LIusedby').html(fname);
                $('#modalDetailChemical #tbleDetails td#LImatric').html(fmatric);
                $('#modalDetailChemical #tbleDetails td#LItelno').html(ftelno);
                $('#modalDetailChemical #tbleDetails td#LIemail').html(femail);
                $('#modalDetailChemical #tbleDetails td#LIbdate').html(fdate);
            }
        });
    } else {
        $('#modalDetailChemical #tbleDetails td#LIusedby').html("N/A");
        $('#modalDetailChemical #tbleDetails td#LImatric').html("N/A");
        $('#modalDetailChemical #tbleDetails td#LItelno').html("N/A");
        $('#modalDetailChemical #tbleDetails td#LIemail').html("N/A");
        $('#modalDetailChemical #tbleDetails td#LIbdate').html("N/A");
    }

});
$('#viewTableDua #btnViewdua').on('click', function (e) {
    e.preventDefault();

    var row = $(this).closest('tr');
    var id = row.find('#iddua').val();
    var name = row.find('#chemicaldua').text();
    var type = row.find('#typedua').val();
    var status = row.find('#statusdua').val();
    var datein = row.find('#dateindua').val();
    var expdate = row.find('#expdatedua').text();
    var supliername = row.find('#supliernamedua').val();
    var qrcode = row.find('#qrcodedua').val();
    var nameSv = row.find('#namedua').val();
    var sds = row.find('#sdsdua').val();
    // console.log("Value: "+id+" "+name+" "+type+" "+status+" "+datein+" "+supliername+" "+qrcode+" "+nameSv);
    $('#modalDetailChemicaldua #tbleDetails td#LIchemicalNamedua').html(name);
    $('#modalDetailChemicaldua #tbleDetails td#LItypeChemicaldua').html(type);
    $('#modalDetailChemicaldua #tbleDetails td#LIstatusChemicaldua').html(status);
    $('#modalDetailChemicaldua #tbleDetails td#LIdatedua').html(datein);
    $('#modalDetailChemicaldua #tbleDetails td#LIsupplierNamedua').html(supliername);
    $('#modalDetailChemicaldua #tbleDetails td#LIqrcodedua').html(qrcode);
    $('#modalDetailChemicaldua #tbleDetails td#LIlabdua').html(nameSv);
    $('#modalDetailChemicaldua #tbleDetails td#LIexpdatedua').html(expdate);
    $('#modalDetailChemicaldua #tbleDetails a#LISDSdua').attr("href", "../SDS/" + sds);
    $('#modalDetailChemicaldua #tbleDetails a#LISDSdua').text(sds);
});


$('#registrationStatTable #btnAccept2').on('click', function (e) {
    e.preventDefault();
    $body.addClass("loading");
    var row = $(this).closest('tr');
    var key = row.find('#keyStud2').text();
    var keyEmail = row.find('#keyEmali2').text();
    var ciid = row.find('#ciidapprove2').val();
    // alert(key);
    var datas = { method: "updateRole", identifyid: key, email: keyEmail, subject: "CMS- User Request To Register a Chemical", message: "Your Request to register the chemical are Successfully, Thank You", ciid: ciid };
    $.ajax({
        type: "post",
        url: "function/manageChemicalApproveRegistration.php",
        data: datas,
        success: function (databack) {
            //console.log(databack);
            $body.removeClass("loading");
            if (databack.trim() === "updateSuccess") {
                alert("Request successfully approve");
            } else if (databack.trim() === "updateFailed") {
                alert("Failed to approve the registration!,try again later.");
            } else {
                alert("Request successfully approve,but email notification seems has some issues.");
            }
            location.reload();
        }
    });

});

$('#registrationStatTable #btnReject2').on('click', function (e) {
    e.preventDefault();
    $body.addClass("loading");
    var row = $(this).closest('tr');
    var key = row.find('#keyStud2').text();
    var keyEmail = row.find('#keyEmali2').text();
    var ciid = row.find('#ciidapprove2').val();
    // alert(key);
    var datas = { method: "rejectApprove", identifyid: key, email: keyEmail, subject: "CMS- User Reuse Chemical Request", message: "Your request to register the chemical are Rejected Please contact your supervisor / PJ, Thank You", ciid: ciid };
    $.ajax({
        type: "post",
        url: "function/manageChemicalApproveRegistration.php",
        data: datas,
        success: function (databack) {
            //console.log(databack);
            $body.removeClass("loading");
            if (databack.trim() === "updateSuccess") {
                alert("request for registration has been rejected");
            } else if (databack.trim() === "updateFailed") {
                alert("Failed to reject the registration!,try again later.");
            } else {
                alert("request for registration has been rejected,but email notification seems has some issues.");
            }
            location.reload();
        }
    });

});
$('#qrcodeDispose').on('click', function () {
    $('#camDispose').toggle(function () {
        if ($(this).is(':visible')) {
            scannerDispose.addListener('scan', function (content) {
                console.log(content);
                //document.getElementById("qrcodeReuse").value=content;
                // $('#qrcodeReuse').val(content);
                document.getElementById("qrcodeDisposeInput").value = content;
                scannerDispose.stop();
                getDispose();
                $('#camDispose').hide();

            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scannerDispose.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        } else if ($(this).is(':hidden')) {
            scannerDispose.stop();
        }
    });
});

function getDispose() {
    var QrCode = $('#qrcodeDisposeInput').val();
    var useridreturn = useridxx;

    $.ajax({
        type: "post",
        url: "function/disposeChemical.php",
        data: { 'QrCode': QrCode, 'userid': useridreturn },
        success: function (databack) {
            $('#disposeData').html(databack);
            $('#insert_btnDispose').prop('disabled', false);
        }
    });
}

$('#insert_btnDispose').on('click', function (e) {
    $body.addClass("loading");
    var chemicalId = $('#chemicalInIdD').val();
    var cserId = $('#chemicalUserIdD').val();
    var userchemicalid = $('#chemicalUserIdPeminjamD').val();
    var email = $('#emailD').val();
    var sub = $('#subD').val();
    var message = $('#messageD').val();
    var status = $('#returnStatusD').val();
    var cuid = $('#chemicalusagepunyeidD').val();
    var remaining = $('#remaining_quantityD').val();

    $.ajax({
        type: "post",
        url: "function/disposeNewChemical.php",
        data: { 'chemicalId': chemicalId, 'cserId': cserId, 'email': email, 'sub': sub, 'message': message, status: status, cuid: cuid },
        success: function (databack) {
            console.log(databack);
            $body.removeClass("loading");
            if (databack.trim() === "success") {
                alert("Disposing success");
            } else if (databack.trim() === "fail") {
                alert("Disposing failed! Please request later");
            } else {
                alert("Chemical has been Disposed,but email notification has some issues");
            }
            location.reload();
        }
    });
});