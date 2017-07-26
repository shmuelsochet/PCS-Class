<?php
    $name  = "";
    $years = "";
    $language = "";
    $delimiter = ",";
    $errorFields = [""];


    $languageArray = [

        "JAVA",
        "PHP",
        "MYSQL",
        "C#",
        "RUBY",
        "RAILS",
        "VBA",
        "JAVASCRIPT",
        "PYTHON",
        "HTML",
        "CSS",
        "SQL"


    ];
   
    //for a get request you can say if the variables exist (empty or isset)
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(! empty($_POST['name'])) {
             $name = $_POST['name'];   
        } else {
            //associative array to catch an error and show the label or input red
           // $errors['name'] = "Name is a required field";
           $errors[] = "Name is a required field";
           $errorFields["name"] = true;

        }
         if( isset($_POST['years'])) {
            if(! is_numeric($_POST['years']) || $_POST['years'] < 0 || $_POST['years'] > 50) {
                
                //$errors['years'] = "Years must be a number between 0 and 50";
                $errors[] = "Years must be a number between 0 and 50";
                $errorFields["years"] = true;
                
                //set it so you also see the incorrect value
                 $years = $_POST['years'];
            }else{
                 $years = $_POST['years'];
            }          
        } else {
            //same key as above but both errors can't exist so we're safe
            //$errors['years'] = "Years is a required field";
            $errors[] = "Years is a required field";
            $errorFields["years"] = true;
            echo $_POST['years'];
        }
        if(! empty($_POST['language'])) {
            if( in_array($_POST['language'], $languageArray)){
                 $language = $_POST['language'];
            }
            else{
                $favLangArray = explode($delimiter, trim($_POST['language']));
                foreach($favLangArray as $lang){
               
                    if(in_array(trim(strtoupper($lang)), $languageArray)){
                        $language = $_POST['language'];
                    }else{
                        //$errors['language'] = "$lang is not a valid programming language";
                        $errors[] = "$lang is not a valid programming language";
                        $errorFields["language"] = true;
                        
                        //set it so you also see the incorrect value
                        $language = $_POST['language'];
                        
                    }
                }
            }

                //SL wrote it this way to check for correct language
            //     for($i = 0; $i < count($languageArray); $i++){
            //         if(trim(strtoupper($_POST['language'])) === $languageArray[$i]){
            //             break;
            //         }
            //     }
            //     if($i < count($languageArray)){
            //         $language = trim(strtoupper($_POST['language']));
            //     }else{
            //         $errors[] = "{$_POST['language']} is not a valid programming language";
            //     }
            // }    
        } else {
            //$errors['language'] = "Language is a required field";
            $errors[] = "$lang is not a valid programming language";
            $errorFields["language"] = true;
        }
       
        // if(empty($errors)) {
            
            
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="../../../../bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
        /*this is the id for errors and it only shows up as class name with php if stmt*/
        .error{
            color:red;
        }
        .error::before{
            content: "*";
        }
        .error input{
            border-color:red;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Choose your Favorite Language</h1>
        </div>

        <div class="container">
            <?php if (isset($errors)) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <?php endif ?>
        </div>

        <form class="form-horizontal" method="post">
           
            <div class="form-group 
            <?php if(array_key_exists("name", $errorFields)) echo "error" ?>
            ">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" xrequired
                        value="<?= $name ?>"
                    >
                </div>
            </div>
            <div class="form-group 
            <?php if(array_key_exists("years", $errorFields)) echo "error" ?>
            ">
                <label for="years" class="col-sm-2 control-label">Years</label>
                <div class="col-sm-8">
                    <input type="xnumber" min="0" step="1" max="50" class="form-control" id="years" name="years" placeholder="Years" required
                        value="<?= $years ?>"
                    >
                </div>
            </div>
            <div class="form-group
            <?php if(array_key_exists("language", $errorFields)) echo "error" ?>
            ">
                <label for="language" class="col-sm-2 control-label">Language</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="language" name="language" placeholder="Favorite Languages(comma delimited)" required
                        value="<?= $language ?>"
                    >
                </div>
            </div>
            
            <?php if (empty($errors) && $_SERVER['REQUEST_METHOD'] === "POST") : ?>
            <div>
                <div class="well col-sm-2 text-right"></div>
                <div class="col-sm-10 well">Thanks of Submiting your Favorite Language! <?= $language ?></div>
            </div>
            <?php endif ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
    <script src="../../../bootstrap-3.3.7/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../../../bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>