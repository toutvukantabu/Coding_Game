<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 * ---
 * Hint: You can use the debug stream to print initialTX and initialTY, if Thor seems not follow your orders.
 **/

// $lightX: the X position of the light of power
// $lightY: the Y position of the light of power
// $initialTx: Thor's starting X position
// $initialTy: Thor's starting Y position
fscanf(STDIN, "%d %d %d %d", $lightX, $lightY, $initialTx, $initialTy);

$thorX= $lightX;
$thorY= $lightY;
$powerX = $initialTx;
$powerY = $initialTy; 

// game loop
while (true){ 
    // $remainingTurns: The remaining amount of turns Thor can move. Do not remove this line.
    fscanf(STDIN, "%d", $remainingTurns);

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)


    // A single line providing the move to be made: N NE E SE S SW W or NW
$direction = "";

if  ($thorY > $powerY) { 
 $direction ="S";
 $thorY--; 
}elseif ($thorY < $powerY){
  $direction = "N";
  $thorY++;}

if ($thorX < $powerX  ){
  $direction .="W";
  $thorX++;
}elseif ($thorX > $powerX){ 
  $direction .="E";
  $thorX--;
}

    echo( $direction ."\n");
   
}



?>