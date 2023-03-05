//Display List
if (!$.fn.DataTable.isDataTable('.accountsTable')) {
    var ml = $('.accountsTable').DataTable({
        "ajax": "ajax/accounts_list.ajax.php",
        "deferRender": true,
        "retrieve": true,
        "paging": true,
        "processing": true,
        "language": {
            'loadingRecords': 'Loading Accounts Records...',
            'zeroRecords': 'No records to display',
            "info": "Showing page _PAGE_ of _PAGES_"
        },

    });
}

$(function() {

    $('#accounts-form input[id^="num"]').on("keypress", function(e) {
        return _helper.isNumeric(e) ? true : e.preventDefault();
    });

    $('#accounts-form input[id^="tns"]').on("keypress", function(e) {
        return _helper.allChars(e) ? true : e.preventDefault();
    });

    



    // CLEAR INPUT
    $("#abtn-new").click(function() {
        aclear();
    });

    //Function Keys
    //liputon pagd ni dpat
    //create dpat class
    document.addEventListener("keydown", e => {
        if( e.key.toLowerCase() === 'q' && e.shiftKey ){
            addAccounts();
        } else if (e.key.toLowerCase() === 'w' && e.shiftKey) {
            aclear();
        }else if (e.key.toLowerCase() === 'e' && e.shiftKey) {
            showTable();
        }
    });

    // SAVE Accounts
    $("#accounts-form").submit(function(e) {
        e.preventDefault();
        if($(".accountsForm").valid()){
            addAccounts();
        }else{
        }
    });

    //plugin for validating form
    $(".accountsForm").validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          email: {
            required: true,
            email: true
          },
          age_select: {
            required: true
          },
          gender_radio: {
            required: true
          },
          skill_check: {
            required: true
          },
          username:{
            required: true,
            minlength: 3
          },
          password: {
            required: true,
            minlength: 5
          },
          phone: {
            required: true,
            minlength: 5
          },
          confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#tns-password"
          },
          terms_agree: "required"
        },
        messages: {
          name: {
            required: "Please enter a name",
            minlength: "Name must consist of at least 3 characters"
          },
          phone: {
            required: "Please enter your mobile number",
            minlength: "Mobile Number must consist of at least 11 Numeric"
          },
          email: "Please enter a valid email address",
          age_select: "Please select your age",
          skill_check: "Please select your skills",
          gender_radio: "Please select your gender",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          username:{
            required: "Please provide a username",
            minlength: "Your username must be at least 3 characters long"
          },
          confirm_password: {
            required: "Please confirm your password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },
          terms_agree: "Please agree to terms and conditions"
        },
        errorPlacement: function(error, element) {
          error.addClass( "invalid-feedback" );
  
          if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          }
          else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
            error.insertAfter(element.parent().parent());
          }
          else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            error.appendTo(element.parent().parent());
          }
          else {
            error.insertAfter(element);
          }
        },
        highlight: function(element, errorClass) {
          if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
          }
        },
        unhighlight: function(element, errorClass) {
          if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
          }
        }
      });
    

      // add account
    function addAccounts(){
            if ($('#trans_type').val() == 'New') {
                var title = "DO YOU WANT TO SAVE NEW Account?";
                var text = "";
            } else {
                var title = "Do you want to update Account details?";
                var text = "";
            }
    
            swal.fire({
                title: title,
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
                    var accID = $("#accID").val();
                    var username = $("#tns-username").val();
                    var password = $("#tns-password").val();
                    var access = $("#txt-access").val();
                    var name = $("#tns-name").val();
                    var phone = $("#num-phone").val();
    
    
                    var accounts = new FormData();
                    accounts.append("accID", accID);
                    accounts.append("username", username);
                    accounts.append("trans_type", trans_type);
                    accounts.append("password", password);
                    accounts.append("access", access);
                    accounts.append("name", name);
                    accounts.append("phone", phone);

                    
    
    
                    $.ajax({
                        url: "ajax/accounts_save_record.ajax.php",
                        method: "POST",
                        data: accounts,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "text",
                        success: function(answer) {
                            initialize();
    
                            var table = $('.accountsTable').DataTable();
    
                            table.ajax.reload();
    
                        },
                        error: function() {
                            alert("Oops. Something went wrong!");
                        },
                        complete: function() {
                            swal.fire({
                                icon: 'success',
                                title: 'Account details successfully saved!',
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

//editing of accounts
    $('.accountsTable tbody').on('dblclick', 'tr', function() {
        var accID = $(this).find('td').first().text();

        var data = new FormData();
        data.append("accID", accID);
        $.ajax({
            url: "ajax/accounts_get_record.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {

                var table = $('.accountsTable').DataTable();

                table.ajax.reload();
                $("#trans_type").val("Update");
    
                $("#accID").val(answer["accID"]);
                $("#tns-username").val(answer["username"]);
                $("#tns-password").val();
                $("#txt-access").val(answer["access"]).trigger('change');
                $("#tns-name").val(answer["name"]);
                $("#num-phone").val(answer["phone"]);
                
                $("#modal-search-accounts").modal('hide');

            }
        })
    });

    //show modal table
    function showTable(){
        $('#modal-search-accounts').modal('show');
    }

    function aclear(){
        $("#tns-username").focus();
        swal.fire({
            icon: 'question',
            title: 'Do you want create new Account details?',
            type: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel!',
            confirmButtonClass: 'btn btn-outline-success',
            cancelButtonClass: 'btn btn-outline-danger',
            allowOutsideClick: false,
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                initialize();
            }
        });
    }

  
    function initialize() {
        $("#accID").val('');
        $("#tns-username").val('');
        $("#tns-password").val('');
        $("#tns-repassword").val('');
        $("#txt-access").val('');
        $("#num-phone").val('');
        $("#trans_type").val('New');
        $("#tns-name").val('');
    }



});
