(function () {
    /* global $ */

    "use strict";

    $.getJSON('foods.php', function (foods) {
        foods.forEach(function (element, index) {
            $("table thead").append("<tr class=" + index + "></tr > ")
            $("." + index).append("<td><img src=" + element.img + "></td>");
            $("." + index).append("<td>" + element.name + "</td>");
            $("." + index).append("<td>" + element.flavor + "</td>");
            $("." + index).append("<td>" + element.calories + "</td>");
            $("." + index).append("<td>" + element.serving_size_grams + "</td>");
            $("." + index).append("<td>" + element.total_fat_g + "</td>");
            $("." + index).append("<td>" + element.total_carbs_g + "</td>");
            $("." + index).append("<td>" + element.sugar_g + "</td>");
            $("." + index).append("<td>" + element.protein_grams + "</td>");
        });

        $("#search").keyup(function () {
            console.log($("#search").val());

            var input, filter, table, tr, td, i, j, isMatch;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                isMatch = false;
                //j = 1 not to search img url
                for (j = 1; j < tr[i].children.length - 1; j++) {

                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            isMatch = true;
                        } else if (!isMatch) {
                            tr[i].style.display = "none";
                        }
                    }
                }

            }


        });

        console.log(foods);
    })
        .fail(function (jqxhr) {
            console.log(jqxhr);
        });


}());


