<?php
declare(strict_types=1);

namespace Xarser;

final class Ine
{
    private $ine;

    public function __construct(string $municipalityCode)
    {
        $controlDigit = $this->generateControlDigit($municipalityCode);
        $this->ine = $municipalityCode . $controlDigit;
    }

    private function generateControlDigit($municipalityCode): ?int
    {
        $magic = [
            'A' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            'B' => [0, 3, 8, 2, 7, 4, 1, 5, 9, 6],
            'C' => [0, 2, 4, 6, 8, 1, 3, 5, 7, 9]
        ];
        $pattern = ['C','B','A','C','B'];
        $i = 0;
        $sum = 0;

        foreach($pattern as $key) {
            $sum += $magic[$key][$municipalityCode[$i]];
            $i++;
        }

        if ($sum % 10 === 0) {
            return 0;
        }
        if ($sum < 10) {
            return 10 - $sum;
        }
        if ($sum < 20) {
            return 20 - $sum;
        }
        if ($sum < 30) {
            return 30 - $sum;
        }
        if ($sum < 40) {
            return 40 - $sum;
        }
        if ($sum < 50) {
            return 50 - $sum;
        }
        if ($sum < 60) {
            return 60 - $sum;
        }
        if ($sum < 70) {
            return 70 - $sum;
        }
        if ($sum < 80) {
            return 80 - $sum;
        }
    }

    public function ine(): string
    {
        return $this->ine;
    }
}
