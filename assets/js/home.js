"use strict";

// Class Definition
var KTHome = function() {

    //Verify otp
    var _bookNow = function(e) {
        var textarea = $("textarea#kt_maxlength_5");

        $('#btn_book_now').on('click', function (e) {
            if(textarea.val() != "")
            {
                textarea.css('border', '');
                $("#div_book_now").prop('hidden', false);
                
                setInterval(function(){ 
                    $("#div_loading").prop('hidden', true);
                    $("#div_result").prop('hidden', false);
                }, 5000);
            }
            else
            {
                textarea.focus();
                textarea.css('border', 'solid red 1px');
            }
        });

        textarea.keyup(function(event) {
            if(textarea.val() != "")
                textarea.css('border', '');
            else
                textarea.css('border', 'solid red 1px');
        });

    }



    // Public Functions
    return {
        // public functions
        init: function() {
            _bookNow();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTHome.init();
});
