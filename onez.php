
 require ("data.php");
 function zodiacFindNumberAndColor(Array $drawData, Array $data, Array $colorballs, Array $zodiacAnimal){ #begin func ... find count, numbers and colors

    $numbers = range(1, 49); # generate numbers from 1-49
    shuffle($numbers);
    $draw_number = array_slice($numbers, 0, 7);

    $drawnColors = [];
    $lastDrawColor  = null;
    foreach ($draw_number as $keys => $value) {
        foreach ($drawData as $key => $values) {
             echo (in_array($value,$values)) ? "<span style='color: {$key}'>$value</span>": "";
             (in_array($value,$values)) ? $drawnColors[] = $key : "";
             (in_array($value,$values)) ? $lastDrawColor = $key : ""; 
        };
    };

    blueRedGreenTie($drawnColors,$lastDrawColor,$colorballs);
    zodiacAndData($zodiacAnimal, $data, $draw_number);
    
};

function blueRedGreenTie(Array $drawnColors, String $lastDrawColor, Array $colorballs){
    $colorCount = array_count_values($drawnColors);
    $maxCount = max($colorCount);
    $colorsWithEqualCounts = array_keys($colorCount, $maxCount) ? array_keys($colorCount, $maxCount) : $maxCount;

    if (count($colorsWithEqualCounts) > 1) {
        $outcome = in_array($lastDrawColor, $colorsWithEqualCounts) ? $lastDrawColor : "tie";
    } else {
        $outcome = implode(', ', $colorsWithEqualCounts);
    }
    
    if (in_array($outcome, $colorballs)) {
        echo "<br>User selection: [ " . implode(', ', $colorballs) . " ] Win ---- Outcome: " . ($outcome == "tie" ? "Tie" : $outcome);
    } else {
        echo "<br>User selection: [ " . implode(', ', $colorballs) . " ] Lost ---- Outcome: " . ($outcome == "tie" ? "Tie" : $outcome);
    }
}

function zodiacAndData(Array $zodiacAnimal, Array $data, Array $draw_number){
    foreach ($zodiacAnimal as $key => $value){
        if(in_array($value,array_keys($data))){
            $realData = array_values($data[$value]);
            echo "<pre>";
            $winOrlost = count(array_intersect($draw_number, $realData)) > 0 ? $value . " Win" : $value . " Lost";
            $intersections = array_intersect($draw_number, $realData);
            echo "Selection: " . $value ." => [ " . implode(', ', $realData) ." ]" . " ---- Outcome: [" . implode(", ", $intersections) . "] => " . $winOrlost;
        }
    };
}

zodiacFindNumberAndColor($drawData,$data,["red"],["rat","ox","snake","dog","pig"]);