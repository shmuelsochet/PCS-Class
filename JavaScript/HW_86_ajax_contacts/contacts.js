
/* global $ */
(function () {
    "use strict";


    var contactTable = $("#contactTable"),
        jsObject,
        spinner = $('#loading'),
        add = $('#add'),
        body = $('body')
        ;

    spinner.hide();

    function addContact(contacts) {

        if (contacts.length > 0) {
            $("#noContacts").remove();
        }

        for (var key in contacts) {
            if (contacts.hasOwnProperty(key)) {
                contactTable.append(

                    '<tr>' +
                    '<td>' + contacts[key].firstName + '</td>' +
                    '<td>' + contacts[key].lastName + '</td>' +
                    '<td>' + contacts[key].email + '</td>' +
                    '<td>' + contacts[key].phone + '</td>' +
                    '</tr>'

                );
            }

        }

    }

    add.click(function () {

        spinner.show();

        $.getJSON('contacts.json', function (loadedData) {
            setTimeout(function () {
                //var jsonString = JSON.stringify(loadedData);

                //jsObject = JSON.parse(jsonString);

                jsObject = loadedData;

                addContact(jsObject);

                $("#loadedText").append(loadedData);

            }, 2000);

        })
            .fail(function (jqxhr, statusCode, statusText) {
                body.append('Error! ' + 'Status Code: ' + statusCode + '. Status Text ' + statusText + '. ');
                console.log(jqxhr);
            })

            .always(function () {
                setTimeout(function () {

                    spinner.hide();
                }, 2000);

            });

    });

}());