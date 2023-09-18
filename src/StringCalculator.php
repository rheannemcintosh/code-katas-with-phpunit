<?php

namespace App;

class StringCalculator
{
    public function add(string $numbers)
    {
        if (! $numbers) {
            return 0;
        }

        $numbers = explode(",", $numbers);

        return array_sum($numbers);
    }
}