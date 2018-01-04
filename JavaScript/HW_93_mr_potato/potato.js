/* global $ */
(function () {

    "use strict";

    var potato = $("#potato"),
        shoes = $("shoes"),
        body = $("body"),
        draggingPotato = false,
        draggingShoes = false,
        document = $(document),
        offset,
        box = $("#box"),
        html = $("html");

    potato.on('mousedown', function (event) {
        draggingPotato = true;
        offset = { y: event.offsetY, x: event.offsetX };

    }).on('mousemove', function (event) {
        if (draggingPotato) {
            potato.css({ "top": event.clientY - offset.y, "left": event.clientX - offset.x });
        }

    }).on('mouseup', function () {
        draggingPotato = false;
    });


    shoes.on('mousedown', function (event) {
        draggingShoes = true;
        offset = { y: event.offsetY, x: event.offsetX };

    }).on('mousemove', function (event) {
        if (draggingShoes) {
            shoes.css({ "top": event.clientY - offset.y, "left": event.clientX - offset.x });
        }

    }).on('mouseup', function () {
        draggingShoes = false;
    });



    html.on('mouseup', function () {
        draggingPotato = false;
        draggingShoes = false;

    }).on('mousemove', function (event) {
        if (draggingPotato) {
            potato.css({ "top": event.clientY - offset.y, "left": event.clientX - offset.x });
        }

        if (draggingShoes) {
            shoes.css({ "top": event.clientY - offset.y, "left": event.clientX - offset.x });
        }
    });


})();