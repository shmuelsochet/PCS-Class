<?php 
    if(empty($color)){
        $color = "black";
    }
    if(empty($font)){
        $font = "arial";
    }

    $myUrl = "";

    if(!empty($color))

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../../../bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            color: <?= $color ?>;
            font-family: <?= $font ?>;
        }

    </style>
</head>

<body>
     <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container"> 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#links" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="page1.php">PCS</a>
                </div>
                <div class="collapse navbar-collapse" id="links" >
                    <ul class="nav navbar-nav">
                        <li><a    href="page1.php?color=" <?= $color ?> >Page 1</a></li>
                        <li><a    href="page2.php">Page 2</a></li>
                        <li><a   href="page3.php">Page 3</a></li>
                        
                    </ul>
                </div>      
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Choose Font and Color</h1>
        </div>