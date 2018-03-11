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
