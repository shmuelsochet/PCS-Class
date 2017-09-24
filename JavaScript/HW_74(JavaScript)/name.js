alert(name);

function greaterThan(first, second) {
    if (first > second) {
        return true;
    } else if (!(first > second)) {
        return false;
    }
}

console.log("7 is greater than 6:" + greaterThan(7, 6));
console.log("3 is greater than 6:" + greaterThan(3, 6));
console.log("6 is greater than 6:" + greaterThan(6, 6));

//this would be the test code for the function greaterThan and some write it before writing the actual code
console.assert(greaterThan(5, 6) === false);
console.assert(greaterThan(6, 5) === true);