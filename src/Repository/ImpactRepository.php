<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Impact;

final class ImpactRepository
{
    public function findOne(): Impact
    {
        return (new Impact())
            ->setEuros(rand(1000, 1000000))
            ->setTrees(rand(1000, 1000000))
            ->setWater(rand(1000, 1000000));
    }
}
