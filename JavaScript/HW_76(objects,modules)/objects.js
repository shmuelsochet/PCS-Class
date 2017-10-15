
//month name function
var monthName = (function () {
    'use strict';

    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",

        "October", "November", "December"
    ];

    return {
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
        },
        setYears: function (yrs) {
            years = yrs;
        },
        calculateInterest: function (amount) {
            for (var i = 0; i < years; i++) {
                amount += amount * interestRate;
            }
            return amount;
        },
    };
}());

console.log("interestCalculator.setInterestRate(.1)", interestCalculator.setInterestRate(.1),
    "interestCalculator.setYears(30)", interestCalculator.setYears(30),
    "interestCalculator.calculateInterest(100)", interestCalculator.calculateInterest(100));
