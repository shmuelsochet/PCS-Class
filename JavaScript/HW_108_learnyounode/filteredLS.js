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
