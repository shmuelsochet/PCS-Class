function mapArray(array, callback) {
    "use strict";
    var mappedArray = [];
    for (var i = 0; i < array.length; i++) {
        mappedArray.push(callback(array[i]));
    }
    return mappedArray;

}

function double(element) {
    "use strict";
    return element * 2;
}

var originalArray = [2, 4, 6];
var mappedArray = mapArray(originalArray, double);

console.log("originalArray = ", originalArray);
console.log("mappedArray = ", mappedArray);
