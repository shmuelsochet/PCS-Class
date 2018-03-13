module.exports = function (req, res, next) {
    const now = new Date();
    console.log(now.toLocaleDateString(), now.toLocaleTimeString(), req.url);
    next();
}