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
