//closure, is that child has access to environment, even if parent was already returned

//don't pass along app here since you want app to exist otherwise it should crash
//better to get rid of the warnings by using global app

/* global myApp */
//var myApp = myApp || {}; 

myApp.createCounters = (function (module) {
    "use strict";
    var numberOfCreatedCounters = 0;
    module.createCounter = function () {

        numberOfCreatedCounters++;
        return {

            //this should be placed above as var count = 0 so that it can't be accessed in the return, also since
            //there is a getCount function it's superfluous
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