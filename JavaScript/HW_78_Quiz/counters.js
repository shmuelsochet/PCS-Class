var myApp = myApp || {};

myApp.createCounters = (function (module) {
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
}(myApp.createCounters || {}));