"use strict";

// Class Definition
var KTUser_home = function() {
    var sec = 0;
    var myTimer;
    var _bkn_id;
    var _result;

    //Verify otp
    var _handleBookNow = function(e) {
        var textarea = $("textarea#kt_maxlength_5");

        $('#btn_book_now').on('click', function (e) {
            if(textarea.val() != "")
            {
                textarea.css('border', '');
                $("#div_book_now").prop('hidden', false);
                $("#btn_book_now").prop('disabled', true);
                $("#available_msg").prop('hidden', true);
                $("#div_available_lawyers").prop('hidden', true);
                $("#div_no_response").prop('hidden', true);
                $("#div_loading").prop('hidden', false);
                bookNow(textarea.val());
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
                textarea.css('border', 'solid red 2px');
        });
    }

    function bookNow(short_desc)
    {
        $.ajax({
            url: base_url + "booking/book_now",
            type: "POST",
            data: {"short_desc" : short_desc},
            success:function(res)
            {
                if(res != "failed_email" || res != "failed_book")
                {
                    _bkn_id = res;
                    myTimer = setInterval(countUp, 1000);
                }
            }
        })
    }

    function countUp() 
    {
        if (sec >= 5) 
        {
            clearTimeout(myTimer);
            $("#div_loading").prop('hidden', true);
            if(_result == "no_response")
            {
                $("#div_no_response").prop('hidden', false);
                $("#btn_book_now").prop('disabled', false);
            }
            else
            {
                $("#available_msg").prop('hidden', false);
                $("#div_available_lawyers").prop('hidden', false);
                $("#div_available_lawyers").empty();
                $("#div_available_lawyers").append(_result);
            }
            sec = 0;
        } else {
            sec++;
            findAvailableLawyer();
        }
    }

    function findAvailableLawyer()
    {
        $.ajax({
            url: base_url + "booking/find_available_lawyer",
            type: "POST",
            data: {"bkn_id" : _bkn_id},
            dataType: 'html',
            success:function(res)
            {
                _result = res;
            }
        })
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _handleBookNow();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTUser_home.init();
});
