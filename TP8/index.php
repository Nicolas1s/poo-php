<?php

/*
 * This file is part of the OpenClassRoom PHP Object Course.
 *
 * (c) Grégoire Hébert <contact@gheb.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace {
    spl_autoload_register(function($fqcn){
        $path = str_replace(['App', '\\'], ['src', '/'], $fqcn) . '.php';
        require $path;
    });
    require_once('src/Lobby.php');
    require_once('src/Player.php');

    use App\MatchMaker\Player\BlitzPlayer;
    use App\MatchMaker\Lobby\Lobby;

    $greg = new BlitzPlayer('greg');
    $jade = new BlitzPlayer('jade');

    $lobby = new Lobby();
    $lobby->addPlayers($greg, $jade);

    var_dump($lobby->findOponents($lobby->queuingPlayers[0]));

    exit(0);
}