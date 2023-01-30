<?php

require_once(__DIR__.'/../vendor/autoload.php');

use GuzzleHttp\Client as Client;

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
        $query = http_build_query([
            'components'=> 'country:' . self::COUNTRY . '|postal_code:' . $zip,
            'sensor'=> 'false',
            'key' => $this->key
        ]);
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?' . $query;

        try {
            $ch = curl_init();

            // Check if initialization had gone wrong*
            if ($ch === false) {
                throw new Exception('failed to initialize');
            }

            // Better to explicitly set URL
            curl_setopt($ch, CURLOPT_URL, $url);
            // That needs to be set; content will spill to STDOUT otherwise
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // Set more options

            $content = curl_exec($ch);

            // Check the return value of curl_exec(), too
            if ($content === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }

            // Check HTTP return code, too; might be something else than 200
            $httpReturnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            /* Process $content here */

        } catch(Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);

        } finally {
            // Close curl handle unless it failed to initialize
            if (is_resource($ch)) {
                curl_close($ch);
            }
        }


        /*try{
            $c = new Client(['base_uri' => 'https://maps.googleapis.com']);
            $response = $c->get($url);
            $result_string = $response->getBody();
        }catch (\GuzzleHttp\Exception\ClientException $exception){
            var_dump($exception->getMessage());
        }

        var_dump($result_string);
        die();*/


       /* $result = json_decode($result_string, true);*/

        if (!empty($result['status']) && $result['status'] === 'OK') {
            return $result['results'][0]['geometry']['location'];
        } else {
            return [];
        }
    }
}