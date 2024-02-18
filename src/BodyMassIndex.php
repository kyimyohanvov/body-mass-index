<?php

namespace Kyimyohan\BodyMassIndex;

class BodyMassIndex
{
    protected static $bmi;

    public static function calculate($height, $weight): BodyMassIndex
    {
        $bodyMassIndex = new static();

        $height = $bodyMassIndex->splitHeightIntoFeetAndInch($height);

        self::$bmi = $bodyMassIndex->bodyMassIndexFormula($height, $weight);

        return $bodyMassIndex;
    }

    public function getResult(): string
    {
        if ($this->bodyMassBelow(18.5)) {
            return "underweight";
        } else if ($this->bodyMassBetween(18.5, 24.9)) {
            return "healthy";
        } else if ($this->bodyMassBetween(25, 30)) {
            return "overweight";
        } else {
            return "obese";
        }
    }

    private function splitHeightIntoFeetAndInch($height): array
    {
        $height_arr = explode(".", $height);
        $ft = $height_arr[0];
        $in = $height_arr[1] ?? 0;
        return ["feet" => $ft, "inch" => $in];
    }

    private function bodyMassIndexFormula($height, $weight): float
    {
        return ($weight / pow(($height['feet'] * 12) + $height['inch'], 2)) * 703;
    }

    private function bodyMassBelow($bmi): bool
    {
        return self::$bmi < $bmi;
    }

    private function bodyMassBetween($bmiStart, $bmiEnd): bool
    {
        return self::$bmi >= $bmiStart && self::$bmi <= $bmiEnd;
    }
}
