<?php  
    //////////////// Question 1 /////////////////////
    echo nl2br("New line will start from here\n in this string\r\n on the browser window"); 
    //////////////// Question 2 /////////////////////
    echo '<pre>';
    var_dump($_SERVER);
    echo '</pre>';
    //////////////// Question 3 /////////////////////
    $numbers = array("12", "45", "10", "25");
    $sum = array_sum($numbers);
    $average = array_sum($numbers) / count($numbers);
    echo $sum;
    echo "<br>";
    echo $average;
    echo "<br>";
    rsort($numbers);
    foreach ($numbers as $num) {
        echo "Numbers: $num <br>";
    }
    //////////////// Question 4 /////////////////////
    $ages = array("Sara"=>31, "Jhon"=>41, "Walaa"=>39, "Ramy"=>40);
    echo "Sort Ascending order sort by value: <br>";
    asort($ages);
    foreach($ages as $a => $n){
        echo "$a => $n <br>";
    }
    echo "Sort Ascending order sort by key: <br>";
    ksort($ages);
    foreach($ages as $a => $n){
        echo "$a => $n <br>";
    }
    echo "Sort Descending order sort by value: <br>";
    arsort($ages);
    foreach($ages as $a => $n){
        echo "$a => $n <br>";
    }
    echo "Sort Descending order sort by key: <br>";
    krsort($ages);
    foreach($ages as $a => $n){
        echo "$a => $n <br>";
    }
?>  
