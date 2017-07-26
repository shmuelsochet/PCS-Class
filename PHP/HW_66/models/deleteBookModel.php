<?php
    
        
        include 'utils/db.php';

        try{
            


            $query = "SELECT id, name FROM books";
            $statement = $db ->prepare($query);
            $statement -> execute();
            $bookNames = $statement ->fetchAll();
            $statement ->closeCursor();

            if(isset($theId)) {
               
                    $query = "DELETE FROM books WHERE id = :theId";
                    $statement = $db ->prepare($query);
                    $statement -> bindValue('theId', $theId);
                    $statement -> execute();
                    $statement ->closeCursor(); 
                    
                    $isInArray = false;
                    
                    foreach($bookNames as $myBook){
                
                        if( in_array($_POST['book'], $myBook)){    
                            
                            $isInArray = true;
                        }
                
                    }
                    if(! $isInArray){
                        $errors[] = "{$_POST['book']} is not a valid or available book";
                    }
                    $book = $_POST['book'];         
 
                
            }
            
            $allBookNames = "";
            foreach($bookNames as $bookName ){
                $selected = "";
                if(!empty($_POST['book']) && $bookName['id'] === $_POST['book'] ){
                    $selected = "selected";
                }
                $allBookNames .= "<option value={$bookName['id']} $selected >{$bookName['name']}</option>";
            }
               
  

        }catch(PDOException $ex){
                die("Something went wrong" . $ex ->getMessage());
            }
    

    include "views/top.php"
?>