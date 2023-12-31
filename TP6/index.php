<?php

$date = new DateTime;
echo $date->format('d/m/Y');

const RESULT_WINNER = 1;
const RESULT_LOSER = -1;
const RESULT_DRAW = 0;
const RESULT_POSSIBILITIES = [RESULT_WINNER, RESULT_LOSER, RESULT_DRAW];


class Player
{   
    public $level;
}

class Encounter
{

    public function setprobabilityAgainst(int $levelPlayerOne, int $againstLevelPlayerTwo)
    {
        return 1/(1+(10 ** (($againstLevelPlayerTwo - $levelPlayerOne)/400)));
    }
    /*
    public function getprobabilityAgainst():int
    {
        $this->levelPlayerOne;
    }
    */
    public function setNewLevel(int &$levelPlayerOne, int $againstLevelPlayerTwo, int $playerOneResult)
    {
        if (!in_array($playerOneResult, RESULT_POSSIBILITIES)) {
            trigger_error(sprintf('Invalid result. Expected %s',implode(' or ', RESULT_POSSIBILITIES)));
        }

        $levelPlayerOne += (int) (32 * ($playerOneResult - $this->probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)));
    }
    /*
    public function getNewLevel():int
    {
        return $this->levelplayer;
    }
    */
}

$greg = new Player;
$jade = new Player;

$greg->level = 400;
$jade->level = 800;

$encounter = new Encounter();

echo sprintf(
    'Greg à %.2f%% chance de gagner face a Jade',
    $encounter->probabilityAgainst($greg->level, $jade->level)*100
).PHP_EOL;

// Imaginons que greg l'emporte tout de même.
$encounter->setNewLevel($greg->level, $jade->level, RESULT_WINNER);
$encounter->setNewLevel($jade->level, $greg->level, RESULT_LOSER);

echo sprintf(
    'les niveaux des joueurs ont évolués vers %s pour Greg et %s pour Jade',
    $greg->level,
    $jade->level
);

exit(0);
