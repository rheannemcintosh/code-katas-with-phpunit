<?php

namespace App;

class GildedRose
{
    private static $items = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Conjured Mana Cake' => Conjured::class,
    ];

    public static function of($name, $quality, $sellIn)
    {
        $class = self::$items[$name];

        return new $class($quality, $sellIn);
    }
}
