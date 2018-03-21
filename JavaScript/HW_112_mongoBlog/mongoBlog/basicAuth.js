module.exports = function (options) {
    function fail(res) {
        res.statusCode = 401;
        res.setHeader('WWW-Authenticate', 'Basic realm=' + options.realm || 'TheApp');
        res.end();
    }

    return function (req, res, next) {
        if (req.headers.authorization) {
            // check username and password
            //console.log(req.headers.authorization);
            let userNamePassword = req.headers.authorization.split(' ')[1];
            const buffer = new Buffer(userNamePassword, 'base64');
            userNamePassword = buffer.toString();
            console.log(userNamePassword);
            userNamePassword = userNamePassword.split(':');
            // if (options.users[userNamePassword[0]] === userNamePassword[1]) {
            res.locals.user = userNamePassword[0];
            next();
            // } else {
            //  fail(res)
            // }
        } else {
            fail(res);
        }
    }
};