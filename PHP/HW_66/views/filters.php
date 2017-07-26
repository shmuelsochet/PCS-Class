<div class="col-sm-3">
    <div class="well">Filters</div>
    <form action="index.php">
        <div class="well">
            <div class="form-group">
                <label for="category">Category</label>
                <input class="form-control" id="category" name="category"
                <?php if (!empty($category)) echo "value=\" $category \"" ?>
                />
            </div>
        </div>
        <input type="hidden" name="action" value="<?= $action ?>">
        <input class="btn" type="submit" value="Filter"/>
    </form>
</div>