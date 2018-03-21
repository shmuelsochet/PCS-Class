const express = require('express')(),
    app = express(),
    http = require('http').Server(app),
    io = require('socket.io')(http),
    path = require('path');

app.use(express.static(path.join(__dirname, 'public')));

// app.get('/', (req, res, next) => {
//     res.sendFile(__dirname + '/index.html');
// });

// app.get('/', (req, res, next) => {
//     res.end('Hello');
// });


io.on('connection', socket => {
    console.log('Got a connection');

    socket.broadcast.emit('message', 'Hello there. This is a message sent over a socket');

});

http.listen(80);
