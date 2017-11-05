(function () {
    "use strict";

    var contactTable = get("contactTable"),
        contacts = [];

    function get(id) {
        return document.getElementById(id);
    }

    function addContact() {
        var contact = {
            firstName: document.getElementById('first').value,
            lastName: document.getElementById('last').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
        };

        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.deleteRow(1);
        }

        var row = contactTable.insertRow();
        var firstNameCell = row.insertCell();
        var lastNameCell = row.insertCell();
        var emailCell = row.insertCell();
        var phoneCell = row.insertCell();

        firstNameCell.innerHTML = document.getElementById('first').value;
        lastNameCell.innerHTML = document.getElementById('last').value;
        emailCell.innerHTML = document.getElementById('email').value;
        phoneCell.innerHTML = document.getElementById('phone').value;
    }

    get("add").addEventListener("click", addContact);
}());