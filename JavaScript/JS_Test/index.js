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

    function networkError(response) {
        throw Error(response);
    }

    function checkResponse(response) {
        if (response.ok) {
            return response.json();
        }
        throw Error(response.statusText);
    }

    function displayBlog() {

        fetch('http://jsonplaceholder.typicode.com/users')
            .then(checkResponse, networkError)
            .then(function (users) {

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


            })
            .catch(function (error) {
                console.error('There has been a problem with your fetch operation:', error);
            });

    }

    function showPosts(userId) {

        fetch('https://jsonplaceholder.typicode.com/posts?userId=' + userId)
            .then(checkResponse, networkError)
            .then(function (posts) {

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
                        '<br/><label>Name:</label><input id=name-' + post.id + '>' +
                        '<br/><label>Body:</label><input id=body-' + post.id + '>' +
                        '<br/><label>Email:</label><input id=email-' + post.id + '>' +
                        '<br/><button class=addComment-' + post.id + '>Add Comment</button>' +
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

            })
            .catch(function (error) {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

    function showComments(postId) {

        if ($('.-' + postId).text() === 'Comments') {

            fetch('https://jsonplaceholder.typicode.com/posts/' + postId + '/comments')
                .then(checkResponse, networkError)
                .then(function (comments) {

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

                })
                .catch(function (error) {
                    console.error('There has been a problem with your fetch operation:', error);
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

        var nameInput = $('#name-' + postId),
            bodyInput = $('#body-' + postId),
            emailInput = $('#email-' + postId);

        fetch('https://jsonplaceholder.typicode.com/posts/' + postId + '/comments',
            {
                method: 'POST',
                body: JSON.stringify({
                    postId: postId,
                    name: nameInput.val(),
                    body: bodyInput.val(),
                    email: emailInput.val()
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }

            })
            .then(checkResponse, networkError)
            .then(function (comment) {

                // Append comments
                $('#' + comment.postId + '> ul').append(
                    '<ul class=' + comment.postId + '>COMMENT ' + comment.id + ':' +
                    '<li><strong>Name: </strong>' + comment.name + '</li>' +
                    '<ul>' +
                    '<li>' + comment.body + '</li>' +
                    '<li><em>' + comment.email + '</em></li>' +
                    '</ul>'

                );

                nameInput.val('');
                bodyInput.val('');
                emailInput.val('');

            })
            .catch(function (error) {
                console.error('There has been a problem with your fetch operation:', error);
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
