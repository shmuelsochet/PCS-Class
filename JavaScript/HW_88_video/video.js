/* global $ */
(function () {
    "use strict";
    var body = $('body'),
        mainDiv = $("<div></div>"),
        h1Div = $("<div></div>"),
        vidDiv = $("<div></div>");

    body.append(mainDiv);

    mainDiv.append(h1Div, vidDiv);

    mainDiv.css('text=align', 'center');


    h1Div.css('text-align', 'center');
    vidDiv.css('text-align', 'center');

    //working on using a radio button
    // $.getJSON("recipe.php", function (data) {
    //     data.forEach(function (element) {

    //         body.append("<input type=\"radio\" name=\"recipe\"/>" + element.name + "<br>");
    //     }, this);
    // });

    $.get("video.json", function (data) {

        for (var i = 0; i < data.length; i++) {

            var h1 = $("<h1></h1>");
            h1.css({
                'text-align': 'center',
                'display': 'inline-block'
            });
            h1.text(data[i].name.toUpperCase());
            h1.appendTo(vidDiv);

            var video = $("<video></video>");
            video.css({
                'max-width': '200px',
                'max-height': '200px',
                'display': 'block',
                'margin': 'auto'
            });

            video.attr('src', data[i].video);
            video.attr('poster', data[i].picture);
            video.attr('controls', true);
            video.appendTo(vidDiv);

        }

        console.log(data);
    })
        .fail(function (jqxhr) {
            console.log(jqxhr);

        });

}());