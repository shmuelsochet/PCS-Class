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

                    blogUl.append(
                        '<li class="blogHover " id=' + user.id + '><strong>Name:&nbsp;</strong>' + user.name + '</li>' +
                        '<ul>' +
                        '<li><strong>Website:&nbsp;</strong>' + user.website + '</li>' +
                        '<li><strong>Company:&nbsp;</strong> ' + user.company.name + '</li>' +
                        '<ul>' +
                        '<li><strong>Catch Phrase:&nbsp;</strong>' + user.company.catchPhrase + '</li>' +
                        '<li><strong>Tags:&nbsp;</strong>' + user.company.bs + '</li>' +
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
                        '<li><strong>Title:&nbsp;</strong>' + post.title + '</li>' +
                        '<ul>' +
                        '<li><strong>Body:&nbsp;</strong>' + post.body + '</li>' +
                        '</ul>' +
                        '<button class="btn btn-secondary -' + post.id + '">Comments</button>' +
                        '<div class=row><label class=col-sm-1>Name:</label><input class="form-control col-sm-2" id=name-' + post.id + '>' +
                        '<label class=col-sm-1>Body:</label><input class="form-control col-sm-3" id=body-' + post.id + '>' +
                        '<label class=col-sm-1>Email:</label><input class="form-control col-sm-3" id=email-' + post.id + '>' +
                        '</div>' +
                        '<br><button class="btn btn-secondary addComment-' + post.id + '">Add Comment</button>' +
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

            var commentsFetched = false;

            // Check if comments where already fetched.
            for (var i = 0; i < commentsArray.length; i++) {

                // Check for new comment, if a comment was added before the post's old comments were fetched
                if (commentsArray[i].postId === postId && !commentsArray[i].new) {

                    commentsFetched = true;
                    i = commentsArray.length;

                }
            }

            if (commentsFetched === false) {

                fetch('https://jsonplaceholder.typicode.com/posts/' + postId + '/comments')
                    .then(checkResponse, networkError)
                    .then(function (comments) {

                        comments.forEach(function (comment) {

                            commentsArray.push(comment);

                            $('#' + comment.postId + '> ul').append(
                                getCommentString(comment.postId, comment.id, comment.name, comment.body, comment.email)

                            );


                        });

                        $('.-' + postId).text('Hide Comments');
                    })
                    .catch(function (error) {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
            }

            else if (commentsFetched === true) {

                commentsArray.forEach(function (comment) {

                    if (comment.postId === postId) {
                        // Append comments
                        $('#' + comment.postId + '> ul').append(
                            getCommentString(comment.postId, comment.id, comment.name, comment.body, comment.email)

                        );
                    }

                });

                $('.-' + postId).text('Hide Comments');


            }
        } else {

            // Hide comments by removing the comments ul
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
                    email: emailInput.val(),
                    new: true
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }

            })
            .then(checkResponse, networkError)
            .then(function (comment) {

                // Append comments
                $('#' + comment.postId + '> ul').append(

                    getCommentString(comment.postId, comment.id, comment.name, comment.body, comment.email)

                );

                comment.postId = parseInt(comment.postId);

                commentsArray.push(comment);

                nameInput.val('');
                bodyInput.val('');
                emailInput.val('');

            })
            .catch(function (error) {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

    function getCommentString(postId, id, name, body, email) {

        var commentString = '<ul class=' + postId + '>COMMENT ' + id + ':' +
            '<li><strong>Name:&nbsp;</strong>' + name + '</li>' +
            '<ul>' +
            '<li><strong>Comment:&nbsp;</strong>' + body + '</li>' +
            '<li><strong>Email:&nbsp;</strong><em>' + email + '</em></li>' +
            '</ul>';

        return commentString;
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
