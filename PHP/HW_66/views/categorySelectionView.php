<?php
    

?>
<div class="col-sm-3">
    <div class="well">Filters</div>
        <form>
            <?php foreach($categories as $category) : ?>
            <div class="checkbox">
                <input  type="checkbox" name="category[]" value="<?=$category ?>"
                    <?php if(in_array($category, $categoryFilter)) echo 'checked' ?>
                /><?=$category ?>
            </div>
            <?php endforeach ?>
            <input class="btn" type="submit" value="Filter"/>
        </form>
    </div>
</div>