<?php


class RomanNumeralsTest extends \PHPUnit\Framework\TestCase
{
    /** @var RomanNumeralsGenerator */
    private $generator;

    public function setUp()
    {
        $this->generator = new RomanNumeralsGenerator();
    }

    public function testCheckInvalidInputs()
    {
        $this->assertEquals('', $this->generator->generate(0));
        $this->assertEquals('', $this->generator->generate(-1));
        $this->assertEquals('', $this->generator->generate('thousand'));
        $this->assertEquals('', $this->generator->generate(3.5));
    }
    public function testValues()
    {
        $testValues = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
            13 => 'XIII',
            14 => 'XIV',
            15 => 'XV',
            16 => 'XVI',
            17 => 'XVII',
            18 => 'XVIII',
            19 => 'XIX',
            20 => 'XX',
            40  => 'XL',
            45 => 'VL',
            50 => 'L',
            55 => 'LV',
            90 => 'XC',
            100 => 'C',
            110 => 'CX',
            150 => 'CL',
            250 => 'CCL',
            350 => 'CCCL',
            400 => 'CD',
            450 => 'CDL',
            500 => 'D',
            550 => 'DL',
            900 => 'CM',
            1000 => 'M',
            1146 => 'MCXLVIII',
            1569 => 'MDLXIX',
            1990 => 'MCMXC',
            2017 => 'MMXVII',
        ];

        foreach ($testValues as $input => $output) {
            $this->assertEquals($output, $this->generator->generate($input), 'Invalid value for ' . $input);
        }
    }
}
