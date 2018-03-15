const connect = require('connect'),
    app = connect(),
    queryParser = require('./queryParser'),
    logger = require('./logger'),
    magicWord = require('./magicWord');

app.use(logger);
app.use(queryParser);

app.use((req, res, next) => {
    res.setHeader('Content-Type', 'text/html')
    next();
});

app.use(magicWord);

app.use('/home', (req, res, next) => {
    res.end("<h2 style=color:red>The Home page</h2>");
});

app.use('/about', (req, res, next) => {
    res.end("<h2>PCS is a great place.</h2>");

});

app.use('/makeError', (req, res, next) => {
    foo.bar();

});

app.use('/sayHello', (req, res, next) => {

    res.end(`<h2>Hello ${req.query.name || 'someone'}.</h2>`);

});

app.use('/sayGoodbye', (req, res, next) => {

    res.end(`<h2>Goodbye ${req.query.name || 'someone'}.</h2>`);

});

app.use((req, res, next) => {

    const error = new Error('<h4>Page not found. 404</h4>');
    error.statusCode = 404;
    throw (error);
});

app.use((err, req, res, next) => {
    res.statusCode = err.statusCode || 500
    res.end("<h4>Something went wrong</h4><p>" + err.message + "</p>");
});

app.listen(80);
