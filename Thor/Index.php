<?php

function dump($value)
{

    echo var_dump($value);
}

$N = 10;
// on recupère les resultats afin de mener le combat suivant 

//etablir les regles;
$rules = [
    'R' => ["C", "L"],
    'P' => ["R", "S"],
    'C' => ["P", "L"],
    'L' => ["S", "P"],
    'S' => ["C", "R"],
];

$key_rules = array_keys($rules);
$players = [];
$game = [];
$winner = [];
$looser = [];

//indiquer nombre de joueurs et le signe affilié
for ($i = 0; $i < $N; $i++) {
    $NUMPLAYER = rand(0, 1000);
    $sign = $key_rules[rand(0, count($key_rules) - 1)];
    $players[$NUMPLAYER] = $sign;
}
$player = [];
// on instancie deux joueurs en bouclant tant qu'il n(en reste pas 1 
while (count($players) != 1) {

    foreach ($players as  $k => $sign) {

        if (!empty($player)) {
            if ($player['sign'] === $sign and $player['num'] < $k) {
                $winner[$player['num']] =  $player['sign'];
                $looser[$player['num']][] = $k;
            } elseif ($player['sign'] === $sign and $player['num'] > $k) {
                $winner[$k] = $sign;
                $looser[$k][] = $player['num'];
            } elseif (in_array($sign, $rules[$player['sign']])) {
                $winner[$player['num']] =  $player['sign'];
                $looser[$player['num']][] = $k;
            } else {
                $winner[$k] = $sign;
                $looser[$k][] = $player['num'];
            }
            unset($player);
            continue;
        }
        $player = ['num' => $k, 'sign' => $sign];
    }
    //on vide le tableau contenant tous les joueurs
    unset($players);
    //on ajoute les gagnant au tableau
    $players = $winner;
    unset($winner);
}


foreach ($players as $winner => $sign) {

    if (array_key_exists($winner, $looser)) {
        echo "le gagnant est le numéro " . $winner . "\net voici la liste des perdants contre qui il a joué ";
        $looserLine = '';
    }
    if (array_key_exists($winner, $looser)) {

    foreach ($looser as $num => $loosersnum) {
            foreach ($loosersnum as $loosernum) {

                if (!empty($looserLine)) {

                    $looserLine .= ' ';
                }

                $looserLine .= $loosernum;
            }
        }
    }
}
echo $looserLine;