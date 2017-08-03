<?php
    //we don't really need this because it's in top, but to prevent error we can include once
    include_once 'utils/link.php';
    if(empty($offset)){
        $offset = 0;
    }
?>

<div class="row">
                
    <div class="col-sm-1">
        <?php if($offset - 4 >= 0) : ?>
        <a href="<?= getLink(['offset' => $offset - 4])?>" class="btn btn-default">Previous</a>
        <?php else : ?>
        <a  class="btn btn-default disabled">First Page</a>
        <?php endif ?>
    </div>

    <div class="col-sm-1 col-sm-offset-10">
        <?php if($offset + 4 > $housesCount[0] - 1) : ?>
        <a href="" class="btn btn-default disabled">Last Page</a>
        <?php else : ?>
        <a href="<?= getLink(['offset' => $offset + 4])?>" class="btn btn-default">Next</a>
        <?php endif ?>
        
    </div>
</div>


