
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">Welcome to PCS!</h1>
        </div>

        <form action="index.php?action=add" method="post">
            <div class="form-group">
                <label for="item">Example select</label>
                <select class="form-control" id="item" name="item">
                <option>Beer</option>
                <option>Wine</option>
                <option>Scotch</option>
                <option>Bourbon</option>
                <option>Cognac</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Example multiple select</label>
                <select class="form-control" id="quantity" name="quantity">
                <option>1</option>
                <option>2</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
                <a href="index.php?action=viewCart&clear=false" class="btn btn-primary">Cart</a>
            </div>
        
        </form>
      
    </div>

</body>
</html>