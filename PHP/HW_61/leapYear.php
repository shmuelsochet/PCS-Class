<?php
    function months(){
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
        $allMonths = "";
        foreach($months as  $month){
        
        $allMonths .= "<option>$month</option>";
        
        }
        return $allMonths;
    }

    // function years(){
    //     for($year = 1800; $year < 3000; $year++){
    //         echo "<option>$year</option>";
    //     }
    // }
    function years(){
        $allYears = "";
        for($i = 0; $i < 10; $i++){
            $allYears .= "<option>$i</option>";
            
        }       
    return $allYears;
    }
     
?>
              
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../bootstrap-3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Leap Year</h1>
        </div>
        <form class="form-horizontal" action="result.php" method="post" >
            <div class="form-group">
                <label for="month" class="col-sm-offset-2 col-sm-2 control-label">Month</label>
                <div class="col-sm-4">
                    <select class="form-control " name="month" >
                        
                            <?= months(); ?>
                        
                    </select>
                </div>
            </div>
                   
            <div class="form-group">
                <label for="year" class="col-sm-offset-2 col-sm-2 control-label">Year</label>
                <div class="col-sm-1">
                    <select class="form-control " name="millenium" >
                        
                            <?= years(); ?>
                        
                    </select>
                </div>           
                
                <div class="col-sm-1">
                    <select class="form-control " name="century" >
                        
                            <?= years(); ?>
                        
                    </select>
                </div>
                        
                <div class="col-sm-1">
                    <select class="form-control " name="decade" >
                        
                            <?= years(); ?>
                        
                    </select>
                </div>
                       
                <div class="col-sm-1">
                    <select class="form-control " name="year" >
                        
                            <?= years(); ?>
                        
                    </select>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-primary">Leap Year</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>