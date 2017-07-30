<?php
    include 'utils/db.php';

    try{
        $query = "SELECT category FROM books GROUP BY category";
        $results = $db -> query($query);
        $categories = $results ->fetchAll(PDO::FETCH_COLUMN);
        $results -> closeCursor();

    }catch(PDOException $ex){
       $errors[] = "Something went wrong" . $ex ->getMessage();
    }

?>