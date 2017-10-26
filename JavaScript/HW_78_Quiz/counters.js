var myApp = myApp || {};

myApp.counter = (function (module) {
    "use strict";

    module.createCounter = function (module) {
        return {
            count: 0,

            getCount: function () {
                return count;
            },

            increment: function () {
                return ++count;
            }
        };


        return module;
    }(myApp.counter || {}));