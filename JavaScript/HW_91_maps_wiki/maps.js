/* global google, $ */
(function () {

    "use strict";


    var uluru = { lat: 40.741895, lng: -73.989308 };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });

    var searchBox = $('#search'),
        submitButton = $('#submitButton'),
        theList = $('#sidebar ul');

    var isEmpty = true;

    submitButton.click(function () {
        $.getJSON("http://api.geonames.org/wikipediaSearch?q=" + searchBox.val() + "&maxRows=100&username=shmuels&type=json&callback=?",
            function (data) {
                console.log(data);
                if (isEmpty === false) {
                    theList.empty();

                }
                data.geonames.forEach(function (element) {
                    $('<li><img src="' + (element.thumbnailImg) + '"/>' + element.title + '</li>')
                        .appendTo(theList)
                        .click(function () {
                            var marker = new google.maps.Marker({
                                position: { lat: element.lat, lng: element.lng },
                                map: map
                            });
                        });

                });

                isEmpty = false;


            }).fail(function (jqxhr) {
                console.log(jqxhr);
            });
    });


}());