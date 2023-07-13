<?php 
//Pseudo logic
$draw = [10,3,20,17,1,8];
$balls = ["ball1","ball2","ball3","ball4"];
$selection = ["big","small","odd","even"];
foreach ($balls as $key => $value) {

   if(($value == "ball1")){

        foreach ($selection as $key => $value) {

            $data1 = ($value == "big" && $draw[0] >= 25) ? "Win Big" : (($value == "small" && $draw[0] <= 24) ? "Win Small" : "");
            $data2 = ($value == "big" && $draw[0] >= 25) ? "Win Big" : (($value == "small" && $draw[0] <= 24) ? "Win Small" : "");
            
            

        }

   }

}


?>