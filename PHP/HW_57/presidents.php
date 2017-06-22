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
        
//HW part 1.
        $trumpArray = [$trump, $trumpYears];
        $obamaArray = [$obama, $obamaYears];
        $bushArray = [$bush, $bushYears];

        $presidentsArray = [$trumpArray,$obamaArray,$bushArray];
    
//HW part 2.
        $trumpArray = ["President" => $trump, "Years" => $trumpYears];
        $obamaArray = ["President" => $obama, "Years" => $obamaYears];
        $bushArray = ["President" => $bush, "Years" => $bushYears];

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

    <script src="/jquery-1.12.4.min.js"></script>  

</body>
</html>