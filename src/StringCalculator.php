<?php

namespace App;

class StringCalculator
{
    public function add(string $numbers)
    {
        if (! $numbers) {
            return 0;
        }

        return intval($numbers);
    }
}