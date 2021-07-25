<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Weather;
use App\Services\SearchWeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * @return array
     */
    public function index()
    {
        $cites= Weather::all()->toArray();
        return array_reverse($cites);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $user = auth()->user()->id;
        $address = $request->address;
        if($address){
            $info = SearchWeatherService::getWeather($address);
            $city = new Weather([
                'name' => $request->address,
                'user_id' => $user,
                'weather' => $info->weather_box->summary
            ]);
            $city->save();
            return response()->json('The weather successfully added',200);
        }else{
            return response()->json('You do not selected', 500);
        }

    }
}
