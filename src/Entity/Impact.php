<?php

declare(strict_types=1);

namespace App\Entity;

final class Impact
{
    private int $euros;

    private int $trees;

    private int $water;

    public function getEuros(): int
    {
        return $this->euros;
    }

    public function setEuros(int $euros): self
    {
        $this->euros = $euros;

        return $this;
    }

    public function getTrees(): int
    {
        return $this->trees;
    }

    public function setTrees(int $trees): self
    {
        $this->trees = $trees;

        return $this;
    }

    public function getWater(): int
    {
        return $this->water;
    }

    public function setWater(int $water): self
    {
        $this->water = $water;

        return $this;
    }
}
