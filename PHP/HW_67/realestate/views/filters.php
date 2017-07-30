<div class="col-sm-3">
    <div class="well">Filters</div>
    <form action="index.php">
        <div class="well">
            <div class="form-group">
                <label for="zip">Zip</label>
                <input class="form-control" id="zip" name="zip"
                <?php if (!empty($zip)) echo "value=\"$zip\"" ?>
                />
            </div>
        </div>

        <div class="well">
            <div class="form-group">
                <label for="min">Min</label>
                <input class="form-control" id="min" name="min"
                <?php if (!empty($min)) echo "value=\"$min\"" ?>
                />
            </div>
            <div class="form-group">
                <label for="max">Max</label>
                <input class="form-control" id="max" name="max"
                <?php if (!empty($max)) echo "value=\"$max\"" ?>
                />
            </div>
        </div>
        <input type="hidden" name="action" value="<?= $action ?>">
        <input type="submit" value="filter"/>
    </form>
</div>