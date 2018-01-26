

"use strict";

const $ = require('jquery');

let box = $('#box'),
    colorPicker = $('#colorPicker');

box.css('margin-bottom', '5px');

colorPicker.change(() => {
    box.css('background-color', colorPicker.val());
});



