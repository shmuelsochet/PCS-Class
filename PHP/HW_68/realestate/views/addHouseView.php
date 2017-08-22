<?php

    //need to make sure picture is only chosen from correct folder. Done! Fix if same name but wrong directory. 
    //check for numeric. Done! 
    //Zip or State validation. Though there are Zips with letters (Canada) and states are also not exclusive to US. 

    $styles = "
    .house img {
        width: 206px;
        height: 150px;
    }"

?>
            <?php include "top.php" ?>
            <h1 class="text-center">Add House</h1>
        
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
                        <label for="house" class="col-sm-offset-3 col-sm-2 control-label">Price</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                            
                                <div class="input-group-addon">$</div>
                                <input type="number" name="price" class=" col-sm-3 form-control" id="price" placeholder="Price">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="address" class="col-sm-offset-3 col-sm-2 control-label">Address</label>  
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="city" class="col-sm-offset-3 col-sm-2 control-label">City</label>  
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="state" class="col-sm-offset-3 col-sm-2 control-label">State</label>  
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="state" id="state" placeholder="State">
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="zip" class="col-sm-offset-3 col-sm-2 control-label">Zip</label>  
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="zip" id="zip" placeholder="Zip">
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="pictureFile" class="col-sm-offset-3 col-sm-2 control-label">Picture(jpg)</label>  
                        <div class="col-sm-3">
                            <input type="file" class="form-control" name="pictureFile" id="pictureFile" accept="image/*">
   
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="pictureURL" class="col-sm-offset-3 col-sm-2 control-label">Picture(URL)</label>  
                        <div class="col-sm-3">
                            <input type="url" class="form-control" name="pictureURL" id="pictureURL" placeholder="Picture(URL)">
   
                        </div>                      
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="notes" class="col-sm-offset-3 col-sm-2 control-label">Notes</label>  
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="notes" id="notes" placeholder="Notes">
                        </div>                      
                    </div>
                </div>

            <?php if(!empty($price) && !empty($address) && !empty($city) && !empty($state) && !empty($zip) && !empty($picture) && isset($notes) ) : ?>

                <div class="form-group">
                    <div class="row">
            
                        <label class="col-sm-offset-3 col-sm-2 control-label">You Submitted</label>
                        <div class="col-sm-3 well text-center house">
                            <figure>
                                <img src= <?=$picture ?> alt="picture of the house"/></br>
                            </figure>
                            <figcaption>
                                <?= "Price: $" . $price . "</br>Address: " . $address . "</br>City: " . $city . "</br>State: " . $state . "</br>Zip: " . $zip ."</br>Notes: " . $notes  ?>
                            </figcaption>
                        </div>
                    </div>
                </div>

            <?php endif ?>
                         
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-offset-5 col-sm-8">
                            <button type="submit" class="btn btn-primary">Add house</button>
                        </div>
                    </div>
                </div>
            </form>
<?php include "bottom.php" ?>