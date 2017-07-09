<?php
    $month = 0;
    $millenium = 0;
    $century = 0;
    $decade = 0;
    $year = 0;

     $months = [

            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
            
        ];
    
    if(! empty($_POST['month'])) {
    
        if(! in_array($_POST['month'], $months)) {
            
            $month = $_POST['month'];
            $errors[] = "$month is not a valid month";
             
            
        }else{
            $month = $_POST['month'];
        }
        
    }else {
        $errors[] = "Month is a required field";
        
    }

    if( isset($_POST['millenium'])) {
        if(! is_numeric($_POST['millenium']) || $_POST['millenium'] < 0 || $_POST['millenium'] > 9) {
  
            $errors[] = "Millenium must be a number greater than -1 and less than 9";
            
        }
        $year = $_POST['millenium'];
    } else {
        $errors[] ="Millenium is a required field";
    }

    if( isset($_POST['century'])) {
        if(! is_numeric($_POST['century']) || $_POST['century'] < 0 || $_POST['century'] > 9) {
  
            $errors[] = "Century must be a number greater than -1 and less than 9";
            
        }
        $year = $_POST['century'];
    } else {
        $errors[] ="Century is a required field";
    }

    if( isset($_POST['decade'])) {
        if(! is_numeric($_POST['decade']) || $_POST['decade'] < 0 || $_POST['decade'] > 9) {
  
            $errors[] = "Decade must be a number greater than -1 and less than 9";
            
        }
        $year = $_POST['decade'];
    } else {
        $errors[] ="Decade is a required field";
    }

    if( isset($_POST['year'])) {
        if(! is_numeric($_POST['year']) || $_POST['year'] < 0 || $_POST['year'] > 9) {
  
            $errors[] = "Year must be a number greater than -1 and less than 9";
            
        }
        $year = $_POST['year'];
    } else {
        $errors[] ="Year is a required field";
    }
        
    $month = $_POST['month'];
    $millenium = $_POST['millenium'];
    $century = $_POST['century'];
    $decade = $_POST['decade'];
    $year = $_POST['year'];

    function isLeapYear($millenium, $century, $decade, $year){
        $fullYear = $millenium . $century . $decade . $year;

        $intFullYear = (int) $fullYear;
        if(($intFullYear % 4 === 0 && $intFullYear % 100 !== 0) || $intFullYear % 400 === 0 ){
            $answer = true;
            
        }
        else{
            $answer = false;
             

        }
        return $answer;
    }

    function getMonthDays($month){
        
        $month = $_POST['month'];
        $millenium = $_POST['millenium'];
        $century = $_POST['century'];
        $decade = $_POST['decade'];
        $year = $_POST['year'];
        
        $monthDays = [

            "January" => 31,
            "February" => 28,
            "March" => 31,
            "April" => 30,
            "May" => 31,
            "June" => 30,
            "July" => 31,
            "August" => 31,
            "September" => 30,
            "October" => 31,
            "November" => 30,
            "December" => 31

        ];
        foreach($monthDays as $key => $days){
             if($key === $month){
                if(($key === "February" && (isLeapYear($millenium, $century, $decade, $year) === true)) ){
                    $days = 29;
                
            }
            return $days;
            
            }
        }
    }
    //echo getMonthDays("January");
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>PCS Interest Calculator</h1>
            <h2>Results</h2>
        </div>

        <div class="container">
        <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error) echo "<li>$error</li>" ?>
            </ul>
            <?php endif ?>
        </div>

        <div>
            <div>
                <div class="well col-sm-2 text-right">Month</div>
                <div class="col-sm-4 well text-center"><?= $month ?></div>
            </div>
            <div>
                <div class="well col-sm-1 text-right">Year</div>
                <div class="col-sm-1 well text-center"><?= $millenium ?></div>
                <div class="col-sm-1 well text-center"><?= $century ?></div>
                <div class="col-sm-1 well text-center"><?= $decade ?></div>
                <div class="col-sm-1 well text-center"><?= $year ?></div>
            </div>
            <div>
                <div class="well col-sm-2 text-right">How Many Days</div>
                <div class="col-sm-4 well"><?= getMonthDays($month)  ?></div>
            </div>
        </div>

    </div>
    
</body>

</html>