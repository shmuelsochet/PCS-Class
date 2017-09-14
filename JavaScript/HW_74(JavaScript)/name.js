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