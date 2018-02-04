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
        currentPost;


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

            users.forEach(function (user) {

                usersArray.push(user);

                blogUl.append(
                    '<li class=blogHover id=' + user.id + '>' + user.name + '</li>' +
                    '<ul>' +
                    '<li>' + user.website + '</li>' +
                    '<li>' + user.company.name + '</li>' +
                    '<ul>' +
                    '<li>' + user.company.catchPhrase + '</li>' +
                    '<li>' + user.company.bs + '</li>' +
                    '</ul>' +
                    '</ul>'
                );

                $('#' + user.id).click(function () {

                    $.get('https://jsonplaceholder.typicode.com/posts?userId=' + user.id, function (posts) {

                        blogUl.empty();
                        blogUl.css('listStyle', 'initial');

                        postsLength = posts.length;

                        posts.forEach(function (post, index) {

                            postsArray.push(post);

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
                                '<div id=' + post.id + ' class=' + cssClass + '>' +
                                '<li><strong>Title:</strong> ' + post.title + '</li>' +
                                '<ul>' +
                                '<li>' + post.body + '</li>' +
                                '</ul>' +
                                '<button class=-' + post.id + '>Comments</button>' +
                                '</div>'

                            );

                            // Comment button click handler
                            $('.-' + post.id).click(function () {

                                if ($('.-' + post.id).text() === 'Comments') {

                                    $.get('https://jsonplaceholder.typicode.com/posts/' + post.id + '/comments', function (comments) {

                                        comments.forEach(function (comment) {

                                            commentsArray.push(comment);

                                            // Append comments
                                            $('#' + comment.postId + '> ul').append(
                                                '<ul class=' + comment.postId + '>COMMENT ' + comment.id + ':' +
                                                '<li><strong>Name: </strong>' + comment.name + '</li>' +
                                                '<ul>' +
                                                '<li>' + comment.body + '</li>' +
                                                '<li><em>' + comment.email + '</em></li>' +
                                                '</ul>'

                                            );
                                        });

                                        $('.-' + post.id).text('Hide Comments');


                                    }).fail(function (jqXHR) {
                                        console.log(jqXHR);
                                    });
                                } else {

                                    currentPost = post.id;

                                    commentsArray.forEach(function () {
                                        $('ul.' + currentPost).remove();

                                    });

                                    $('.-' + currentPost).text('Comments');

                                }

                            });

                        });

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

        }).fail(function (jqXHR) {
            console.log(jqXHR);
        });

    }

}());
