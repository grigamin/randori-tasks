<?php

class GildedRoseTest extends \PHPUnit\Framework\TestCase
{
    public function testOutput()
    {
        ob_start();
        echo "OMGHAI!\n";

        $items = array(
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            // this conjured item does not work properly yet
            new Item('Conjured Mana Cake', 3, 6)
        );

        $app = new GildedRose($items);

        $days = 2;


        for ($i = 0; $i < $days; $i++) {
            echo("-------- day $i --------\n");
            echo("name, sellIn, quality\n");
            foreach ($items as $item) {
                echo $item . PHP_EOL;
            }
            echo PHP_EOL;
            $app->update_quality();
        }

        $actual = ob_get_clean();

        $expected =<<<EXPECTED
OMGHAI!

-------- day 0 --------
name, sellIn, quality
+5 Dexterity Vest, 10, 20
Aged Brie, 2, 0
Elixir of the Mongoose, 5, 7
Sulfuras, Hand of Ragnaros, 0, 80
Sulfuras, Hand of Ragnaros, -1, 80
Backstage passes to a TAFKAL80ETC concert, 15, 20
Backstage passes to a TAFKAL80ETC concert, 10, 49
Backstage passes to a TAFKAL80ETC concert, 5, 49
Conjured Mana Cake, 3, 6

-------- day 1 --------
name, sellIn, quality
+5 Dexterity Vest, 9, 19
Aged Brie, 1, 1
Elixir of the Mongoose, 4, 6
Sulfuras, Hand of Ragnaros, 0, 80
Sulfuras, Hand of Ragnaros, -1, 80
Backstage passes to a TAFKAL80ETC concert, 14, 21
Backstage passes to a TAFKAL80ETC concert, 9, 50
Backstage passes to a TAFKAL80ETC concert, 4, 50
Conjured Mana Cake, 2, 5

EXPECTED;

        $this->assertEquals(
            str_replace("\n", "", $expected),
            str_replace("\n", "", $actual)
        );
    }
}
