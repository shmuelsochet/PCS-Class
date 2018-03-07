var fs = require('fs'),
    pathToFile = process.argv[2],
    buffer = fs.readFileSync(pathToFile),
    fileString = buffer.toString(),
    array = fileString.split('\n');

console.log(array.length - 1);
