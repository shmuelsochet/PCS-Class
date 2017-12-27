/*global $, pcs*/
(function () {
    "use strict";

    var contactTable = $("#contactTable tbody"),
        contacts = [];

    contactTable.click(function (event) {
        if (event.target.nodeName === 'BUTTON') {
            var tr = $(event.target).closest('tr'),
                contactId = tr.data('contactId');
            $.post("deleteContact.php", { id: contactId }, function () {
                tr.remove();
            }).fail(function (jqxhr) {
                pcs.messagebox.show("Error: " + jqxhr.responseText);
            });
        }
    });

    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        var theRow = $('<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '<td><button>delete</button></td>' +
            '</tr>'
        ).appendTo(contactTable)
            .data('contactId', contact.id);
        /*theRow.find('button')
            .click(function () {
                $.post("deleteContact.php", { id: contact.Id }, function () {
                    theRow.remove();
                }).fail(function (jqxhr) {
                    pcs.messagebox.show("Error: " + jqxhr.responseText);
                });
            });*/
    }

    var firstNameInput = $("#first");
    var lastNameInput = $("#last");
    var emailInput = $("#email");
    var phoneInput = $("#phone");
    var addContactForm = $("#addContactForm");

    function hideAddContactForm() {
        addContactForm.slideUp();
        addContactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        var newContact = {
            firstName: firstNameInput.val(),
            lastName: lastNameInput.val(),
            email: emailInput.val(),
            phone: phoneInput.val()
        };
        $.post("addContact.php", JSON.stringify(newContact), function () {
            addContact(newContact);
            hideAddContactForm();
        }).fail(function (jqxhr) {
            pcs.messagebox.show("Error: " + jqxhr.responseText);
        });

        event.preventDefault();
    });

    $("#cancel").click(hideAddContactForm);

    $("#add").click(function () {
        addContactForm.slideDown();
    });

    $("#load").click(function () {
        $.get("getContacts.php", function (loadedContactData) {
            var loadedContacts = JSON.parse(loadedContactData);
            loadedContacts.forEach(addContact);
        })
        /*$.get("contacts.data", function (loadedContacts) {
            loadedContacts.forEach(addContact);
        }, 'json')*/
        /*$.get("contacts.json", function (loadedContacts) {
            loadedContacts.forEach(addContact);
        })*/
        /*$.getJSON("contacts.data", function (loadedContacts) {
            loadedContacts.forEach(addContact);
        })*/.fail(function (jqxhr) {
                pcs.messagebox.show("Error: " + jqxhr.responseText);
            });
    });
}());