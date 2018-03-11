// 6.
// MAKE IT MODULAR
module.exports = function (directory, extension, callback) {

    var fs = require('fs'),
        path = require('path');

    fs.readdir(directory, function (err, list) {
        if (err)
            return callback(err);

        var filteredByExtArray = list.filter(element => {
            var elementExtension = path.extname(element);
            return '.' + extension === elementExtension;
        });

        filteredByExtArray.forEach(element => {
            console.log(element);
        })
        return callback(null, filteredByExtArray);
    });
}

// RUN MAKE IT MODULAR
var makeItModular = require('./makeItModular');

makeItModular(process.argv[2], process.argv[3], function (err, data) {
    if (err)
        console.log(err);
});

// 7.
// HTTP CLIENT
var http = require('http');

http.get(process.argv[2], function (response) {
    var newData = response.setEncoding('utf8');

    response.on('data', function (newData) {
        console.log(newData);

    });
});


// 8.
// HTTP COLLECT
var bl = require('bl');
var http = require('http');

http.get(process.argv[2], function (response) {

    response.pipe(bl(function (err, data) {
        if (err) {
            return console.log(err);
        }

        dataString = data.toString()
        console.log(dataString.length);
        console.log(dataString);
    }));

}).on('error', (error) => console.log(error));
