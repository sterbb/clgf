$(function() {

    $('#payment-form input[id^="num"]').on("keypress", function(e) {
        hello();
        return _helper.isNumeric(e) ? true : e.preventDefault();
    });

    $('#payment-form input[id^="tns"]').on("keypress", function(e) {

        return _helper.allChars(e) ? true : e.preventDefault();
        
    });

    //totals
    var tcashr;
    var tbal;
    var tchand;

    //henares
    $("#num-hchand, #num-hnump").on("keyup", function(){
        var qty ;
        var cashr ;
        var cashhand;
        var cashbalance;

        qty = parseInt($("#num-hnump").val());
        cashr = parseInt($("#num-hcashr").val());
        cashhand = parseInt($("#num-hchand").val());
        cashbalance = parseInt($("#num-hbal").val());

        $("#num-hcashr").val(qty * 1000);
        
        $("#num-hbal").val(cashr - cashhand );

        tcashr = "hello";

       calculateTotal();
    });

    
    $("#num-hchand, #num-hnump").on("keyup", function(){
        var qty ;
        var cashr ;
        var cashhand;
        var cashbalance;

        qty = parseInt($("#num-hnump").val());
        cashr = parseInt($("#num-hcashr").val());
        cashhand = parseInt($("#num-hchand").val());
        cashbalance = parseInt($("#num-hbal").val());

        $("#num-hcashr").val(qty * 1000);
        
        $("#num-hbal").val(cashr - cashhand );

        tcashr = "hello";

       calculateTotal();
    });

    function calculateTotal (){
        tcashr = parseInt($("#num-hcashr").val());
        tbal = parseInt($("#num-hbal").val());
        tchand = parseInt($("#num-hchand").val());

        $("#num-tchand").val(tchand);
        $("#num-tcashr").val(tbal);
        $("#num-tbal").val(tchand);
    }



    function calculateBranchP(branch){
        $("#payment-form input["+ branch+"]")
    }

});