<?php
    $first = "Donald";
    $last = "Trump";

    //single quotes write out the variable name eg $first, double quotes print
    //out the variable itself, you can use curly braces as well
    echo $first. " " . $last;
    echo 'The name is $first $last<br/>';
    echo "The name is $first $last<br/>";

    // this won't work bec double quotes echo "<a href ="https:\\www.google.com">Google</a>"
    echo '<a href ="https:\\www.google.com">Google</a><br/>';
    //or you can escape the double quotes for php with the backslash
    echo "<a href=\"https:\\www.google.com\">Google</a><br/>";

    //comma for more arguments for echo
    echo $first, ' ', $last, '<br/>';

    $fullName = $first . $last;
    echo "$fullName<br/>";

    //you can .= to save the concatenation
    $fullName = $first;
    $fullName .= " ";
    $fullName .= $last;
    echo "$fullName<br/>";

    $one = "1";
    $real1 = 1;
    $isTrue = true;

    echo $one + 1 . "<br/>";

    //this is a bad thing that php converts that it's equal
    if($one == $real1){
        echo "$one and $real1 are ==<br/>";
    }
        else{
            echo "$one and $real1 are NOT == <br/>";
        }
    
    //conversion to make boolean equal
    if($one == $isTrue){
        echo "$one and $isTrue are == <br/>";
    }
        else{
            echo "$one and $isTrue are NOT == <br/>";
        }
    //three equals is for real testing and not conversions
    if($one === $real1){
        echo "$one and $real1 are === <br/>";
    }
        else{
            echo "$one and $real1 are NOT === <br/>";
        }

    if($one === $isTrue){
        echo "$one and $isTrue are === <br/>";
    }
        else{
            echo "$one and $isTrue are NOT === <br/>";
        }
    if($one != $real1){
        echo "$one and $real1 are != <br/>";
    }
        else{
            echo "$one and $real1 are NOT != <br/>";
        }

    if($one != $isTrue){
        echo "$one and $isTrue are != <br/>";
    }
        else{
            echo "$one and $isTrue are NOT != <br/>";
        }
    if($one !== $real1){
        echo "$one and $real1 are !== <br/>";
    }
        else{
            echo "$one and $real1 are NOT !== <br/>";
        }

    if($one !== $isTrue){
        echo "$one and $isTrue are !== <br/>";
    }
        else{
            echo "$one and $isTrue are NOT !== <br/>";
        }

    $a = 1;
    $b =2;

    if($a === 1 || $b === 1){
        echo 'either $a or $b are 2<br/>';
    }else{
        echo 'neither $a nor $b are 2<br/>';
    }

    if($a === 1 && $b === 1){
        echo 'both $a and $b are 1<br/>';
    }else{
        echo '$a and $b are not both 1<br/>';
    }

    // you can write out 'or' and 'and'
    if($a === 1 or $b === 1){
        echo 'either $a or $b are 2<br/>';
    }else{
        echo 'neither $a nor $b are 2<br/>';
    }

    if($a === 1 and $b === 1){
        echo 'both $a and $b are 1<br/>';
    }else{
        echo '$a and $b are not both 1<br/>';
    }

    //written out or is diff then ||, see below. Same is true for and
    $result1 = false or true;
    $result2 = false || true;

    ($result1 = false) or true;
    $result2 = (false || true);



    if($result1 === true){
        //if you just print the variable if true it'll print 1 and if false
        //it'll print nothing
        echo '$result1 === true<br/>';
    }else{
        echo '$result1 !== true<br/>';
    }

    echo "<br/>";

     if($result2 === true){
        echo '$result2 === true<br/>';
    }else{
        echo '$result2 !== true<br/>';
    }

    echo "<br/>";

    //not or 
    if($a === 1 xor $b === 1){
        echo 'either $a or $b is 1 but not both';
    }else{
        echo '! $a === 1 xor $b === 1';
    }

    echo "<br/>";

    if($a === 1 xor $b === 2){
        echo 'either $a or $b is 2 but not both';
    }else{
        echo '! $a === 1 xor $b === 2';
    }

    echo "<br/>";


    #you can also check for string
    $x = "Hello";
    switch($x){
        case 1:
            echo "It's 1";
            break;
        case 2:
            echo "It's 2";
            
        case 3:
            echo "It's 3";
            break;

        case 'Hello':
            echo "Hi there!";
            break;
        default:
            echo "It's not 1, 2, 3 or Hello";
    }

    echo "<br/>";

    #in php variables are in scope and are global unless they're in a function
    for($i = 0; $i < 5; $i++){
        echo "$i<br/>";
    }

    echo $i;
    echo "<br/>";

    while($i > 0){
        echo "$i<br/>";
        $i--;
    }

    echo "$i<br/>";

    do{
        echo "in do while<br/>";
    }while($i > 0);

    //scope issue if not true so $foo doesn't exist and will get error so
    //you can say $foo is null like so...
    #$foo = null;
    if($x === 'foo'){
        $foo = 'bar';
    }

    //this won't exist
    if(isset($foo)){
        //now you won't get an error
        echo $foo;
    }
    


    



    



?>
    



   