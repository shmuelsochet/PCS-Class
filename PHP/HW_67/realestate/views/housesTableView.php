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
                            <td><a href="houseDetailsController.php?houseId={$house['id']}"><img src= "<?= $house['picture'] ?>" alt="the house"/></a></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-offset-sm-3 col-sm-4">
                <?php if($offset - 4 >= 0) : ?>
                <a href="<?= getLink(['action'=>'table','offset' => $offset - 4])?>" class="btn btn-default">Previous</a>
                <?php else : ?>
                <a href="" class="btn btn-default disabled">First Page</a>
                <?php endif ?>

                <?php if($offset + 4 > $housesCount[0]) : ?>
                <a href="" class="btn btn-default disabled">Last Page</a>
                <?php else : ?>
                <a href="<?= getLink(['action'=>'table','offset' => $offset + 4])?>" class="btn btn-default">Next</a>
                <?php endif ?>
            </div>
        </div>
    </div>


<?php
include 'bottom.php';
?>