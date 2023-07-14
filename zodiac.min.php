<?php
include "data.php";
function zodiac($data,$selection){ #begin func ...

    list($s1,$s2,$s3) = $selection;
    $numbers = range(1, 49); # generate numbers from 1-49
    shuffle($numbers);
    $draw_number = array_slice($numbers, 0, 7);echo "Draw number : ".implode(",",$draw_number)."<hr>";
    foreach ($data as $key => $value) :
        echo "$key = " . count(array_intersect($draw_number, $value)) . "<br>";
    endforeach;
    $result = count(array_filter($data, fn($value) => count(array_intersect($draw_number, $value)) > 0));
    $checkOddOrEven = $result % 2 != 0 ? "Odd" : "Even";
    $checkWinOrLost = in_array($result,$selection) ? "win" : "Lost";
    echo "<hr>Selection [{$s1}, {$s2}, {$s3}] {$checkWinOrLost} <==> Outcome [{$result}] {$checkOddOrEven}";

} #end func ...

#function test
$selection = [3,5,7];
zodiac($data,$selection);
