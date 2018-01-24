/* global $ */
(function () {
    "use strict";

    var box = $('#box'),
        colorPicker = $('#colorPicker');

    box.css('margin-bottom', '5px');

    colorPicker.change(function () {
        box.css('background-color', colorPicker.val());
    });

}());