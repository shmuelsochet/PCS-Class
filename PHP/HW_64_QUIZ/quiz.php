 <?php
    
    $cs = "mysql:host=localhost;dbname=php";
    $user = "test";
    $password = 'test';
    try {

        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);  

        if($_SERVER["REQUEST_METHOD"] === "POST"){
                if(isset($_POST['delete'])){
                $theName =  $_POST['delete'];
                $query3 = "DELETE FROM students WHERE name = :theName";
                $statement3 = $db->prepare($query3);
                $statement3->bindValue('theName', $theName);
                $statement3->execute();
                $statement3->closeCursor();
            }else{
                $error = "You must have something to delete when submitting.";
            }
        }


        
        $query = "SELECT DISTINCT e1.name AS name, e1.grade AS grade1, e2.grade AS grade2 
                    FROM students e1
                    JOIN students e2 
                    ON e1.name = e2.name
                    WHERE e1.grade <> e2.grade 
                    GROUP BY name"; // you need e1.id = e2.id in case a student has 2 of the same grades
        //$theGrade = "grade1";
        //$theGrade2 = "grade2";
        $statement = $db->prepare($query); 
        $statement->bindValue(1, "e1.grade");
        $statement->bindValue(2, "e2.grade");
        $statement->execute();
        $students = $statement->fetchAll();

       // print_r($students);
        $statement->closeCursor();

        //couldn't figure out how to do it with double foreach and using the name to get the grade
        //$theName = $student['name'];
        // $query2 = "SELECT grade FROM students WHERE name = :theName";  
        // $statement2 = $db->prepare($query2);
        // $statement2->bindValue('theName', $theName);
        // $statement2->execute();
        // $studentGrades = $statement2->fetchAll();
        // $statement2->closeCursor();
        
        
         
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
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student) :?>
                <tr>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['grade1'] ?></td>

                    <!-- <?php print_r($student['grade1']); ?> -->
                    <td><?= $student['grade2'] ?></td>
                    <!-- <?php print_r($student['grade2']); ?> -->
                   
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete" class="btn btn-danger" value="<?= $student['name'] ?>" ></input>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
    
                    </td>
                    
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
   
</body>

</html>

