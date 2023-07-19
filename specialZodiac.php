<?php

include "data.php"; #request for this file

function findAndRunThrough(Array $data, Array $selections) {

    $numbers = range(1, 49); # generate numbers from 1-49
    shuffle($numbers);
    $draw_number = array_slice($numbers, 0, 7);echo "Draw number : ".implode(",",$draw_number)."<hr>";
    $theLastDrawNumber = sprintf("%02d",end($draw_number));
    $result = [];
    foreach ($selections as $value) {

         // Check if the value contains "head" or "tail"
    if (stripos($value, "head") !== false || stripos($value, "tail") !== false) {
        list($head, $tail) = str_split($theLastDrawNumber);
        $check_value = stripos($value, "head") !== false ? $head : $tail;
        $result[] = in_array($check_value, $data[$value]) ? $value . " Win" : $value . " Lost";
    } else {
        $values = $data[$value];
        (in_array($theLastDrawNumber, $values)) ? $result[] = $value . " Win [". implode(', ', $values) ."]" : $result[] = $value . " Lost";
         
     }

    }
    echo json_encode($result);
}

findAndRunThrough($data,["head0","head1","tail5","tail1"]);