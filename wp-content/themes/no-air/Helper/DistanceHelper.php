<?php

use JetBrains\PhpStorm\Pure;

class DistanceHelper
{
    const CONVERTER_MILES_TO_KM = 1.609;

    /**
     * Calc Distance from point A to point B in miles
     *
     * @param array $pointA The first point
     * @param array $pointB The second point
     *
     * @return float|int
     */
    public static function calcDistance(array $pointA, array $pointB): float|int
    {
        $radius      = 3958;      // Earth's radius (miles)
        $deg_per_rad = 57.29578;  // Number of degrees/radian (for conversion)

        return ($radius * pi() * sqrt(
                ($pointA['lat'] - $pointB['lat'])
                * ($pointA['lat'] - $pointB['lat'])
                + cos($pointA['lat'] / $deg_per_rad)  // Convert these to
                * cos($pointA['lat'] / $deg_per_rad)  // radians for cos()
                * ($pointA['lng'] - $pointB['lng'])
                * ($pointA['lng'] - $pointB['lng'])
            ) / 180);  // Returned using the units used for $radius.
    }

    /**
     * Calc Distance from point A to point B in kilometers
     *
     * @param array $pointA The first point
     * @param array $pointB The second point
     *
     * @return float|int
     */
    #[Pure] public static function calcDistanceInKm(array $pointA, array $pointB): float|int
    {
        $distance = self::calcDistance($pointA, $pointB);

        return $distance * self::CONVERTER_MILES_TO_KM;
    }
}