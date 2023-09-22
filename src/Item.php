<?php

namespace App;

class Item
{
    public $quality;

    public $sellIn;

    /**
     * @param $name
     * @param $sellIn
     * @param $quality
     */
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality -= 1;

        if ($this->sellIn <=0) {
            $this->quality -= 1;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}
