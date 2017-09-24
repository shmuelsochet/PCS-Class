function isUpperCase(element, index, array) {
    return element === element.toUpperCase();
}

function isLowerCase(element, index, array) {
    return element === element.toLowerCase();
}

function some(array, callback) {
    for (i = 0; i < array.length; i++) {
        if (callback(array[i]) === true) {
            console.log(true);
            return true;
        }
    }
    console.log(false);
    return false;

}

var arr = ["a", "b", "c"];

some(arr, isUpperCase);

some(arr, isLowerCase);

console.log(arr.some(isUpperCase));

console.log(arr.some(isLowerCase));

function test(element) {
    return element > 0;
}

function action(element) {
    return element += 5;
}

function onlyIf(array, test, action) {
    var arrayToTest = [];
    var arrayWithAction = [];
    array.forEach(function (element) {
        if (test(element)) {
            arrayToTest.push(element);
        }
    });
    arrayToTest.forEach(function (element) {
        element = action(element);
        arrayWithAction.push(element);
    });
    return arrayWithAction;
}

var originalArr = [0, 2, 4, 6, -1];
var arrWithOnlyIf = onlyIf(originalArr, test, action);
console.log(arrWithOnlyIf);
