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

    new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
        },
        markerOptions: { icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png' },
        circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
        },
        map: map
    });

    var searchBox = $('#search'),
        submitButton = $('#submitButton'),
        clearButton = $('#clearButton'),
        theList = $('#sidebar ul');

    var isEmpty = true,
        labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        labelIndex = 0,
        markerArray = [];


    clearButton.click(function () {
        markerArray.forEach(function (element) {
            element.setMap(null);
            labelIndex = 0;
        });
    });

    submitButton.click(function () {
        $.getJSON("http://api.geonames.org/wikipediaSearch?q=" + searchBox.val() + "&maxRows=20&username=shmuels&type=json&callback=?",
            function (data) {

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
                            console.log(labels.length);

                            markerArray.push(marker);

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