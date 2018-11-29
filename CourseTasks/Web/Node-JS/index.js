"use srtict"

var express = require('express');
var bodyParser = require('body-parser');

var app = express();

var urlencodedParser = bodyParser.urlencoded({ extended: false });

app.set('view engine', 'ejs');
app.use('/public', express.static('public'));
app.use('/pictures', express.static('pictures'));

app.get('/', function (req, res) {
    res.render('main');
});

app.get('/contact', function (req, res) {
    res.render('contact');
});

app.post('/contact', urlencodedParser, function (req, res) {
    if (!req.body) {
        return res.sendStatus(400);
    }
    else {
        console.log(req.body);
    }
    res.render('contact');
});

app.listen(3000);