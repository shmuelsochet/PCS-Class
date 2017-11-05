(function () {
    "use strict";

    var checking = {
        balance: 0
    };

    var savings = {
        balance: 0
    };

    //you can use this function like a constructor
    function createAccount(openingBalance) {
        return {
            balance: openingBalance
        };
    }

    var checking2 = createAccount(0);
    var savings2 = createAccount(0);

    function addInterest(interest) {

        //do +=
        //without use strict this goes on global balance which is nan bec. there is not glabal balance
        this.balance = this.balance + interest;
    }

    addInterest.call(checking, 5);
    addInterest.apply(checking2, [5]);

    console.log(checking, savings, checking2, savings2);

    //sometimes you want to set up the 'this' beforehand and 'bind' it
    var add5ToSavings = addInterest.bind(savings, 5);

    add5ToSavings();
    add5ToSavings();

    console.log(checking2, savings);

}());