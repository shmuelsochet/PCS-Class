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
?>
    <?php if (!empty($house)) : ?>
        <div class="row">
            <div class="text-center"><img src="<?= $house['picture'] ?>" alt="picture of the house"/></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Address</div><div class="well col-sm-8"><?= $house['address'] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">City</div><div class="well col-sm-8"><?= $house['city'] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">State</div><div class="well col-sm-8"><?= $house['state'] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Zip</div><div class="well col-sm-8"><?= $house['zip'] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Price</div><div class="well col-sm-8"><?= $house['price'] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Notes</div><div class="well col-sm-8"><?= $house['notes'] ?></div>
        </div>
    <?php endif ?>
<?php
include 'bottom.php';
?>