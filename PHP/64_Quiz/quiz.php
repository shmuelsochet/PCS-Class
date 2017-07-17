<?php

    //table names and grades id every test new same name and new grade
    //write php file that fetches all students and grades and allows user to pick a student and delete
    //display each student and their grades and all have same numbers show in table
    //then let delete and all grades should go away. 
    //show stuff and delete. one name and one grade


    
    $cs = "mysql:host=localhost;dbname=php";
    $user = "test";
    $password = 'test';
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        
        
        
        $query = "SELECT DISTINCT name FROM students";
        $statement = $db->prepare($query);
        $statement->execute();
        $students = $statement->fetchAll();
        $statement->closeCursor();

        $query2 = "SELECT grade FROM students WHERE name = :theName";
        
        $theName = $student['name'];
        $statement2 = $db->prepare($query2);
        $statement2->bindValue('theName', $theName);
        $statement2->execute();
        $studentGrades = $statement2->fetchAll();
        $statement2->closeCursor();
    
        if(isset($_POST['delete'])){
            $theName =  $_POST['delete'];
            $query3 = "DELETE FROM students WHERE name = :theName";
            $statement3 = $db->prepare($query3);
            $statement3->bindValue('theName', $theName);
            $statement3->execute();
            $statement3->closeCursor();
        }
       
        
       
        

    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Grades</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>PCS Student Grades</h1>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Grade 1</th>
                    <th>Grade 2</th>
                    <th>Grade 3</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student) :?>
                <tr>
                    <td><?= $student['name'] ?></td>
                
                <?php foreach($studentGrades as $grade) : ?>
                    <td><?= $grade['grade'] ?></td>
                    <td><?= $grade['grade'] ?></td>
                    <?php endforeach ?>
                   

                    <td>
                        <form method="post">
                            <input type="hidden" name="delete" class="btn btn-danger" value="<?= $student['name'] ?>" ></input>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
    
                    </td>
    
 
            
                   
                </div>
                    
                </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>
    </div>
            

        <?php if(!empty($error)) : ?>
            <h2 class="text-center alert alert-danger">
                <?= $error ?>
            </h2>
        <?php endif ?>
    </div>
</body>

</html>

