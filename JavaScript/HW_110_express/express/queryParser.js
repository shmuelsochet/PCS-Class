const url = require('url');

module.exports = function (req, res, next) {
    const theUrl = url.parse(req.url, true);
    req.query = theUrl.query;
    next();

}
