include "zodiacAndTailData.php"; #request for this file

function findAndRunThrough(Array $data, Array $zodiacData, Array $selections, Array $zodiacselection) {

    $numbers = range(1, 49); # generate numbers from 1-49
    shuffle($numbers);
    $draw_number = array_slice($numbers, 0, 7);echo "Draw number : ".implode(",",$draw_number)."<hr>";
    $theLastDrawNumber = sprintf("%02d",end($draw_number));
    $result = [];
    foreach ($selections as $value) {
         // Check if the value contains "head" or "tail"
        if (stripos($value, "tail") !== false) {
            list($head, $tail) = str_split($theLastDrawNumber);
            $check_value = stripos($value, "tail") !== false ? $tail : $head;
            $result[] = in_array($check_value, $data[$value]) ? $value . " Win" : $value . " Lost";
        } else {
            $values = $data[$value];
            (in_array($theLastDrawNumber, $values)) ? $result[] = $value . " Win [". implode(', ', $values) ."]" : $result[] = $value . " Lost";
        }
    }
    foreach ($zodiacData as $key => $value) {
        echo "$key = " . count(array_intersect($draw_number, $value)) . "<br>";
    }
    $count = count(array_filter($zodiacData, fn($value) => count(array_intersect($draw_number, $value)) > 0));
    findOddOrEven($count,$zodiacselection);
    echo "<hr>" . json_encode($result) . "<hr>";
}

function findOddOrEven($count,$zodiacselection){
    $odddata = ["3","5","7"];
    $evendata = ["2","4","6"];
    if(in_array($count,$zodiacselection)){
        $outcome = "<hr>Outcome [ " . $count . " ] ---- Selection: [ " . implode(', ', $zodiacselection) .  " ] Win";
    }else if(in_array(9,$zodiacselection) && in_array($count,$odddata)){
        $outcome = "<hr>Outcome [ " . $count . " ] ---- Selection: [ " . implode(', ', $zodiacselection) .  " ] Oddsum Win";
    }else if(in_array(8,$zodiacselection) && in_array($count,$evendata)){
        $outcome = "<hr>Outcome [ " . $count . " ] ---- Selection: [ " . implode(', ', $zodiacselection) .  " ] Evensum Win";
    }else{
        $outcome = "<hr>Outcome [ " . $count . " ] ---- Selection: [ " . implode(', ', $zodiacselection) .  " ] Lost";
    }
   echo $outcome;
}

findAndRunThrough($data,$zodiacData,["tail5","tail1"],[2,4,6]);