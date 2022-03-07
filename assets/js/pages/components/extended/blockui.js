"use strict";

// Class definition

var KTBlockUIDemo = function () {

    // portlet blocking
    var demo2 = function () {
        $('#kt_blockui_2_5').click(function() {
            KTApp.block('#kt_blockui_2_portlet', {
                overlayColor: '#000000',
                type: 'v2',
                state: 'primary',
                message: 'Processing...'
            });

            setTimeout(function() {
                KTApp.unblock('#kt_blockui_2_portlet');
            }, 2000);
        });
    }

    return {
        // public functions
        init: function() {
            demo2();
        }
    };
}();

jQuery(document).ready(function() {    
    KTBlockUIDemo.init();
});
