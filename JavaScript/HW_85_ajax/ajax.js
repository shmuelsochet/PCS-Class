/* global $ */
/* global jQuery */
(function () {
    "use strict";

    jQuery('#load').click('click', function () {

        $('#loading').show();

        $.get(jQuery('#file').val(), function (loadedData) {
            $("body").append(loadedData);
            $('#loading').hide();
        })
            .fail(function (xhr, statusCode, statusText) {
                $('.result').append('Error! ' + 'Status Code: ' + statusCode + '. Status Text ' + statusText + '.');
            });
    });


}());