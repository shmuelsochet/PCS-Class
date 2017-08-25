<?php
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
                            <?= getTd(number_format($house->getPrice(), 2), $house->getId()) ?>
                            <?= getTd($house->getAddress(), $house->getId()) ?>
                            <?= getTd($house->getCity(), $house->getId()) ?>
                            <?= getTd($house->getState(), $house->getId()) ?>
                            <?= getTd($house->getZip(), $house->getId()) ?>
                            <td><a href= <?= "index.php?action=details&houseId={$house->getId()}" ?>><img src= "<?= $house->getPicture() ?>" alt="the house"/></a></td>
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