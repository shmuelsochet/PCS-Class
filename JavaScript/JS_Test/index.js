/* global $ */
(function () {

    "use strict";

    var blogUl = $('#blogUl'),
        homeButton = $('#home');


    homeButton.click(function () {
        blogUl.empty();
        $.get('https://jsonplaceholder.typicode.com/users', function (users) {

            users.forEach(function (element) {
                blogUl.append('<li id=' + element.id + '>' + element.name + '</li>');

                $('#' + element.id).click(function () {

                    $.get('https://jsonplaceholder.typicode.com/posts?userId=' + element.id, function (posts) {

                        console.log(posts);
                        var postsUl = $('<ul></ul>');
                        postsUl.appendTo('#' + element.id);
                        posts.forEach(function (element) {
                            postsUl.append('<li>' + element.body + '</li>');
                        });


                    }).fail(function (jqXHR) {
                        console.log(jqXHR, 'hello');
                    });


                });



            });

            console.log(users);



        }).fail(function (jqXHR) {
            console.log(jqXHR);
        });

    });

    $.get('https://jsonplaceholder.typicode.com/users', function (users) {

        users.forEach(function (element) {
            blogUl.append(
                '<li id=' + element.id + '>' + element.name + '</li>' +
                '<ul>' +
                '<li>' + element.website + '</li>' +
                '<li>' + element.company.name + '</li>' +
                '<ul>' +
                '<li>' + element.company.catchPhrase + '</li>' +
                '<li>' + element.company.bs + '</li>' +
                '</ul>' +
                '</ul>'
            );

            $('#' + element.id).click(function () {

                $.get('https://jsonplaceholder.typicode.com/posts?userId=' + element.id, function (posts) {


                    console.log(posts);
                    var postsUl = $('<ul></ul>');
                    postsUl.appendTo('#' + element.id);
                    posts.forEach(function (element) {
                        postsUl.append('<li>' + element.body + '</li>');
                    });



                }).fail(function (jqXHR) {
                    console.log(jqXHR, 'hello');
                });


            });



        });

        console.log(users);



    }).fail(function (jqXHR) {
        console.log(jqXHR);
    });



}());