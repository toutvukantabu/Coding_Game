<?php

$MESSAGE = 'CC';

$binaryArray  = '';

foreach (str_split($MESSAGE) as $chr) {

    $binaryArray .= sprintf('%07b', ord($chr));
}
$prev =[];
$code ='';

foreach (str_split($binaryArray) as $k => $number) {
    
        if($k == "0"){

            $codeNumb =  ['binaryNum' => $number];

            $code .= ($codeNumb['binaryNum']=== "1" ? "0 0" : "00 0");  
        }
        unset($codeNumb);  
        
        if (!empty($prev)) {
            
            if ($number === "1" && $number === $prev['binaryNum']) {

                $code .= "0";

            } elseif ($number === "1" && $number != $prev['binaryNum']) {

                $code .= " 0 0";

            } elseif ( $number === "0" && $number === $prev['binaryNum']) {

                $code .= "0";

            } elseif ( $number === "0" && $number != $prev['binaryNum']) {

                $code .= " 00 0";
            }
            unset($prev);
        }
        $prev = ['binaryNum' => $number]; 
  }
echo $code;
