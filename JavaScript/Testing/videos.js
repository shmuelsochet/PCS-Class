/*global $*/
(function () {
    "use strict";

    var videoElem = $('#video');


    $('input[name="video"]').change(function () {
        $.getJSON(this.value + ".json", function (loadedVideo) {

            videoElem.attr('src', loadedVideo.url);
            //$('#video')[0].play()

        }).fail(function (jqxhr) {
            console.log(jqxhr);

        });
    });
    videoElem[0].play();
}());