<?php
    // this didn't work bec. name needs a diff name for each value
    // function getTd($value) {
        
    //    if(is_numeric($value)){
    //        $type = "number";
    //    }else{
    //        $type = "text";
    //    }
        
    //     $it = "<td><input type=$type name=\"price\" value= $value class=\"col-sm-3 form-control\" id=\"price\"></td>";
    //     return $it;
    // }

    $styles = "
        .house img {
            width: 131.24px;
            height: 98px;
        }

        input + button, input + input {
            margin: 15px 0 15px;
        }
    ";
    include 'top.php';
?>
    <div class="container">
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors as $error) echo "<li>$error</li>" ?>
                </ul>
            </div>
        <?php endif ?>
                    
    </div>
    
    <div class="row">

    
        <?php include 'filters.php' ?>

        

            <div class="col-sm-10">
                <?php include 'pager.php' ?>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <div class="row">
                            <th class="col-sm-2">Price</th>
                            <th class="col-sm-3">Address</th>
                            <th class="col-sm-2">City</th>
                            <th class="col-sm-1">State</th>
                            <th class="col-sm-2">Zip</th>
                            <th class="col-sm-2">Picture</th>
                            <th class="col-sm-2"></th>
                            <th class="col-sm-2">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($houses as $house) :?>
                        <tr class="house">
                            <form class="form-horizontal" action="" method="post" >
                                <div class="form-group">
                                        <td><input type="number" name="price" value="<?= $house['price'] ?>" class="form-control" id="price" ></td>
                                        <td><input type="text" name="address" value="<?= $house['address'] ?>" class="form-control" id="address" ></td>
                                        <td>
                                            <input type="text" name="city" value="<?= $house['city'] ?>" class="form-control" id="city" >
                                            <input type="hidden" name="id" value="<?= $house['id'] ?>" class="form-control" id="id" >
                                            <button type="submit" class="btn btn-success col-sm-offset-3">Edit</button>
                                        </td>
                                        <td><input type="text" name="state" value="<?= $house['state'] ?>" class="form-control" id="state" ></td>
                                        <td><input type="number" name="zip" value="<?= $house['zip'] ?>" class="form-control" id="zip" ></td>
                                        <td>
                                            <input type="file" name="pictureFile" class="form-control" id="pictureFile" >
                                            <input type="url" name="pictureURL" <?php if(substr($house['picture'],0,6) === "https:") echo "value=  {$house['picture']}"  ?> class="form-control" id="pictureURL" placeholder="Picture (URL)" />
                                        </td>
                                        <td>
                                            <a href= <?= "index.php?action=details&houseId={$house['id']}" ?>><img src= "<?= $house['picture'] ?>" alt="the house"/></a>
                                        </td>
                                        <td><input type="text" name="notes" value="<?= $house['notes'] ?>" class="form-control" id="notes" ></td>
                                        
                                    </div>
                            </form>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php include 'pager.php' ?>
            </div>     
        </div>    
    </div>
    
<?php
include 'bottom.php';
?>