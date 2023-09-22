<?php

namespace App;

class BottlesSong
{
    public function sing()
    {
        return $this->verses(99, 0);
    }

    public function verses($start, $end)
    {
        return implode("\n", array_map(
            fn($number) => $this->verse($number),
            range($start, $end)
        ));
    }

    public function verse($number)
    {
        return
            ($number === 0 ? "No more" : ($number)) . ($number === 1 ? " bottle" : " bottles") . " of beer on the wall\n" .
            ($number === 0 ? "No more" : ($number)) . ($number === 1 ? " bottle" : " bottles") . " of beer\n" .
            ($number === 0 ? "Go to the store and buy some more\n" : "Take one down and pass it around\n") .
            ($number === 1 ? "No more" : ($number === 0 ? 99 : $number - 1)) . ($number === 2 ? " bottle" : " bottles") . " of beer on the wall\n";
    }
}
