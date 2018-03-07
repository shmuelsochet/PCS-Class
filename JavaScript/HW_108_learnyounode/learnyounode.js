// 1.
// HELLO WORLD
console.log('HELLO WORLD');

// 2.
// BABY STEPS
function sum() {
    var sum = 0;
    for (var i = 2; i < process.argv.length; i++) {
        sum += Number(process.argv[i]);
    }

    return console.log(sum);
}

sum();

// 3.
// MY FIRST I/O!
var fs = require('fs'),
    pathToFile = process.argv[2],
    buffer = fs.readFileSync(pathToFile),
    fileString = buffer.toString(),
    array = fileString.split('\n');

console.log(array.length - 1);

// 4.
// MY FIRST ASYNC I/O!
var fs = require('fs'),
    pathToFile = process.argv[2];

fs.readFile(pathToFile, function callback(err, data) {
    if (err)
        return console.log("There was an error\n", err);

    var fileString = data.toString(),
        array = fileString.split('\n');

    console.log(array.length - 1);
});

// 5.
// FILTERED LS
var fs = require('fs'),
    directory = process.argv[2],
    extension = process.argv[3];

fs.readdir(directory, function callback(err, list) {
    if (err)
        return console.log("There was an error\n", err);

    var filteredByExtArray = list.filter(element => {
        var elementExtension = element.lastIndexOf('.') !== -1 ? element.substr(element.lastIndexOf('.') + 1) : null
        return extension === elementExtension;
    });

    filteredByExtArray.forEach(element => {
        console.log(element);
    })

});
