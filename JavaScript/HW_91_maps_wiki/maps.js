//geonames try bounding box.
/* global  google, $, -W098 */
function initMap() {

    "use strict";

    var coordinates = { lat: 40.106440, lng: -74.232701 };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 25,
        center: coordinates,
        mapTypeId: 'satellite'
    });

    new google.maps.Marker({
        position: coordinates,
        map: map
    });

    var searchBox = $('#search'),
        submitButton = $('#submitButton'),
        theList = $('#sidebar ul');

    var isEmpty = true,
        labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        labelIndex = 0;

    submitButton.click(function () {
        $.getJSON("http://api.geonames.org/wikipediaSearch?q=" + searchBox.val() + "&maxRows=20&username=shmuels&type=json&callback=?",
            function (data) {
                console.log(data);
                if (isEmpty === false) {
                    theList.empty();

                }
                data.geonames.forEach(function (element) {
                    $('<li><img src="' + (element.thumbnailImg) + '"/>' + element.title + '</li>')
                        .appendTo(theList)
                        .click(function () {

                            coordinates = { lat: element.lat, lng: element.lng };

                            var marker = new google.maps.Marker({
                                position: coordinates,
                                map: map,
                                draggable: true,
                                animation: google.maps.Animation.DROP,
                                title: element.title,
                                label: labels[labelIndex++ % labels.length],
                                
                            });

                            var contentString =
                                '<div style=float:left;><img src=' + element.thumbnailImg +
                                '></div><div>' +
                                '<h1>' + element.title + '</h1>' +
                                '<p><b>' + element.title + '.</b> ' + element.summary + '</p>' +
                                '<p>Attribution: ' + element.title + ', <a target=_blank' +
                                ' href=https://' + element.wikipediaUrl + '>' + element.wikipediaUrl + '</a> ' +
                                '.</p>' +
                                '</div>';


                            var infoWindow = new google.maps.InfoWindow({
                                content: contentString

                            });

                            map.setCenter(coordinates);

                            marker.addListener('click', function () {
                                infoWindow.open(map, marker);
                            });

                        });

                });

                isEmpty = false;

            }).fail(function (jqxhr) {
                console.log(jqxhr);
            });
    });


}