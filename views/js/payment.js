$(function() {

    $('#payment-form input[id^="num"]').on("keypress", function(e) {
        return _helper.isNumeric(e) ? true : e.preventDefault();
    });

    $('#payment-form input[id^="tns"]').on("keypress", function(e) {
        return _helper.allChars(e) ? true : e.preventDefault();
    });


});