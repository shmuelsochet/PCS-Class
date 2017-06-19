<?php
    $presidents = array ("Donald J Trump", "Barack Obama", "George W Bush");
    #more recent versions of php
    $presidents = ["Donald J Trump", "Barack Obama", "George W Bush"];

    //this is a call of a function so not so efficient, so save it out of the loop
    $length = count($presidents);
    
    for($i = 0; $i < $length; $i++){
        echo $presidents[$i] . "<br/>";

    }

    print_r($presidents);
    echo "<br/>";
    var_dump($presidents);
    echo "<br/>";

    //you can make your own key by arrays, associative array

    $person = [
        "name" => "Sam",
        "age" => 21/*,
        0 => "Sam",
        1 => 21*/
    ] ;

    print_r($person);

    echo "<br/>";

    echo "{$person['name']} is {$person['age']} <br/>";

    //adding to array unlike java
    $presidents[] = "William J Clinton";

    print_r($presidents);
    echo "<br/>";

    //default is 0 (first number in index)
    $person[] = "sam@gmail.com";
    print_r($person);
    echo "<br/>";

    //once a number is used the default is the next number   
    $person[5] = "123 Some Street";
    $person[] = "Lakewood";
    print_r($person);
    echo "<br/>";

    /*$students = [
        [
            "name" => "Bob",
            "grade"=> 92
        ],
        [
            "name"=> "Joe",
            "grade"=> 87
        ]


    ];

    print_r($students);
    echo "<br/>";

    for($i = 0; $i < count($students); $i++){
        echo $students[$i]["name"] . $students[$i]["grade"] . "<br/>";
    }*/

    $students = [
       "Bob" => [
            "name" => "Bob",
            "grade"=> 92
        ],
        "Joe" => [
            "name"=> "Joe",
            "grade"=> 87
        ]


    ];

    print_r($students);
    echo "<br/>";       
    
    foreach($students as $student){
        echo $student["name"] . $student["grade"] . "<br/>";
    }

    //just get key
     foreach($students as $student){
        foreach($student as $property)
        echo  $property . "<br/>";
    }

    //get key and value
    foreach($students as $student){
        foreach($student as $key => $value)
        echo "$key: $value<br/>";
    }

    print_r($student);



?>