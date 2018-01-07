/*global $ */
(function () {
    'use strict';

    var dragging,
        offset,
        body = $('body'),
        colorPicker = $('#color'),
        zIndex = 0,
        partSelector = $('#test');

    $(document).on('mousedown', '.parts', function (event) {
        event.preventDefault();
        dragging = $(this);
        offset = { y: event.offsetY, x: event.offsetX };
        dragging.css("zIndex", ++zIndex);
        dragging.addClass("dragging");
    }).on('mouseup', '.parts', function () {
        dragging.removeClass("dragging");
        dragging = null;
    }).mousemove(function (event) {
        event.preventDefault();
        if (dragging) {
            dragging.css({ top: event.clientY - offset.y, left: event.clientX - offset.x });
        }
    });

    $('#add').click(function () {
        $('<div class="parts"><img src=resources/shoes.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/eyes.png>' + '</div>').appendTo(body).css({ "height": '50px', "width": '50px' });
        $('<div class="parts"><img src=resources/nose.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/rightEar.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/leftEar.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/rightHand.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/leftHand.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/stash.png>' + '</div>').appendTo(body);
        $('<div class="parts"><img src=resources/glasses.png>' + '</div>').appendTo(body);
    });

    partSelector.append($('<option value=resources/shoes.png>Shoes</option>'));

    partSelector.change(function () {
        var partSelected = partSelector.val();

        $('<div class=parts><img src=' + partSelected + '></div>').appendTo(body);
    });

    $.ajax({
        url: "resources",
        success: function (data) {

            $(data).find("td > a").each(function () {
                var partFileName = $(this).attr("href")
                // will loop through
                if (partFileName.substr(-3) === 'png')
                    partSelector.append(($('<option value=resources/' + partFileName + '>' + partFileName.replace(/\.[^/.]+$/, "") + '</option>')));
            });

        },
        error: function (jqxhr) {
            console.log(jqxhr);
        }
    });






}());