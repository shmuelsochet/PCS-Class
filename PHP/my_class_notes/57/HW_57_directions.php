For homework please do the following:
1.Rework your presidents page from the last homework to model each president as an NON ASSOCIATIVE array. i.e. Each "president" array will have 2 elements. The element at spot 0 will be name and the element in spot 1 will be years. All the presidents should be stored in an array as well.
2.Same as above but this time model each president as an associative array that has "name" and "years".
3.E.C. See if you can generate the columns for #2 (including the headers) dynamically as well. i.e. if you added an age to the president elements, the table would show an age column with NO CHANGES other then to the array elements - no changes to the code that creates and outputs the values in the table.
 you can simply output 2 tables in one page instead of submitting two files.

php2
<?php
    $first = "Donald";
    $last = "Trump";
    #echo $first . " " . $last;
    echo 'The name is $first $last<br/>';
    echo "The name is $first $last<br/>";
    echo '<a href="https:\\www.google.com">Google</a><br/>';
    echo "<a href=\"https:\\www.google.com\">Google</a><br/>";
    echo $first, ' ', $last, '<br/>';
    #$fullName = $first . " " . $last;
    $fullName = $first;
    $fullName .= " ";
    $fullName .= $last;
    echo "$fullName<br/>";
    $one = "1";
    $real1 = 1;
    $isTrue = true;
    echo $one + 1 . "<br/>";
    if($one == $real1) {
        echo "$one and $real1 ==<br/>";
    } else {
        echo "$one and $real1 are NOT ==<br/>";
    }
    if($one == $isTrue) {
        echo "$one and $isTrue ==<br/>";
    } else {
        echo "$one and $isTrue are NOT ==<br/>";
    }
    if($one === $real1) {
        echo "$one and $real1 are ===<br/>";
    } else {
        echo "$one and $real1 are NOT ===<br/>";
    }
    if($one === $isTrue) {
        echo "$one and $isTrue ===<br/>";
    } else {
        echo "$one and $isTrue are NOT ===<br/>";
    }
    if($one != $real1) {
        echo "$one and $real1 are !=<br/>";
    } else {
        echo "$one and $real1 are NOT !=<br/>";
    }
    if($one !== $real1) {
        echo "$one and $real1 are !==<br/>";
    } else {
        echo "$one and $real1 are NOT !==<br/>";
    }
    if($one != $isTrue) {
        echo "$one and $isTrue !=<br/>";
    } else {
        echo "$one and $isTrue are NOT !=<br/>";
    }
    
    if($one !== $isTrue) {
        echo "$one and $isTrue !==<br/>";
    } else {
        echo "$one and $isTrue are NOT !==<br/>";
    }
    $a = 1;
    $b = 2;
    if($a === 1 || $b === 1) {
        echo 'either $a or $b are 1<br/>';
    } else {
        echo 'neither $a or $b are 1<br/>';
    }
    if($a === 1 && $b === 1) {
        echo 'both $a and $b are 1<br/>';
    } else {
        echo '$a and $b are not both 1<br/>';
    }
    if($a === 1 or $b === 1) {
        echo 'either $a or $b are 1<br/>';
    } else {
        echo 'neither $a or $b are 1<br/>';
    }
    if($a === 1 and $b === 1) {
        echo 'both $a and $b are 1<br/>';
    } else {
        echo '$a and $b are not both 1<br/>';
    }
    $result1 = false or true;
    $result2 = false || true;
    #($result1 = false) or true;
    #$result2 = (false || true);
    #$result1 = (false or true);
    #($result2 = false) || true;
    if($result1 === true) {
        echo '$result1 === true';
    } else {
        echo '$result1 !== true';
    }
    echo "<br/>";
    if($result2 === true) {
        echo '$result2 === true';
    } else {
        echo '$result2 !== true';
    }
    echo "<br/>";
    if($a === 1 xor $b === 1) {
        echo 'either $a or $b is 1 but not both';
    } else {
        echo '! $a === 1 xor $b === 1';
    }
    echo "<br/>";
    if($a === 1 xor $b === 2) {
        echo 'either $a is 1 or $b is 2 but not both';
    } else {
        echo '! $a === 1 xor $b === 2';
    }
    echo "<br/>";
      if(($a === 1 || $b === 2) &&
       !($a === 1 && $b === 2)) {
        echo 'either $a is 1 or $b is 2 but not both';
    } else {
        echo '! $a === 1 xor $b === 2';
    }
    echo "<br/>";
    $x = 'Hello';
    switch ($x) {
        case 1:
            echo "Its 1";
            break;
        case 2:
            echo "Its 2";
        case 3:
            echo "Its 2 or 3";
            break;
        case 'Hello':
            echo "Hi there!";
            break;
        default:
            echo "Its not 1,2, 3, or Hello";
    }
    echo "<br/>";
    for($i = 0; $i < 5; $i++) {
        echo "$i<br/>";
    }
    echo $i;
    echo "<br/>";
    while($i > 0) {
        echo "$i<br/>";
        $i--;
    }
    echo $i;
    echo "<br/>";
    do {
        echo "in do while<br/>";
    } while($i > 0);
    $x = 'foo';
    #$foo = null;
    if ($x === 'foo') {
        $foo = 'bar';
    }
    if(isset($foo)) {
        echo $foo;
    }
