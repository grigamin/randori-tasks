<?php

class CastleTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        $_GET = [];
    }

    public function testWithAbcd()
    {
        $expected =<<<EXPECTED
abcd      dcba
 bcda    adcb 
  cdab  badc  
   dabccbad   
EXPECTED;

        $this->assertEquals($expected, trim($this->buildStairs('abcd'), PHP_EOL));
    }

    public function testWithCodeGolf()
    {
        $expected =<<<EXPECTED
Code golf                flog edoC
 ode golfC              Cflog edo 
  de golfCo            oCflog ed  
   e golfCod          doCflog e   
     golfCode        edoCflog     
     golfCode        edoCflog     
      olfCode g    g edoCflo      
       lfCode go  og edoCfl       
        fCode gollog edoCf        
EXPECTED;

        $this->assertEquals($expected, trim($this->buildStairs('Code golf'), PHP_EOL));
    }

    private function buildStairs($inputStr)
    {
        ob_start();

        $_GET['s'] = $inputStr;

        include __DIR__ . '/../castle-stairways.php';

        return ob_get_clean();
    }
}
