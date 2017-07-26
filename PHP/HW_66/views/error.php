<?php

include 'top.php'; ?>


<h2 class="alert alert-danger"> Something went wrong! </h2>

<?php if(!emtpy($error)):?>

<h3 class="alert alert-danger"><?= $errpr ?></h3>


<?php endif ?>
<?php include "bottom.php" ?>