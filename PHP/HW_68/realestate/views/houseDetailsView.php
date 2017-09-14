<?php
    $styles = "
        img {
            width: 400px;
            height: 210px;
            margin-bottom: 8px;
        }

        .well:first-of-type {
            background: none;
            border: none;
            box-shadow: none;
        }
        
    ";
    include 'top.php';
    $false = "false";
    $true = "true";
?>
    <?php if (!empty($house)) : ?>
        <div class="row">
            <div class="text-center"><img src="<?= $house['picture'] ?>" alt="picture of the house"/></div>
            
        </div>
        <form class="form-horizontal" action="" method="post" >
            <div class="row">
            
                <?php if($editPage==="false")  : ?>

                <div class="well col-sm-2 text-right">Address</div><div class="well col-sm-8"><?= $house['address'] ?></div>
                
                <?php else :?>   
                <div class="well col-sm-2 text-right">Address</div>
                <div class="well col-sm-8">
                    <input type="text" name="address" class="form-control" value="<?= $house['address'] ?>"></input>
                </div>
            
                <?php endif ?>
            </div>
            <div class="row">
                <?php if($editPage==="false"):?>
                <div class="well col-sm-2 text-right">City</div><div class="well col-sm-8"><?= $house['city'] ?></div>
                <?php else :?>   
                <div class="well col-sm-2 text-right">City</div>
                <div class="well col-sm-8">
                    <input type="text" name="city" class="form-control" value="<?= $house['city'] ?>"></input>
                </div>
            
                <?php endif ?>
            </div>
            <div class="row">
                <?php if($editPage==="false"):?>
                <div class="well col-sm-2 text-right">State</div><div class="well col-sm-8"><?= $house['state'] ?></div>
                <?php else :?>   
                <div class="well col-sm-2 text-right">State</div>
                <div class="well col-sm-8">
                    <input type="text" name="state" class="form-control" value="<?= $house['state'] ?>"></input>
                </div>
            
                <?php endif ?>
            </div>
            <div class="row">
                <?php if($editPage==="false"):?>
                <div class="well col-sm-2 text-right">Zip</div><div class="well col-sm-8"><?= $house['zip'] ?></div>
                <?php else :?>   
                <div class="well col-sm-2 text-right">Zip</div>
                <div class="well col-sm-8">
                    <input type="text" name="zip" class="form-control" value="<?= $house['zip'] ?>"></input>
                </div>
            
                <?php endif ?>
            </div>
            <div class="row">
                <?php if($editPage==="false"):?>
                <div class="well col-sm-2 text-right">Price</div><div class="well col-sm-8"><?= $house['price'] ?></div>
                <?php else :?>   
                <div class="well col-sm-2 text-right">Price</div>
                <div class="well col-sm-8">
                    <input type="text" name="price" class="form-control" value="<?= $house['price'] ?>"></input>
                </div>
            
                <?php endif ?>
            </div>
            <div class="row">
                <?php if($editPage==="false"):?>
                <div class="well col-sm-2 text-right">Notes</div><div class="well col-sm-8"><?= $house['notes'] ?></div>
                <?php else :?>   
                <div class="well col-sm-2 text-right">Notes</div>
                <div class="well col-sm-8">
                    <input type="text" name="notes" class="form-control" value="<?= $house['notes'] ?>"></input>
                </div>
            
                <?php endif ?>
            </div>

            <div class="row">

                <ul class="list-unstyled list-inline text-center">
                    <?php if($editPage==="false"):?>
                    <li><button type="submit" name="edit" value=<?= $true ?> class="btn btn-primary btn-block">Edit</button></li>
                    <?php else : ?>
                    <li><button type="submit" name="edit" value=<?= $false ?> class="btn btn-success btn-block">Save</button></li>
                    <?php endif ?>
                    <li><button type="submit" name="edit" value=<?= $false ?> class="btn btn-primary btn-block">Details</button></li>
                   
                   
                    <li><a class="btn btn-danger btn-block" href= <?= "index.php?action=home&delete=$houseId"?>>Delete</a></li>
                    
                
                
                </ul>
                
            </div>
        </form>
    <?php endif ?>
<?php
include 'bottom.php';
?>