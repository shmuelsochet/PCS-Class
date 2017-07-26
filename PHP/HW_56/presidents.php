<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../bootstrap-3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <!--<p> 
        Create a php page that uses echo or to print out "Donald Trump" and "2017".
        Same as #1 but this time first store "Donald Trump" and "2017" in variables, and then print out the values of the variables.
        Same as #2 but this time make it so the returned page is valid html with the presidential text in the body.
        Same as #3 but this time put the name and year in a table.
        Same as #4 but this time include the previous 2 presidents in addition to the Donald.
        Same as #5 but this time style the table using bootstrap.
    </p>-->
    <!--<?= "Donald Trump";?>
    <?=2017;?>-->
    
    <?php
    // keep as much php out of html as possible, this is good practice
        $name = "Donald Trump";
        $name2 = "Barack Obama";
        $name3 = "George W Bush";
        $year = "2017-Current";
        $year2 = "2009-2016";
        $year3 = "2000-2008";
        // echo $name;
        // echo $year;
        // echo $name.$year;
    ?>
    <table class="table table-striped table-bordered table-hover">
        <caption>
            The Donald
        </caption>
        <thead>
            <tr>
                <th>President</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $name; ?></td>
                <td ><?=  $year; ?></td>
            </tr>
       
            <tr>
                <td><?php echo $name2; ?></td>
                <td ><?=  $year2; ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td><?php echo $name3; ?></td>
                <td ><?=  $year3; ?></td>
            </tr>
        </tfoot>
    </table> 

    <script src="../../../bootstrap-3.3.7/jquery/1.12.4/jquery.min.js"></script>  

</body>
</html>