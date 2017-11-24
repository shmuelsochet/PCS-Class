/* global $ */
(function () {
    "use strict";

    //wrap first so you don't have to wrap every time you click the click handler
    var theFileInputName = $('#file');

    $('#load').click('click', function () {

        $('#loading').show();

        $.get(theFileInputName.val(), function (loadedData) {
            setTimeout(function () {
                $("#loadedText").append(loadedData);

            }, 2000);

        })
            .fail(function (jqxhr, statusCode, statusText) {
                $('#loadedText').append('Error! ' + 'Status Code: ' + statusCode + '. Status Text ' + statusText + '. ');
                console.log(jqxhr);
            })
            //this will always compute whether fail or success
            .always(function () {
                setTimeout(function () {

                    $('#loading').hide();
                }, 2000);

            });


    });


}());