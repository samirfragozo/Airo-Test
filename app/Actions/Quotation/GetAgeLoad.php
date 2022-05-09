<?php

namespace App\Actions\Quotation;

class GetAgeLoad
{
    private int $age;

    public function __construct(int $age)
    {
        $this->age = $age;
    }

    public function execute(): float
    {
        if ($this->age >= 18 and $this->age <= 30) {
            return 0.6;
        }

        if ($this->age >= 31 and $this->age <= 40) {
            return 0.7;
        }

        if ($this->age >= 41 and $this->age <= 50) {
            return 0.8;
        }

        if ($this->age >= 51 and $this->age <= 60) {
            return 0.9;
        }

        if ($this->age >= 61 and $this->age <= 70) {
            return 1;
        }

        return 0;
    }
}