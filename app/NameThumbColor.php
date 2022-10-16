<?php
namespace App;

class NameThumbColor {

    private $colors = [
        "A" => "#EFBF00",
        "B" => "#017A05",
        "C" => "#009C39",
        "D" => "#9C4E00",
        "E" => "#B18151",
        "F" => "#0077A4",
        "G" => "#115700",
        "H" => "#003F57",
        "I" => "#310057",
        "J" => "#57002B",
        "K" => "#BB0000",
        "L" => "#0BA283",
        "M" => "#001B72",
        "N" => "#00725B",
        "O" => "#B28141",
        "P" => "#415FB2",
        "Q" => "#8141B2",
        "R" => "#41B281",
        "S" => "#7037E5",
        "T" => "#737FBB",
        "U" => "#BB7A73",
        "V" => "#870000",
        "W" => "#877E00",
        "X" => "#368700",
        "Y" => "#008762",
        "Z" => "#006787",
    ];

    public function getColor($letter)
    {
        $color = $this->colors[$letter];
        return $color;
    }
}