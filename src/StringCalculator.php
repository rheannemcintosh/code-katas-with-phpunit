<?php

namespace App;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected $delimiter = ",|\n";

    public function add(string $numbers)
    {
        if (! $numbers) {
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $this->disallowNegatives($numbers);

        $numbers = $this->ignoreGreaterThanMaxNumberAllowed($numbers);

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

    protected function parseString(string $numbers)
    {
        $customDelimiter = "\/\/(.)\n";

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return  preg_split("/{$this->delimiter}/", $numbers);
    }

    /**
     * @param array|false $numbers
     * @return array|false
     */
    public function ignoreGreaterThanMaxNumberAllowed(array $numbers)
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
    }
}