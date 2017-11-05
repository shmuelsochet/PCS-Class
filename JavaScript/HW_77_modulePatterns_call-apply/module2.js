var myApp = myApp || {};

myApp.Utils = (function (Utils) {
    "use strict";
    Utils.stringCaseInsensitiveEquals = function (string1, string2) {
        return string1.toUpperCase() === string2.toUpperCase();
    };

    return Utils;
}(myApp.Utils || {}));

//console.log(myApp.Utils.getMonthNum("January"));

//not running test returns value for each element

//cal increment goes up or get current count gives current count

//can't change count without increment protected

//app.counter 

//gives you another counter and keep track how many counters keep this private

//third javascript