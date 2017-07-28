<?php


class CastleFractalTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        $_GET = [];
    }

    public function testFractal()
    {
        $output =<<<CASTLE
* *   * *         * *   * *
***   ***         ***   ***
*********         *********
***************************
CASTLE;

        $this->assertEquals($output, trim($this->draw(4), PHP_EOL));
    }

    private function draw($iterations)
    {
        ob_start();

        $_GET['i'] = $iterations;

        include __DIR__ . '/../solution.php';

        return ob_get_clean();
    }
}
