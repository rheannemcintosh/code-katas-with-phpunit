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

        $this->disallowNegatives($numbers = $this->parseString($numbers));

        return array_sum(
            $this->ignoreGreaterThanMaxNumberAllowed($numbers)
        );
    }

    /**
     * @param string $numbers
     * @return void
     * @throws Exception
     */
    public function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negative numbers are disallowed');
            }
        }
    }

    protected function parseString(string $numbers): array
    {
        $customDelimiter = '\/\/(.)\n';

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
    public function ignoreGreaterThanMaxNumberAllowed(array $numbers): array
    {
        return array_filter(
            $numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED
        );
    }
}