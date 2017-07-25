<?php

class Game
{
    private $rolls = [];

    private $currentRoll = 0;

    public function roll($pins)
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    public function score()
    {
        $score = 0;
        $frameIndex = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            $score += $this->rolls[$frameIndex];

            if ($this->isStrike($frameIndex)) {
                $score += $this->strikeBonus($frameIndex);

                $frameIndex++;
                continue;
            }

            if (isset($this->rolls[$frameIndex + 1])) {
                $score += $this->spareBonus($frameIndex);

                if ($this->isSpare($frameIndex)) {
                    $score += $this->rolls[$frameIndex + 2];
                }
            }

            $frameIndex += 2;
        }

        return $score;
    }

    /**
     * @param int $frameIndex
     * @return bool
     */
    protected function isSpare($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
    }

    /**
     * @param int $frameIndex
     * @return bool
     */
    protected function isStrike($frameIndex)
    {
        return $this->rolls[$frameIndex] === 10;
    }

    /**
     * @param int $frameIndex
     * @return mixed
     */
    protected function strikeBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
    }

    /**
     * @param int $frameIndex
     * @return mixed
     */
    protected function spareBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 1];
    }

}
