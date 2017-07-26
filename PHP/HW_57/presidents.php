<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../bootstrap-3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <p>
        <!--For homework please do the following:
            1. Rework your presidents page from the last homework to model each president as an NON ASSOCIATIVE array. i.e. Each "president" array will have 2 elements. The element at spot 0 will be name and the element in spot 1 will be years. All the presidents should be stored in an array as well.
            2. Same as above but this time model each president as an associative array that has "name" and "years".
            3. E.C. See if you can generate the columns for #2 (including the headers) dynamically as well. i.e. if you added an age to the president elements, the table would show an age column with NO CHANGES other then to the array elements - no changes to the code that creates and outputs the values in the table.
        you can simply output 2 tables in one page instead of submitting two files.
    </p>-->

    <?php

        $trump = "Donald Trump";
        $obama = "Barack Obama";
        $bush = "George W Bush";
        $trumpYears = "2017-Current";
        $obamaYears = "2009-2016";
        $bushYears = "2000-2008";
        $trumpAge = 71;
        $obamaAge = 55;
        $bushAge = 70 ;

//HW part 1.
        $trumpArray = [$trump, $trumpYears];
        $obamaArray = [$obama, $obamaYears];
        $bushArray = [$bush, $bushYears];

        $presidentsArray = [$trumpArray,$obamaArray,$bushArray];

    ?>

        <table class="table table-striped table-bordered table-hover">
        <caption>
            <h1>Presidents</h1>
        </caption>
        <thead>
            <tr>
                <th>President</th>
                <th>Year</th>

            </tr>
        </thead>
        <tbody>
            <?php

                for($i = 0; $i < count($presidentsArray); $i++){
                   echo '<tr><td>'. $presidentsArray[$i][0] . "</td><td>" .
                   $presidentsArray[$i][1] . '</td></tr>';
                    }
            ?>

            <?php
            /*s. lubowsky did it this way in hw where you're not echoing the
            html
                for($i = 0; $i < count($presidentsArray); $i++){ ?>
                 <tr><td> <?=$presidentsArray[$i][0] ?> </td><td>
                <?= $presidentsArray[$i][1] ?> </td></tr>
               <?php } */ ?>

                <?php
            /*another way to have your for loop syntax use colons and
            then you end the for each
                for($i = 0; $i < count($presidentsArray); $i++): ?>
                 <tr><td> <?=$presidentsArray[$i][0] ?> </td><td>
                <?= $presidentsArray[$i][1] ?> </td></tr>
               <?php endforeach */ ?>





        </tbody>

    </table>

    <?php

//HW part 2.
        $trumpArray = ["President" => $trump, "Years" => $trumpYears, "Age" => $trumpAge];
        $obamaArray = ["President" => $obama, "Years" => $obamaYears, "Age" => $obamaAge];
        $bushArray = ["President" => $bush, "Years" => $bushYears, "Age" => $bushAge];

        $presidentsArray = ["Trump" => $trumpArray, "Obama" => $obamaArray,
        "Bush" => $bushArray];

        //print_r($presidentsArray);

        // foreach($presidentsArray as $president){
        //     foreach($president as $property){
        //         echo $property . "<br/>";
        //     }
        // }

?>

<table class="table table-striped table-bordered table-hover">
        <caption>
            <h1>Presidents</h1>
        </caption>
        <thead>
            <tr>
                <th>President</th>
                <th>Year</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php

                foreach($presidentsArray as $president){
                    echo "<tr>";
                    foreach($president as $key => $value ){

                            echo '<td>' .  "$key: " . $value . '</td>';
                    }

                echo "</tr>";
                }

            ?>
        </tbody>

    </table>

<!-- //HW part 3. -->
    <table class="table table-striped table-bordered table-hover">
        <caption>
            <h1>Presidents</h1>
        </caption>
        <thead>
             <?php
                echo "<tr>";
                foreach($president as $key => $value ){

                        echo '<th>' . $key . '</th>';
                }
                echo "</tr>";
            ?>
        </thead>
        <tbody>
            <?php

                foreach($presidentsArray as $president){
                    echo "<tr>";
                    foreach($president as $key => $value ){

                            echo '<td>' . $value . '</td>';
                    }

                echo "</tr>";
                }

            ?>
        </tbody>
    </table>


    <?php

        $x = 5;
        if($x === 1){
    ?>
            <h2> x is 1</h2>
    <?php      } else if($x === 2){ ?>
                <h2> x is 2 </h2>
       <?php         }else{ ?>
                    <h2> x is not 1 or 2</h2>
          <?php
            }
         ?>
    <?php
         $x = 5;
        if(x === 1): ?>
            <h2> x is 1</h2>
           <?php elseif($x === 2): ?>
                <h2> x is 2 </h2>
              <?php  else: ?>
                    <h2> x is not 1 or 2</h2>
              <?php  endif ?>


    ?>
    <script src="/jquery-1.12.4.min.js"></script>

</body>
</html>