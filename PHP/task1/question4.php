<?php
$age = 10;
switch($age){
    case ($age < 5):
        echo "Stay at home";
        break;
    case ($age == 5):
        echo "Go to Kindergarden";
        break;
    case ($age >= 6 && $age <=12):
        echo "Go to grade :XXX";
        break;
}
?>