?>

processForm

<?php
    #print_r($_SERVER);
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $name = $_GET['name'];
        $age = $_GET['age'];
        $email = $_GET['email'];
    } else {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
    }
    
    echo "Hello $name who is $age years old. I will send your email to $email";
?>
<h1>You Submitted</h1>

<h2>$_GET</h2>
<?php
    print_r($_GET);
?>

<h2>$_POST</h2>
<?php
    print_r($_POST);
?>

arrays

<?php
    #$presidents = array("Donald J Trump", "Barack Obama", "George W Bush");
    $presidents = ["Donald J Trump", "Barack Obama", "George W Bush"];
    $length = count($presidents);
    for($i = 0; $i < $length; $i++) {
        echo $presidents[$i] . "<br/>";
    }
    print_r($presidents);
    echo "<br/>";
    var_dump($presidents);
    echo "<br/>";
    $person = [
        "name" => "Sam",
        "age" => 21/*,
        0 => "Sam",
        1 => 21*/
    ];
    print_r($person);
    echo "{$person['name']} is {$person['age']} <br/>";
    $presidents[] = "William J Clinton";
    print_r($presidents);
    echo "<br/>";
    $person[] = "sam@gmail.com";
    print_r($person);
    echo "<br/>";
    $person[5] = "123 Some Street";
    $person[] = "Lakewood";
    print_r($person);
    echo "<br/>";
    /*
    $students = [
        [
            "name" => "Bob",
            "grade" => 92
        ],
        [
            "name" => "Joe",
            "grade" => 87
        ]
    ];
    print_r($students);
    echo "<br/>";
    for($i = 0; $i < count($students); $i++) {
        echo $students[$i]["name"] . " " . $students[$i]["grade"] . "<br/>";
    }
    */
    $students = [
        "Bob" => [
            "name" => "Bob",
            "grade" => 92
        ],
        "Joe" => [
            "name" => "Joe",
            "grade" => 87
        ]
    ];
    print_r($students);
    echo "<br/>";
    #echo $students["Bob"]["name"] . " " . $students["Bob"]["grade"] . "<br/>";
    foreach($students as $student) {
        echo "Name: " . $student["name"] . " Grade: " . $student["grade"] . "<br/>";
    }
    foreach($students as $student) {
        foreach($student as $property)
            echo $property . "<br/>";
    }
    foreach($students as $student) {
        foreach($student as $key=>$value)
            echo "$key: $value<br/>";
    }
    print_r($student);
?>