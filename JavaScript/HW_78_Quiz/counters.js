var myApp = myApp || {};

myApp.counter = (function (module) {
    "use strict";
    var numberOfCreatedCounters = 0;
    module.createCounter = function () {

        numberOfCreatedCounters++;
        return {

            count: 0,

            getCount: function () {
                return this.count;
            },

            increment: function () {
                return ++this.count;
            }
        };
    };
    module.getNumberOfCreatedCounters = function () {

        return numberOfCreatedCounters;

    };


    return module;
}(myApp.counter || {}));