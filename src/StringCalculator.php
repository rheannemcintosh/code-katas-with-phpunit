<?php

namespace App;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    public function add(string $numbers)
    {
        $delimiter = ",|\n";
        if (! $numbers) {
            return 0;
        }

        $customDelimiter = "\/\/(.)\n";

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        $numbers = preg_split("/{$delimiter}/", $numbers);

        $this->disallowNegatives($numbers);

        $numbers = array_filter($numbers, function($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });

        return array_sum($numbers);
    }

    /**
     * @param string $numbers
     * @return void
     * @throws \Exception
     */
    public function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0 ) {
                throw new \Exception('Negative numbers are disallowed');
            }
        }
    }
}