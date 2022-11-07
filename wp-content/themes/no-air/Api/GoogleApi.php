<?php

class GoogleApi
{
    public const COUNTRY = 'BE';

    private string $key;

    /**
     * Google Api Constructor
     */
    public function __construct()
    {
        $this->key = GOOGLE_KEY;

    }


    /**
     * Get coordinate points from zip code
     *
     * @param string $zip Zip code
     *
     * @return array
     */
    public function getCoordinateFromZipCode(string $zip): array
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json'
            . '?components=' . urlencode('country:' . self::COUNTRY . '|postal_code:' . $zip)
            . '&sensor=' . false
            . '&key=' . $this->key;


        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);

        return $result['results'][0]['geometry']['location'];
    }
}