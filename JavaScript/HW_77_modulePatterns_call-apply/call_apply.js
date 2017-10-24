var checking = {
    balance: 0
};

var savings = {
    balance: 0
};

function addInterest(interest) {
    "use strict";
    this.balance = this.balance + interest;
}

addInterest.call(checking, 5);