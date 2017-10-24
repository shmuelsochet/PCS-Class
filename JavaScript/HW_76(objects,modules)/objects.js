
//month name function
//iife- immediately invoked function
var monthName = (function () {
    'use strict';

    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",

        "October", "November", "December"
    ];

    //you can write the function code here for a cleaner look 

    return {
        // these are closures so they have access to parent environment
        getMonthName: function (number) {
            return months[number - 1];
        },
        getMonthNumber: function (name) {
            for (var i = 0; i < months.length; i++) {
                if (months[i] === name) {
                    return i + 1;
                }
            }
            return "NO SUCH MONTH!";
        }
    };
}());

console.log("monthName.getMonthName(1)", monthName.getMonthName(1));
console.log("monthName.getMonthNumber(\"December\")", monthName.getMonthNumber("December"));

//interest calculator

var interestCalculator = (function () {
    'use strict';

    var interestRate = 0,
        years = 0;

    return {

        setInterestRate: function (rate) {
            interestRate = rate;
            //may see poeple do this
            return this;
        },
        setYears: function (yrs) {
            years = yrs;
            return this;
        },
        calculateInterest: function (amount) {
            for (var i = 0; i < years; i++) {
                amount += amount * (interestRate / 100);
            }
            return amount;
        },
    };
}());

console.log("interestCalculator.setInterestRate(10)", interestCalculator.setInterestRate(10),
    "interestCalculator.setYears(30)", interestCalculator.setYears(30),
    "interestCalculator.calculateInterest(100)", interestCalculator.calculateInterest(100));

//this is chaining which can be done because we returned the object (this)
console.log("Total amount",
    interestCalculator.setInterestRate(10).interestCalculator.setYears(30).calculateInterest(100));

