<?php
    $name  = "";
    $years = "";
    $language = "";
    $delimiter = ", ";


    $languageArray = [

        "java",
        "PHP",
        "MySQL",
        "C#",
        "Ruby",
        "Rails",
        "VBA",
        "javascript"

    ];
   
    
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(! empty($_POST['name'])) {
             $name = $_POST['name'];   
        } else {
            $errors[] = "Name is a required field";
        }
         if( isset($_POST['years'])) {
            if(! is_numeric($_POST['years']) || $_POST['years'] < 0 || $_POST['years'] > 50) {
                $errors[] = "Years must be a number between 0 and 50";
            }else{
                 $years = $_POST['years'];
            }          
        } else {
            $errors[] = "Years is a required field";
            echo $_POST['years'];
        }
        if(! empty($_POST['language'])) {
            if( in_array($_POST['language'], $languageArray)){
                 $language = $_POST['language'];
            }
            else{
                $favLangArray = explode($delimiter, $_POST['language']);
                foreach($favLangArray as $lang){
               
                    if(in_array($lang, $languageArray)){
                        $language = $_POST['language'];
                    }else{
                        $errors[] = "$lang is not a valid programming language";
                        
                    }
                }
            }    
        } else {
            $errors[] = "Language is a required field";
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
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Choose your Language</h1>
        </div>

        <form class="form-horizontal" method="post">
            <?php if (isset($errors)) : ?>
            <div class="well text-danger">
                <ul>
                    <?php foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" xrequired
                        value="<?= $name ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="years" class="col-sm-2 control-label">Years</label>
                <div class="col-sm-10">
                    <input type="xnumber" min="0" step="1" max="50" class="form-control" id="years" name="years" placeholder="Years" xrequired
                        value="<?= $years ?>"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="language" class="col-sm-2 control-label">Language</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="language" name="language" placeholder="Language" xrequired
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
    <script src="../../../../jquery-1.12.4.min.js"></script>
    <script src="../../../../bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>