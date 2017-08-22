<?php
    //show details of house deleted by using more than just id, hidden inputs to catch values of address, price... 

    function getTd($value, $houseId) {
        
        $it = "<td><a href=\"index.php?action=details&houseId=$houseId\">$value</a></td>";
        return $it;
    }

    $styles = "
        .house img {
            width: 131.24px;
            height: 98px;
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
    <div class="container">
            <?php if (!empty($id)) : ?>
                <div class="alert alert-danger">
                    <!-- <ul> -->
                        <!-- <?php echo "<li> put values here</li>" ?> -->
                        <?php echo "<p class=\"text-center\">You deleted the house id number $id!</p>" ?>
                    <!-- </ul> -->
                </div>
            <?php endif ?>
                        
    </div>
    <div class="row">
        <?php include 'filters.php' ?>

            <div class="col-sm-9">
                <?php include 'pager.php' ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Price</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Picture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($houses as $house) :?>
                        <tr class="house">
                            <?= getTd(number_format($house['price'], 2), $house['id']) ?>
                            <?= getTd($house['address'], $house['id']) ?>
                            <?= getTd($house['city'], $house['id']) ?>
                            <?= getTd($house['state'], $house['id']) ?>
                            <?= getTd($house['zip'], $house['id']) ?>
                            <td><a href= <?= "index.php?action=details&houseId={$house['id']}" ?>><img src= "<?= $house['picture'] ?>" alt="the house"/></a></td>
                            <td>
                                <form method="post">
                                    <button type="submit" name="delete" value="<?= $house['id'] ?>" class="btn btn-danger col-sm-offset-3">Delete</button>
                                </form>
                            </td>
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