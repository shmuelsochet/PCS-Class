<?php include "utils/link.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PCS Realtors</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
        }
        <?php if (!empty($styles)) echo $styles ?>

    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?action=home">PCS</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?= getLink(['action'=>'home']) ?>">Home</a></li>
                    <!--li><a href="index.php?action=table<?php if(!empty($zip)) echo "&zip=$zip" ?><?php if(!empty($min)) echo "&min=$min" ?><?php if(!empty($max)) echo "&max=$max" ?>">Table</a></li-->
                    <li><a href="<?= getLink(['action'=>'table']) ?>">Table</a></li>
                    <li><a href="<?= getLink(['action'=>'add']) ?>">Add</a></li>
                    <li><a href="<?= getLink(['action'=>'delete']) ?>">Delete</a></li>
                    <li><a href="<?= getLink(['action'=>'update']) ?>">Edit</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>PCS Realtors</h1>
            <h2>Best houses in Jackson and Toms River</h2>  
        </div>
    </div>
    <div class="container-fluid">