/*global $ */
(function () {
    'use strict';

    var dragging,
        offset,
        body = $('body'),
        colorPicker = $('#color'),
        zIndex = 0;

    $(document).on('mousedown', '.box', function (event) {
        event.preventDefault();
        dragging = $(this);
        offset = { y: event.offsetY, x: event.offsetX };
        dragging.css("zIndex", ++zIndex);
        dragging.addClass("dragging");
    }).on('mouseup', '.box', function () {
        dragging.removeClass("dragging");
        dragging = null;
    }).mousemove(function (event) {
        event.preventDefault();
        if (dragging) {
            dragging.css({ top: event.clientY - offset.y, left: event.clientX - offset.x });
        }
    });

    $('#add').click(function () {
        $('<div class="box"><img src=resources/shoes.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/eyes.png>' + '</div>').appendTo(body).css({ "height": '50px', "width": '50px' });
        $('<div class="box"><img src=resources/nose.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/rightEar.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/leftEar.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/rightHand.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/leftHand.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/stash.png>' + '</div>').appendTo(body);
        $('<div class="box"><img src=resources/glasses.png>' + '</div>').appendTo(body);
    });
}());