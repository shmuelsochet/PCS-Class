var fs = require('fs'),
    pathToFile = process.argv[2];

fs.readFile(pathToFile, function callback(err, data) {
    if (err)
        return console.log("There was an error\n", err);

    var fileString = data.toString(),
        array = fileString.split('\n');

    console.log(array.length - 1);
});
