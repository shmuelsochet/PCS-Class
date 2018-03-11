var http = require('http');

http.get(process.argv[2], function (response) {
    var newData = response.setEncoding('utf8');

    response.on('data', function (newData) {
        console.log(newData);

    });
});
