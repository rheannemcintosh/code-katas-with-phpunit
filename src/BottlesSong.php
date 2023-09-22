<?php

namespace App;

class BottlesSong
{

    public function verse($number)
    {
        return
            "$number bottles of beer on the wall\n" .
            "$number bottles of beer\n" .
            "Take one down and pass it around\n" .
            ($number - 1) . " bottles of beer on the wall\n";
    }
}
