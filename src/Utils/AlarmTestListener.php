<?php

namespace Utils;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\BaseTestListener;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\Warning;

class AlarmTestListener extends BaseTestListener
{

    private $errorsCount = 0;

    /**
     * An error occurred.
     *
     * @param Test $test
     * @param \Exception $e
     * @param float $time
     */
    public function addError(Test $test, \Exception $e, $time)
    {
        $this->errorsCount++;
    }

    /**
     * A warning occurred.
     *
     * @param Test $test
     * @param Warning $e
     * @param float $time
     */
    public function addWarning(Test $test, Warning $e, $time)
    {
        $this->errorsCount++;
    }

    /**
     * A failure occurred.
     *
     * @param Test $test
     * @param AssertionFailedError $e
     * @param float $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        $this->errorsCount++;
    }

    public function __destruct()
    {
        if ($this->errorsCount) {
            $command = "echo -e 'A' > /dev/ttyAMC0";
        } else {
            $command = " echo -e 'B' > /dev/ttyAMC0";
        }

//        exec($command);
    }
}
