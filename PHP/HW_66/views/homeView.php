

            <h1>Book Store</h1>
            <ul class="list-unstyled list-inline">
                <li><h2><a class="btn btn-success" href="index.php?action=addBook">Add a Book</a></h2></li>
                <li><h2><a class="btn btn-danger" href="index.php?action=deleteBook">Delete a Book</a></h2></li>
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

            <div class="row">
                <!-- //<?php include 'filters.php' ?> -->
                <?php include 'views/categorySelectionView.php'; ?>
                
                <div class="col-sm-9">          
                    <form class="form-horizontal" action="" method="get" >
                        <div class="form-group">
                        
                            <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Book</label>
                            <div class="col-sm-3">
                                <select class="form-control " name="book" >
                                    
                                        <?= $allBookNames ?>
                                    
                                </select>
                            </div>
                            
                        </div>

                    <?php if(!empty($_GET['book'])) : ?>

                        <div class="form-group">
                    
                                <label for="book" class="col-sm-offset-2 col-sm-2 control-label">Price</label>
                                <div class="col-sm-3 well text-center">$<?= $allBookPrices ?></div>
                            
                        </div>

                    <?php endif ?>
            
                        
                                
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8">
                                
                                    <button  type="submit" class="btn btn-primary">Price</button>
                                
                                </div>                                     
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                
        </div>


<?php include "bottom.php" ?>