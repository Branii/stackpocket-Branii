<?php
include "data.php";
function zodiac($data,$selection){ #begin func ...

    $numbers = range(1, 49); # generate numbers from 1-49
    shuffle($numbers);
    $draw_number = array_slice($numbers, 0, 7);echo "Draw number : ".implode(",",$draw_number)."<hr>";
    foreach ($data as $key => $value) {
        echo "$key = " . count(array_intersect($draw_number, $value)) . "<br>";
    }
    $result = count(array_filter($data, fn($value) => count(array_intersect($draw_number, $value)) > 0));
    $checkOddOrEven = $result % 2 != 0 ? "Odd" : "Even";
    $checkWinOrLost = in_array($result,$selection) ? "win" : "Lost";
    echo "<hr>Selection [{$selection[0]}, {$selection[1]}, {$selection[2]}] {$checkWinOrLost} <==> Outcome [{$result}] {$checkOddOrEven}";

} #end func ...

#function test
$selection = [2,4,6];
zodiac($data,$selection);


