/* global $ */
(function () {
    "use strict";

    $.getJSON("images.json", function (imageList) {
        var theList = $("#sidebar ul");
        var imageViewer = $("img");
        var imageTitle = $("h1");
        var rightBtn = $("#right");
        var leftBtn = $("#left");
        //var currentImage;
        var currentIndex = 0;

        imageList.forEach(function (image, index) {
            $('<li><img src="' + (image.url || 'videos/default.png') + '"/>' + image.title + '</li>')
                .appendTo(theList)
                .click(function () {
                    //currentImage = image.url;
                    currentIndex = index;
                    imageTitle.text(image.title);
                    imageViewer.attr("src", image.url);
                    imageViewer.show();
                    //videoPlayer[0].play();
                });
        });

        rightBtn.click(function () {
            currentIndex++;
            if (currentIndex > imageList.length - 1) {
                currentIndex = 0;
            }
            imageViewer.attr("src", imageList[currentIndex].url);
            imageViewer.show();

        });

        leftBtn.click(function () {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = imageList.length - 1;
            }
            imageViewer.attr("src", imageList[currentIndex].url);
            imageViewer.show();

        });

    });
}());