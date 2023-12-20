<?php

declare(strict_types=1);

namespace App\MatchMaker\Interfaces;

interface PlayerInterface
{
    public function getName(): string;
    public function getRatio(): float;
    public function probabilityAgainst(PlayerInterface $player): float;
    public function updateRatioAgainst(PlayerInterface $player, int $result): void;
}

interface QueuingPlayerInterface extends PlayerInterface
{
    public function getRange(): int;
    public function upgradeRange(): void;
}

interface LobbyInterface
{
    public function findOpponents(QueuingPlayerInterface $player): array;
    public function addPlayer(PlayerInterface $player): void;
    public function addPlayers(PlayerInterface $players): void;
}
