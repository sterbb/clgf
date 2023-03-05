//Display List
if (!$.fn.DataTable.isDataTable('.membersTable')) {
    var ml = $('.membersTable').DataTable({
        "ajax": "ajax/member_list.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "paging": true,
        "processing": true,
        "language": {
            'loadingRecords': 'Loading Member Records...',
            'zeroRecords': 'No records to display',
            "info": "Showing page _PAGE_ of _PAGES_"
        },

    });
}

$(function() {

    $('#members-form input[id^="num"]').on("keypress", function(e) {
        return _helper.isNumeric(e) ? true : e.preventDefault();
    });

    $('#members-form input[id^="tns"]').on("keypress", function(e) {
        return _helper.allChars(e) ? true : e.preventDefault();
    });

    $('#txt-dob').change(function(){
        
        var cdate = new Date().toISOString().slice(0, 10);
        var date = $('#txt-dob').val();
       
    });



    // CLEAR INPUT
    $("#btn-new").click(function() {
        clear();
    });

    //Function Keys
    //liputon pagd ni dpat
    //create dpat class
    document.addEventListener("keydown", e => {
        if( e.key.toLowerCase() === 'f1' && e.ctrlKey ){
            addMember();
        } else if (e.key.toLowerCase() === 'f2' && e.ctrlKey) {
            clear();
        }else if (e.key.toLowerCase() === 'f3' && e.ctrlKey) {
            showTable();
        }
        else if (e.key.toLowerCase() === 'p' && e.shiftKey) {
            print();
        }
    });




    // SAVE MEMBER
    $("#members-form").submit(function(e) {
        e.preventDefault();
        addMember();
    });
    

    function addMember(){
            if ($('#trans_type').val() == 'New') {
                var title = "DO YOU WANT TO SAVE NEW MEMBER?";
                var text = "";
            } else {
                var title = "Do you want to update member details?";
                var text = "";
            }
    
            swal.fire({
                title: 'Do you want to add this Member',
                icon: 'question',
                text: text,
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Save it!',
                cancelButtonText: 'Cancel!',
                confirmButtonClass: 'btn btn-outline-success',
                cancelButtonClass: 'btn btn-outline-danger',
                allowOutsideClick: false,
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
    
                    var trans_type = $("#trans_type").val();
                    var memID = $("#memID").val();
                    var fname = $("#tns-fname").val();
                    var mname = $("#tns-mname").val();
                    var lname = $("#tns-lname").val();
                    var suffix = $("#txt-suffix").val();
                    var category = $("#txt-category").val();
                    var cstats = $("#txt-cstats").val();
                    var civilstats = $("#txt-civilstats").val();
                    var age = $("#num-age").val();
                    var dob = $("#txt-dob").val();
                    var gender = $("#txt-gender").val();
                    var email = $("#tns-email").val();
                    var phone = $("#num-phone").val();
                    var branch = $("#tns-branch").val();
                   
    
    
                    var member = new FormData();
                    member.append("memID", memID);
                    member.append("trans_type", trans_type);
                    member.append("fname", fname);
                    member.append("mname", mname);
                    member.append("lname", lname);
                    member.append("suffix", suffix);
                    member.append("category", category);
                    member.append("cstats", cstats);
                    member.append("civilstats", civilstats);
                    member.append("age", age);
                    member.append("dob", dob);
                    member.append("gender", gender);
                    member.append("email", email);
                    member.append("phone", phone);
                    member.append("branch",branch);
    
    
                    $.ajax({
                        url: "ajax/member_save_record.ajax.php",
                        method: "POST",
                        data: member,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "text",
                        success: function(answer) {
                            clearFields();
    
                            var table = $('.membersTable').DataTable();
    
                            table.ajax.reload();
    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                            swal.fire({
                                icon: 'success',
                                title: 'Member details successfully saved!',
                                type: 'success',
                                confirmButtonText: 'Got it!',
                                confirmButtonClass: 'btn btn-outline-success',
                                allowOutsideClick: false,
                                buttonsStyling: false
                            }).then(function(result) {
                                if (result.value) {
                                }
                            })
                        }
                    })
                }
            });
    }


    $('.membersTable tbody').on('dblclick', 'tr', function() {
        var memID = $(this).find('td').first().text();


        var data = new FormData();
        data.append("memID", memID);
        $.ajax({
            url: "ajax/member_get_record.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {

                var table =$('.membersTable').DataTable();

                table.ajax.reload();
    
                $("#memID").val(answer["memID"]);
                $("#tns-fname").val(answer["fname"]);
                $("#tns-mname").val(answer["mname"]);
                $("#tns-lname").val(answer["lname"]);
                $("#txt-suffix").val(answer["suffix"]).trigger('change');
                $("#txt-category").val(answer["category"]).trigger('change');
                $("#txt-cstats").val(answer["cstats"]).trigger('change');
                $("#txt-civilstats").val(answer["civilstats"]).trigger('change');
                $("#num-age").val(answer["age"]);
                $("#txt-dob").val(answer["dob"]).trigger('change');
                $("#txt-gender").val(answer["gender"]).trigger('change');
                $("#tns-email").val(answer["email"]);
                $("#num-phone").val(answer["phone"]);

                

                $("#trans_type").val("Update");
                $("#modal-search-member").modal('hide');

            }
        })
    });

    function showTable(){
        $('#modal-search-member').modal('show');
    }

    function clear(){
        $("#tns-fname").focus();
        swal.fire({
            icon: 'question',
            title: 'Do you want create new Member details?',
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel!',
            confirmButtonClass: 'btn btn-outline-success',
            cancelButtonClass: 'btn btn-outline-danger',
            allowOutsideClick: false,
            buttonsStyling: false
        }).then(function(result) {
            console.log(result.value);
            if (result.value) {
                clearFields();
            }
        });
    }

    //print
    $("#btn-print-members").click(function(){
        var pcat = $("#new-category").val();
        document.cookie = 'category ='+pcat;
        if(pcat == ""){
            printAll();
        }else{
            printSpecific();
        }
        
    });

    

    //filtering members
    $("#new-category").on('change', function() {
        var table = $('.membersTable').DataTable();
        //filter by selected value on second column
        table.column(2).search($(this).val()).draw();
    });  
 

    function printAll(){
        window.open("extensions/tcpdf/pdf/members_list.php", "_blank");
    }    
    function printSpecific(){
        window.open("extensions/tcpdf/pdf/category_list.php", "_blank");
    }    
    
    

    function clearFields() {
        $("#memID").val('');
        $("#tns-mname").val('');
        $("#tns-lname").val('');
        $("#txt-suffix").val('');
        $("#txt-category").val('');
        $("#txt-cstats").val('');
        $("#txt-civilstats").val('');
        $("#num-age").val('');
        $("#txt-dob").val('');
        $("#txt-gender").val('');
        $("#tns-email").val('');
        $("#num-phone").val('');
        $("#trans_type").val('New');
        $("#tns-fname").val('');
        $("#txt-branch").val('');
       
    }



});
