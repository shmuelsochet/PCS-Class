/* global $ */
(function () {

    "use strict";

    var blogUl = $('#blogUl'),
        homeButton = $('#home'),
        nextButton = $('#next'),
        previousButton = $('#previous'),
        usersArray = [],
        postsArray = [],
        commentsArray = [],
        next = 0,
        nextBlock = 0,
        postsLength,
        cssClass = nextBlock,
        commentsClick = false;


    displayPage();

    homeButton.click(function () {

        usersArray = [];
        postsArray = [];
        commentsArray = [];
        next = 0;
        nextBlock = 0;
        cssClass = nextBlock;

        blogUl.empty();
        nextButton.off().hide();
        previousButton.off().hide();
        displayPage();

    });

    function displayPage() {

        $.get('https://jsonplaceholder.typicode.com/users', function (users) {

            users.forEach(function (element) {

                usersArray.push(element);

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
                        blogUl.css('listStyle', 'initial');

                        postsLength = posts.length;

                        posts.forEach(function (element, index) {

                            postsArray.push(element);

                            if (index > 2) {

                                if (index % 3 === 0) {
                                    nextBlock = index;
                                    cssClass = '"hide ' + nextBlock + '"';
                                } else {
                                    cssClass = '"hide ' + nextBlock + '"';
                                }

                            }

                            // Append posts along with comment button attach id to div to append comment
                            // and attach class to button to attach click-handler below.
                            blogUl.append(
                                '<div id=' + element.id + ' class=' + cssClass + '>' +
                                '<li><strong>Title:</strong> ' + element.title + '</li>' +
                                '<ul>' +
                                '<li>' + element.body + '</li>' +
                                '</ul>' +
                                '<button class=-' + element.id + '>Comments</button>' +
                                '</div>'

                            );

                            // Comment button click handler
                            $('.-' + element.id).click(function () {

                                $('.-' + element.id).text('Hide Comments');

                                if (commentsClick === false) {

                                    commentsClick = true;
                                    $.get('https://jsonplaceholder.typicode.com/posts/' + element.id + '/comments', function (comments) {

                                        comments.forEach(function (element) {

                                            commentsArray.push(element);

                                            // Append comments
                                            $('#' + element.postId + '> ul').append(
                                                '<ul class=' + element.postId + '>COMMENT ' + element.id + ':' +
                                                '<li><strong>Name: </strong>' + element.name + '</li>' +
                                                '<ul>' +
                                                '<li>' + element.body + '</li>' +
                                                '<li><em>' + element.email + '</em></li>' +
                                                '</ul>'

                                            );
                                        });

                                        console.log('comments', commentsArray);

                                    }).fail(function (jqXHR) {
                                        console.log(jqXHR);
                                    });
                                } else {

                                    commentsArray.forEach(function (element) {
                                        $('ul.' + element.postId).remove();
                                    });
                                    $('.-' + element.id).text('Comments');

                                    commentsClick = false;
                                }

                            });

                        });

                        console.log('postArray', postsArray);

                        previousButton.show().click(function () {

                            // Hide current 3 posts
                            $('div .' + next).hide();

                            next -= 3;

                            // Go to last one if at the beginning
                            if (next < 0) {
                                next = postsLength - 1;
                            }

                            // Show previous 3 posts
                            $('div .' + next).show();

                        });

                        nextButton.show().click(function () {

                            $('div .' + next).hide();

                            next += 3;

                            if (next > postsLength) {
                                next = 0;
                            }

                            $('div .' + next).show();

                        });

                    }).fail(function (jqXHR) {
                        console.log(jqXHR);
                    });

                });

            });

            console.log('usersArray', usersArray);

        }).fail(function (jqXHR) {
            console.log(jqXHR);
        });

    }

}());