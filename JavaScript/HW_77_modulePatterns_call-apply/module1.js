var myApp = myApp || {};

myApp.Utils = (function (Utils) {
    "use strict";
    var months = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"
    ];

    Utils.getMonthName = function (number) {

        return months[number - 1];
    };

    Utils.getMonthNum = function (name) {
        for (var i = 0; i < months.length; i++) {
            if (months[i] === name) {
                return i + 1;
            }
        }
        return "NO SUCH MONTH!";
    };

    return Utils;
}(myApp.Utils || {}));

console.log(myApp.Utils.getMonthName(10));