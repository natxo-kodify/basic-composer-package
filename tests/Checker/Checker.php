<?php

class Checker
{

    const ONES     = "Ones";
    const TWOS     = "Twos";
    const THREES   = "Threes";
    const FOURS    = "Fours";
    const FIVES    = "Fives";
    const SIXES    = "Sixes";
    const PAIR     = "Pair";
    const TWOPAIRS = "TwoPairs";
    const TRIPLES  = "Triples";
    const QUADRUPLES  = "Quadruples";


    function check($dice, $checkSection)
    {
        $varFunc = "check" . $checkSection;

        return $this->$varFunc($dice);
    }

    function checkOnes($dice)
    {
        return self::countIndividualNumbers($dice, 1);
    }

    function checkTwos($dice)
    {
        return self::countIndividualNumbers($dice, 2) * 2;
    }

    function checkThrees($dice)
    {
        return self::countIndividualNumbers($dice, 3) * 3;
    }

    function checkFours($dice)
    {
        return self::countIndividualNumbers($dice, 4) * 4;
    }

    function checkFives($dice)
    {
        return self::countIndividualNumbers($dice, 5) * 5;
    }

    function checkSixes($dice)
    {
        return self::countIndividualNumbers($dice, 6) * 6;
    }

    function checkNOfAKind($dice, $kind)
    {
        $counts = array_count_values($dice);
        foreach ($counts as $key => $repeats) {
            if ($repeats >= $kind) {
                return $key * $kind;
            }
        }

        return 0;
    }

    function checkPair($dice)
    {
        return $this->checkNOfAKind($dice, 2);
    }

    function checkTwoPairs($dice)
    {
        $numHits  = 0;
        $totCount = 0;

        $counts = array_count_values($dice);
        foreach ($counts as $key => $repeats) {
            if ($repeats == 2) {
                $numHits++;
                $totCount += $key * 2;
            }
        }

        if ($numHits < 2) {
            return 0;
        }

        return $totCount;
    }

    function checkTriples($dice)
    {
        return $this->checkNOfAKind($dice, 3);
    }

    function checkQuadruples($dice)
    {
        return $this->checkNOfAKind($dice, 4);
    }

    function countIndividualNumbers($dice, $checkValue)
    {
        return count(array_keys($dice, $checkValue));
    }


}