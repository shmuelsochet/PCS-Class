

"use strict";

const $ = require('jquery');

var box = $('#box'),
    colorPicker = $('#colorPicker');

box.css('margin-bottom', '5px');

colorPicker.change(function () {
    box.css('background-color', colorPicker.val());
});



