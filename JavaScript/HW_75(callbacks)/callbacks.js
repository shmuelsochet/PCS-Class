"use strict";
function isUpperCase(element) {

    //this will check if it's letter and if uppercase
    return typeof element === "string" &&
        element === element.toUpperCase();
}

function isLowerCase(element) {
    //better to write below since if you need to change one you don't have to change the 2nd
    //though it's more expensive to have a function call then a regular return
    // return !isUpperCase(); 
    return element === element.toLowerCase();
}

function some(array, callback) {
    for (var i = 0; i < array.length; i++) {
        if (callback(array[i]) === true) {
            return true;
        }
    }
    return false;

}

var arr = ["a", "b", "c"];

//these are test code that some may write first before writing the function
console.log(some(arr, isUpperCase));

console.log(some(arr, isLowerCase));

console.log(arr.some(isUpperCase));

console.log(arr.some(isLowerCase));

function test(element) {
    return element > 0;
}

function action(element) {
    return element += 5;
}

//this was to create a new array with the elements that passed the test and had the action
//performed on them
// function onlyIf(array, test, action) {
//     var arrayToTest = [];
//     var arrayWithAction = [];
//     array.forEach(function (element) {
//         if (test(element)) {
//             arrayToTest.push(element);
//         }
//     });
//     arrayToTest.forEach(function (element) {
//         element = action(element);
//         arrayWithAction.push(element);
//     });
//     return arrayWithAction;
// }

//or for functional programming you would create a new array and leave the original untouched
function onlyIf(array, test, action) {
    array.forEach(function (element, index) {
        if (test(element)) {
            array[index] = action(element);
        }
    });
    return array;

}

var originalArr = [0, 2, 4, 6, -1];
var arrWithOnlyIf = onlyIf(originalArr, test, action);
console.log(arrWithOnlyIf);
