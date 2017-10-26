var myApp = myApp || {};

myApp.counter = (function (module) {
    "use strict";
    var count = 0;

    module.getCount = function () {
        return count;
    };

    module.increment = function () {
        return ++count;
    };

    return module;
}(myApp.counter || {}));