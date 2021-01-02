// Class definition

var KTBootstrapDatepicker = function () {

    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    
    // Private functions
    var demos = function () {
        var tom = new Date((new Date()).valueOf() + 1000*3600*24);
        // minimum setup
        $('#kt_datepicker_1').datepicker({
            rtl: KTUtil.isRTL(),
            startDate: tom,
            todayHighlight: true,
            clearBtn: true,
            orientation: "top left",
            templates: arrows,
            autoClose: true
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
    KTBootstrapDatepicker.init();
});