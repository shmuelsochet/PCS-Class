module.exports = function (req, res, next) {
    if (!req.query.magicWord || req.query.magicWord.toLowerCase() !== 'please') {

        const error = new Error('<h4>Say the magic word. 404</h4>');
        error.statusCode = 404;
        throw (error);
    }
    next();
}