<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name === 'normal') {
            return $this->normalTick();
        }

        if ($this->name === 'Aged Brie') {
            return $this->brieTick();
        }

        if ($this->name === 'Sulfuras, Hand of Ragnaros') {
            return $this->sulfurasTick();
        }

        if ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
            return $this->passTick();
        }
    }

    private function normalTick()
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

    private function brieTick()
    {
        $this->sellIn -= 1;
        $this->quality += 1;

        if ($this->sellIn <= 0) {
            $this->quality += 1;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }

    private function sulfurasTick()
    {
    }

    private function passTick()
    {
        $this->quality += 1;

        if ($this->sellIn <= 10) {
            $this->quality += 1;
        }

        if ($this->sellIn <= 5) {
            $this->quality += 1;
        }

        if ($this->sellIn <= 0) {
            $this->quality = 0;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }

        $this->sellIn -= 1;
    }
}
