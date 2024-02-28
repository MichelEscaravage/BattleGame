<?php

namespace App\Service;

use App\Character\Character;

interface xpCalculatorInterface
{
    public function addXp(Character $winner, int $enemyLevel):void;
}