<?php 
//Pseudo logic
$draw = [10,37,20,17,1,8];
$balls = [1];
$selection = ["bballs","gballs"];

$red    = [1 ,3 ,7 ,8 ,12 ,13 ,18 ,19 ,23 ,24 ,29 ,30 ,34 ,35 ,40 ,45 ,46];
$blue   = [3 ,4 ,9 ,10 ,14 ,15 ,20 ,25 ,26 ,31 ,36 ,37 ,41 ,42 ,47 ,48];
$green  = [5 ,6 ,11 ,16 ,17 ,21 ,22 ,27 ,28 ,32 ,33 ,38 ,39 ,43 ,44 ,49] ;

$mapping = [];
$numbers = [];
$strings = [];
$arrAll = [];

//sort numbers from stiring
foreach ($selection as $value) {
    if (is_numeric($value)) {
        $numbers[] = $value;
    }else{
        $strings[] = $value;
    }
}

//map balls to draw numbers
foreach ($draw as $index => $value) {
    if (in_array($index + 1, $balls)) {
        $mapping[$index + 1] = $value;
    }
}


foreach ($mapping as $key => $values) {

        
            foreach ($strings as $key => $value) {

                $data1 = ($value == "big" && $values >= 25) ? array_push($arrAll,"Win Big") : (($value == "small" && $values <= 24) ? array_push($arrAll,"Win Small")  : "");
                $data2 = ($value == "even" && $values % 2 != 0) ? array_push($arrAll,"Win Odd") : (($value == "odd" && $values % 2 == 0) ? array_push($arrAll,"Win Even") : ""); 
                $data3 = ($value == "bsum" && array_sum(str_split((int)$values)) >= 7) ? array_push($arrAll,"Win Bsum") : (($value == "ssum" && array_sum(str_split((int)$values)) <= 6) ? array_push($arrAll,"Win Ssum") : ""); 
                $data4 = ($value == "osum" && array_sum(str_split((int)$values)) % 2 != 0) ? array_push($arrAll,"Win Osum") : (($value == "esum" && array_sum(str_split((int)$values)) % 2 == 0) ? array_push($arrAll,"Win Esum") : "");

                $spl = str_split((int)$values);
                $cheker = end($spl);
                $data5 = ($value == "tbig" && $cheker >= 5) ? array_push($arrAll,"Win Tbig") : (($value == "odd" && $cheker <= 4) ? array_push($arrAll,"Win Tsmall") : "");  

                //red | green | blue = balls
                $data6 = (in_array($values, $red) && $value == "rballs") ? array_push($arrAll,"Red Win") : "";
                $data7 = (in_array($values, $green) && $value == "gballs") ? array_push($arrAll,"Green Win") : "";
                $data8 = (in_array($values, $blue) && $value == "bballs") ? array_push($arrAll,"blue Win") : "";

            }

            (in_array($draw[0],$numbers)) ? array_push($arrAll,"Number Win") : "";
        

         //contains numbers


}

echo json_encode($arrAll);