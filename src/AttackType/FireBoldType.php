<?php

namespace App\AttackType;

use App\Dice;

class FireBoldType implements AttackType
{
    public function performAttack(int $baseDamage): int
    {
        return Dice::roll(10) + Dice::roll(10) + Dice::roll(10);

    }

}