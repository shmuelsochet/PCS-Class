/* global $ */
(function () {

    "use strict";

    var blogUl = $('#blogUl'),
        homeButton = $('#home'),
        nextButton = $('#next');


    homeButton.click(function () {
        blogUl.empty();
        $.get('https://jsonplaceholder.typicode.com/users', function (users) {

            users.forEach(function (element) {
                blogUl.append('<li class=blogHover id=' + element.id + '>' + element.name + '</li>');

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
                '<li class=blogHover id=' + element.id + '>' + element.name + '</li>' +
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

                    blogUl.empty();
                    blogUl.css('listStyle', 'initial')
                    console.log(posts);

                    // var postsUl = $('<ul></ul>');

                    //blogUl.append(postsUl);

                    // postsUl.appendTo('#' + element.id);
                    var nextBlock = 0;
                    posts.forEach(function (element, index) {
                        if (index < 3) {
                            blogUl.append(
                                '<li><strong>Title:</strong> ' + element.title + '</li>' +
                                '<ul>' +
                                '<li>' + element.body + '</li>' +
                                '</ul>'
                            );
                        } else {

                            var cssClass = '';

                            if (index % 3 === 0) {
                                nextBlock = index;
                                cssClass = 'hide' + nextBlock;
                            } else {
                                //cssClass = 'hide';
                            }
                            blogUl.append(
                                '<div class=' + cssClass + '><li><strong>Title:</strong> ' + element.title + '</li>' +
                                '<ul>' +
                                '<li>' + element.body + '</li>' +
                                '</ul>' +
                                '</div>'
                            );
                        }

                    });
                    var next = 3;
                    nextButton.show().click(function () {

                        $('div .' + next).show();
                        next += 3;
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