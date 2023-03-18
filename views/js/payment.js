$(function() {

    $('#payment-form input[id^="num"]').on("keypress", function(e) {
        return _helper.isNumeric(e) ? true : e.preventDefault();
    });

    $('#payment-form input[id^="tns"]').on("keypress", function(e) {

        return _helper.allChars(e) ? true : e.preventDefault();
        
    });

    $("#num-chand1, #num-nump1,#num-chand2, #num-nump2,#num-chand3, #num-nump3,#num-chand4, #num-nump4,#num-chand5, #num-nump5,#num-chand6, #num-nump6").on("keyup", function(){
        var currentbranch = $(this).attr("id").slice(-1);
        //fields
        var nump = "#num-nump" + currentbranch;
        var numcashr = "#num-cashr" + currentbranch;
        var numchand = "#num-chand" + currentbranch;
        var numbal = "#num-bal" + currentbranch;



        var qty ;
        var cashr ;
        var cashhand;
        var cashbalance;

        qty = parseInt($(nump).val());
        cashr = parseInt($(numcashr).val());
        cashhand = parseInt($(numchand).val());
        cashbalance = parseInt($(numbal).val());

        if(currentbranch == 1){
            $(numcashr).val(qty * 1000);
        }else if (currentbranch == 2){
            $(numcashr).val(qty * 850);
        }else{
            $(numcashr).val(qty * 750);
        }

     
        $(numbal).val(cashr - cashhand );

       calculateTotal();
    });

    function calculateTotal (){
        var tcashr = 0;
        var tbal = 0;
        var tchand = 0;
        for(let i = 1; i<7; i++){
            var numcashr = "#num-cashr" + i;
            var numchand = "#num-chand" + i;
            if(!(isNaN(parseInt($(numcashr).val())))){
                tcashr += parseInt($(numcashr).val());
            }
            if(!(isNaN(parseInt($(numchand).val())))){
                tchand += parseInt($(numchand).val());
            }
        }

        tbal = tcashr - tchand;
        

        $("#num-tchand").val(tchand);
        $("#num-tcashr").val(tcashr);
        $("#num-tbal").val(tbal);
    }

    $("#payment-form").submit(function(e) {
        e.preventDefault();
        saveTransaction();
    });

    $("#btn-rload").click(function(){
        $.ajax({
            url: "ajax/rpayment_get_record.ajax.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {

                $("#num-nump1").val(answer["par1"]);
                $("#num-nump2").val(answer["par2"]);
                $("#num-nump3").val(answer["par3"]);
                $("#num-nump4").val(answer["par4"]);
                $("#num-nump5").val(answer["par5"]);
                $("#num-nump6").val(answer["par6"]);

                $("#num-cashr1").val(answer["cashr1"]);
                $("#num-cashr2").val(answer["cashr2"]);
                $("#num-cashr3").val(answer["cashr3"]);
                $("#num-cashr4").val(answer["cashr4"]);
                $("#num-cashr5").val(answer["cashr5"]);
                $("#num-cashr6").val(answer["cashr6"]);

                $("#num-chand1").val(answer["chand1"]);
                $("#num-chand2").val(answer["chand2"]);
                $("#num-chand3").val(answer["chand3"]);
                $("#num-chand4").val(answer["chand4"]);
                $("#num-chand5").val(answer["chand5"]);
                $("#num-chand6").val(answer["chand6"]);

                $("#num-bal1").val(answer["rbal1"]);
                $("#num-bal2").val(answer["rbal2"]);
                $("#num-bal3").val(answer["rbal3"]);
                $("#num-bal4").val(answer["rbal4"]);
                $("#num-bal5").val(answer["rbal5"]);
                $("#num-bal6").val(answer["rbal6"]);

                $("#paymentlog1").val(answer["receipt1"]);
                $("#paymentlog2").val(answer["receipt2"]);
                $("#paymentlog3").val(answer["receipt3"]);
                $("#paymentlog4").val(answer["receipt4"]);
                $("#paymentlog5").val(answer["receipt5"]);
                $("#paymentlog6").val(answer["receipt6"]);

                $("#num-tchand").val(answer["tchand"]);
                $("#num-tcashr").val(answer["tcashr"]);
                $("#num-tbal").val(answer["tbal"]);


            
                

         
            },
            error: function() {
                alert("Oops. Something went wrong!");
            },
            complete: function() {
                swal.fire({
                    icon: 'success',
                    title: 'Payment succesfully loaded!',
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
    });



    function saveTransaction(){

        swal.fire({
            title: 'Save Transaction',
            icon: 'question',
            text: "DO YOU WANT TO SAVE TRANSACTION?",
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
                // var nump = "#num-nump" + currentbranch;
                // var numcashr = "#num-cashr" + currentbranch;
                // var numchand = "#num-chand" + currentbranch;
                // var numbal = "#num-bal" + currentbranch;
                
                //qty
                var par1 = $("#num-nump1").val();
                var par2 = $("#num-nump2").val();
                var par3 = $("#num-nump3").val();
                var par4 = $("#num-nump4").val();
                var par5 = $("#num-nump5").val();
                var par6 = $("#num-nump6").val();

                var cashr1 = $("#num-cashr1").val();
                var cashr2 = $("#num-cashr2").val();
                var cashr3 = $("#num-cashr3").val();
                var cashr4 = $("#num-cashr4").val();
                var cashr5 = $("#num-cashr5").val();
                var cashr6 = $("#num-cashr6").val();

                var chand1 = $("#num-chand1").val();
                var chand2 = $("#num-chand2").val();
                var chand3 = $("#num-chand3").val();
                var chand4 = $("#num-chand4").val();
                var chand5 = $("#num-chand5").val();
                var chand6 = $("#num-chand6").val();

                var rbal1 = $("#num-bal1").val();
                var rbal2 = $("#num-bal2").val();
                var rbal3 = $("#num-bal3").val();
                var rbal4 = $("#num-bal4").val();
                var rbal5 = $("#num-bal5").val();
                var rbal6 = $("#num-bal6").val();

                var receipt1 = $("#paymentlog1").val();
                var receipt2 = $("#paymentlog2").val();
                var receipt3 = $("#paymentlog3").val();
                var receipt4 = $("#paymentlog4").val();
                var receipt5 = $("#paymentlog5").val();
                var receipt6 = $("#paymentlog6").val();

                var tchand = $("#num-tchand").val();
                var tcashr = $("#num-tcashr").val();
                var tbal = $("#num-tbal").val();


                var payment = new FormData();
                payment.append("par1", par1);
                payment.append("par2", par2);
                payment.append("par3", par3);
                payment.append("par4", par4);
                payment.append("par5", par5);
                payment.append("par6", par6);
                payment.append("cashr1", cashr1);
                payment.append("cashr2", cashr2);
                payment.append("cashr3", cashr3);
                payment.append("cashr4", cashr4);
                payment.append("cashr5", cashr5);
                payment.append("cashr6", cashr6);
                payment.append("chand1", chand1);
                payment.append("chand2", chand2);
                payment.append("chand3", chand3);
                payment.append("chand4", chand4);
                payment.append("chand5", chand5);
                payment.append("chand6", chand6);
                payment.append("rbal1", rbal1);
                payment.append("rbal2", rbal2);
                payment.append("rbal3", rbal3);
                payment.append("rbal4", rbal4);
                payment.append("rbal5", rbal5);
                payment.append("rbal6", rbal6);
                payment.append("receipt1", receipt1);
                payment.append("receipt2", receipt2);
                payment.append("receipt3", receipt3);
                payment.append("receipt4", receipt4);
                payment.append("receipt5", receipt5);
                payment.append("receipt6", receipt6);
                payment.append("tchand", tchand);
                payment.append("tcashr", tcashr);
                payment.append("tbal", tbal);
             

                $.ajax({
                    url: "ajax/rpayment_save_record.ajax.php",
                    method: "POST",
                    data: payment,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function(answer) {
                 
                    },
                    error: function() {
                        alert("Oops. Something went wrong!");
                    },
                    complete: function() {
                        swal.fire({
                            icon: 'success',
                            title: 'Payment details successfully saved!',
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
});