/* global $ */
(function () {
    "use strict";
    var body = $('body'),
        mainDiv = $("<div></div>"),
        h1Div = $("<div></div>"),
        h1 = $("<h1></h1>"),
        imgDiv = $("<div></div>"),
        img = $("<img>"),
        ingredientsDiv = $("<div></div>"),
        ingredientsOl = $("<ol></ol>"),
        button = $("<button></button>"),
        input = $("<input>");

    body.append(mainDiv);
    mainDiv.append(button, input, h1Div, imgDiv, ingredientsDiv);

    button.text('Recipe');
    h1.appendTo(h1Div);
    img.appendTo(imgDiv);
    ingredientsOl.appendTo(ingredientsDiv);

    mainDiv.css('text=align', 'center');
    ingredientsDiv.css({
        "margin-left": "calc(50% - 50px)"
    });

    h1.css('text-align', 'center');
    imgDiv.css('text-align', 'center');

    //working on using a radio button
    // $.getJSON("recipe.php", function (data) {
    //     data.forEach(function (element) {

    //         body.append("<input type=\"radio\" name=\"recipe\"/>" + element.name + "<br>");
    //     }, this);
    // });


    button.click('click', function () {
        $.getJSON("recipe.php", function (data) {
            for (var i = 0; i < data.length; i++) {
                if (data[i].name === input.val().toLowerCase()) {
                    h1.text(data[i].name.toUpperCase());
                    img.attr('src', data[i].picture);

                    var theLi1 = $("<li>" + data[i].ingredient_1 + "</li>"),
                        theLi2 = $("<li>" + data[i].ingredient_2 + "</li>"),
                        theLi3 = $("<li>" + data[i].ingredient_3 + "</li>");
                    theLi1.appendTo(ingredientsOl);
                    theLi2.appendTo(ingredientsOl);
                    theLi3.appendTo(ingredientsOl);
                    break;
                } else {
                    body.append('No Recipe');

                }

            }


            // data[i].ingredients.forEach(function (element) {
            //     var theLi = $("<li>" + element + "</li>");
            //     theLi.appendTo(ingredientsOl);
            // });

            console.log(data);
        })
            .fail(function (jqxhr) {
                console.log(jqxhr);

            });
    });


}());