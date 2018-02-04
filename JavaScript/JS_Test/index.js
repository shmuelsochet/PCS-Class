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


    displayBlog();

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
        displayBlog();

    });

    function displayBlog() {

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
                    showPosts(user.id);
                });

            });

        }).fail(function (jqXHR) {
            console.log(jqXHR);
        });

    }

    function showPosts(userId) {
        $.get('https://jsonplaceholder.typicode.com/posts?userId=' + userId, function (posts) {

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
                    '<br><label>Name:</label><input id=name-' + post.id + '>' +
                    '<br><label>Body:</label><input id=body-' + post.id + '>' +
                    '<br><label>Email:</label><input id=email-' + post.id + '>' +
                    '<br><button class=addComment-' + post.id + '>Add Comment</button>' +
                    '</div>'

                );

                // Add comment click handler
                $('.addComment-' + post.id).click(function () {
                    addComment(post.id);
                });

                // Comment button click handler
                $('.-' + post.id).click(function () {
                    showComments(post.id);
                });

            });

            previousButton.show().click(showPreviousThreePosts);

            nextButton.show().click(showNextThreePosts);

        }).fail(function (jqXHR) {
            console.log(jqXHR);
        });
    }

    function showComments(postId) {

        if ($('.-' + postId).text() === 'Comments') {

            $.get('https://jsonplaceholder.typicode.com/posts/' + postId + '/comments', function (comments) {

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

                $('.-' + postId).text('Hide Comments');


            }).fail(function (jqXHR) {
                console.log(jqXHR);
            });
        } else {

            currentPost = postId;

            commentsArray.forEach(function () {
                $('ul.' + currentPost).remove();

            });

            $('.-' + currentPost).text('Comments');

        }
    }

    function addComment(postId) {

        $.post('https://jsonplaceholder.typicode.com/posts/' + postId + '/comments',
            {

                postId: postId,
                name: $('#name-' + postId).val(),
                body: $('#body-' + postId).val(),
                email: $('#email-' + postId).val()
            }, function (comment) {


                // Append comments
                $('#' + comment.postId + '> ul').append(
                    '<ul class=' + comment.postId + '>COMMENT ' + comment.id + ':' +
                    '<li><strong>Name: </strong>' + comment.name + '</li>' +
                    '<ul>' +
                    '<li>' + comment.body + '</li>' +
                    '<li><em>' + comment.email + '</em></li>' +
                    '</ul>'

                );

                $('#name-' + postId).val('');
                $('#body-' + postId).val('');
                $('#email-' + postId).val('');


            }).fail(function (jqXHR) {
                console.log(jqXHR);
            });
    }

    function showPreviousThreePosts() {

        // Hide current 3 posts
        $('div .' + next).hide();

        next -= 3;

        // Go to last one if at the beginning
        if (next < 0) {
            next = postsLength - 1;
        }

        // Show previous 3 posts
        $('div .' + next).show();
    }

    function showNextThreePosts() {

        $('div .' + next).hide();

        next += 3;

        if (next > postsLength) {
            next = 0;
        }

        $('div .' + next).show();
    }

}());
