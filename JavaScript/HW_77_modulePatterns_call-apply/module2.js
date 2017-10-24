var myApp = myApp || {};

myApp.Utils = (function (Utils) {
    "use strict";
    Utils.stringCaseInsensitiveEquals = function (string1, string2) {
        return string1.toUpperCase() === string2.toUpperCase();
    };

    return Utils;
}(myApp.Utils || {}));

console.log(myApp.Utils.getMonthNum("January"));