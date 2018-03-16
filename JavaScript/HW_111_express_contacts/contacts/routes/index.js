var express = require('express');
var router = express.Router();

var contacts = [
  {
    id: 1,
    first: "Donald",
    last: "Trump"
  },
  {
    id: 2,
    first: "Mike",
    last: "Pence"
  }

]


/* GET home page. */
router.get('/', function (req, res, next) {
  res.render('index', { title: 'Express' });

});


router.get('/contacts', function (req, res, next) {
  res.render('index', { title: 'Contacts', allContacts: contacts });
});

router.post('/contacts', function (req, res, next) {
  contacts.push({ id: req.body.id, first: req.body.first, last: req.body.last })
  res.render('index', { title: 'Contacts', allContacts: contacts });
});

module.exports = router;
