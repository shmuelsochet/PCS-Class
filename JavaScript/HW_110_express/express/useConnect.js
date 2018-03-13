const connect = require('connect'),
    app = connect(),
    queryParser = require('./queryParser');
// url = require('url');

app.use(require('./logger'));
app.use(require('./queryParser'));

app.use((req, res, next) => {
    res.setHeader('Content-Type', 'text/html')
    //     res.write("<h1>Hello from PCS</h1>");
    next();
});

app.use('/home', (req, res, next) => {
    res.end("<h2 style=color:red>The Home page</h2>");
    //next();
});

app.use('/about', (req, res, next) => {
    res.end("<h2>PCS is a great place.</h2>");
    //next();
});

// app.use((req, res, next) => {
//     res.write("<hr/><h5>Copyright PCS 2018</h5>");
// });

app.use('/makeError', (req, res, next) => {
    foo.bar();
    //next();
});

app.use('/sayHello', (req, res, next) => {
    // const theUrl = url.parse(req.url, true);
    res.end(`<h2>Hello ${req.query.name || 'someone'}.</h2>`);
    //next();
});

app.use('/sayGoodbye', (req, res, next) => {
    // const theUrl = url.parse(req.url, true);
    res.end(`<h2>Hello ${req.query.name || 'someone'}.</h2>`);
    //next();
});

app.use((req, res, next) => {
    //res.statusCode = 404
    //res.end("<h5>Page not found</h5>");
    const error = new Error('<h4>Page not found. 404</h4>');
    error.statusCode = 404;
    throw (error);
});

app.use((err, req, res, next) => {
    res.statusCode = err.statusCode || 500
    res.end("<h4>Something went wrong</h4><p>" + err.message + "</p>");
});

app.listen(80);
