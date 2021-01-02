"use strict";

// Class Definition
var KTBookings = function() {

    //Verify otp
    var _bookings = function(e) {
		$(".copy").click(function(){
			//alert($(this).attr('id'));
		})
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _bookings();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTBookings.init();
});
