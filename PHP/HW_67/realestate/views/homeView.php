<?php
    //include 'housesModel.php';
    $styles = "
        .house img {
            width: 206px;
            height: 150px;
        }

        .cheap {
            color: red;
        }

        .cheap::before {
            content: \"ONLY \";
        }

        .cheap::after {
            content: \" !!\"
        }
    ";
    include 'top.php';
?>
    <div class="row">
        <?php include 'filters.php' ?>

        <div class="col-sm-9">
            <?php foreach($houses as $house) :?>
                <a href="index.php?action=details&houseId=<?= $house['id'] ?>">
                    <div class="col-md-3 col-sm-4 house">
                        <figure>
                            <img src="<?= $house['picture'] ?>" alt="picture of the house"/>
                        </figure>
                        <figcaption class="text-center">
                            <h3 
                                <?php if($house['price'] < 1500000) echo "class=\"cheap\""?>
                            ><?= number_format($house['price'], 2) ?></h3>
                            <h4><?= $house['address'] ?></h4>
                            <h5><?= "{$house['city']}, {$house['state']} {$house['zip']}"?></h5>
                        </figcaption>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-offset-sm-3 col-sm-4">
                <?php if($offset - 4 >= 0) : ?>
                <a href="<?= getLink(['action'=>'home','offset' => $offset - 4])?>" class="btn btn-default">Previous</a>
                <?php else : ?>
                <a  class="btn btn-default disabled">First Page</a>
                <?php endif ?>

                <?php if($offset + 4 > $housesCount[0]) : ?>
                <a href="" class="btn btn-default disabled">Last Page</a>
                <?php else : ?>
                <a href="<?= getLink(['action'=>'home','offset' => $offset + 4])?>" class="btn btn-default">Next</a>
                <?php endif ?>
                
            </div>
        </div>
    </div>
<?php
include 'bottom.php';
?>