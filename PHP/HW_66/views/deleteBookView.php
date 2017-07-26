
    
            <h1>Delete a Book</h1>
            <ul class="list-unstyled list-inline">
                <li><h2><a class="btn btn-primary" href="index.php">Book Store</a></h2></li>
            </ul>
        </div>

    </div>

        <div class="container">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors as $error) echo "<li>$error</li>" ?>
                    </ul>
                </div>
            <?php endif ?>
                
        </div>

        <div class="container">

            <form class="form-horizontal" action="" method="post" >
                <div class="form-group">
                    <div class="row">
                        <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Book</label>
                        <div class="col-sm-3">
                            <select class="form-control " name="book" >
                                
                                <?= $allBookNames ?>
                                
                            </select>
                        </div>
                    </div>
                </div>

                 <?php if(!empty($_POST['book']) ) : ?>

                <div class="form-group">
                    <div class="row">
            
                        <label class="col-sm-offset-2 col-sm-2 control-label">You Deleted</label>
                        <div class="col-sm-3 well text-center"><?= "Id: " . $book ?> </div> 
                    </div>
                </div>

            <?php endif ?>
    
                </div>
                        
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-offset-4 col-sm-8">
                                                     
                           <button type="submit" class="btn btn-danger">Delete</button> 
                        
                        </div>    
                                                                                                    
                    </div>
                </div>
               
            </form>
    
        </div>
<?php include "bottom.php" ?>