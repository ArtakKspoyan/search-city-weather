<?php
namespace App\Services;
use GoogleSearchResults;

class SearchWeatherService
{
    /**
     * @param $address
     * @return mixed|void
     */
    public static function getWeather($address) {
        $serpWow = new GoogleSearchResults(env("SERPWOW_API_KEY"));

        $params = [
            "q" => "weather",
            "hl" => "en",
            "location" => $address,
        ];

        $result = $serpWow->json($params);

        return $result;
    }
}
