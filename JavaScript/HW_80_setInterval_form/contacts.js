(function () {
    "use strict";

    var contactTable = get("contactTable"),
        contacts = [];

    function get(id) {
        return document.getElementById(id);
    }

    function addContact(contact) {

        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.deleteRow(1);
        }

        var row = contactTable.insertRow();
        var firstNameCell = row.insertCell();
        var lastNameCell = row.insertCell();
        var emailCell = row.insertCell();
        var phoneCell = row.insertCell();

        firstNameCell.innerHTML = contact.firstName;
        lastNameCell.innerHTML = contact.lastName;
        emailCell.innerHTML = contact.email;
        phoneCell.innerHTML = contact.phone;
    }



    var firstNameInput = get('first');
    var lastNameInput = get('last');
    var emailInput = get('email');
    var phoneInput = get('phone');
    var addContactForm = get('addContactForm');

    function hideAddContactForm() {
        addContactForm.style.display = 'none';
        addContactForm.reset();
    }

    addContactForm.addEventListener("submit", function (event) {
        var newContact = {
            firstName: firstNameInput.value,
            lastName: lastNameInput.value,
            email: emailInput.value,
            phone: phoneInput.value,
        };
        addContact(newContact);
        hideAddContactForm();
        event.preventDefault();
    });

    get('cancel').addEventListener('click', hideAddContactForm);

    get("add").addEventListener("click", function () {
        addContactForm.style.display = 'inline-block';


    });


}());