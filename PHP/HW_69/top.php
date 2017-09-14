<?php
    spl_autoload_register(function($className){

        echo "Looking for $className . Requiring " . lcfirst($className) . '.php<br>';
        require lcfirst($className) . '.php';
});
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PCS Zoo</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="jumbotron">
        <div class="container text-center">
            <h1>Zoo</h1>
            <h2>Have Fun at the Zoo!</h2>  
        </div>
    </div>
    <div class="container">