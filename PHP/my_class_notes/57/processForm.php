<?php

#print_r($_SERVER);
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $name = $_GET['name'];
    $age = $_GET['age'];
    $email = $_GET['email'];
}else{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
}


echo "Hello $name who is $age years old. I will sent your email to $email";

?>
<h1>You Submitted</h1>
<h1>GET</h1>
<?php 
   
    print_r($_GET);

?>
<h1>POST</h1>
<?php 

    print_r($_POST);

?>