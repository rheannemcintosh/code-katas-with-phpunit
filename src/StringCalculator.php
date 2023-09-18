<?php

namespace App;

class StringCalculator
{
    /**
     * The maximum number allowed.
     */
    const MAX_NUMBER_ALLOWED = 1000;

    /**
     * The delimiter for the numbers.
     *
     * @var string
     */
    protected $delimiter = ",|\n";

    /**
     * Add the provided set of numbers.
     *
     * @param string $numbers
     * @return int
     *
     * @throws Exception
     */
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
     * Do not allow any negative numbers.
     *
     * @param array $numbers
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

    /**
     * Parse the numbers string.
     *
     * @param string $numbers
     * @return array
     */
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
     * Forget any number that is not allowed.
     *
     * @param array $numbers
     * @return array
     */
    public function ignoreGreaterThanMaxNumberAllowed(array $numbers): array
    {
        return array_filter(
            $numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED
        );
    }
}
