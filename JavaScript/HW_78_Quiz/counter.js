var myApp = myApp || {};

myApp.counter = (function (module) {
    "use strict";
    var count = 0;

    module.getCount = function () {
        return count;
    };

    module.increment = function () {
        count++;
        return this;
    };

    return module;
}(myApp.counter || {}));