// Class definition

var KTBootstrapTimepicker = function () {
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('#kt_timepicker_1, #kt_timepicker_1_modal').timepicker({
            minuteStep: 15,
            defaultTime: '8:00:00',
            showSeconds: false,
            showMeridian: true,
            snapToStep: true
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {
    KTBootstrapTimepicker.init();
});