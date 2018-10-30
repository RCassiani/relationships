<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        $country = Country::where('name','Brasil')->get()->first();
        echo $country->name;

        $location = $country->location;
        echo "<hr>Latitude: {$location->latitude}<br>";
        echo "<hr>Longitude: {$location->longitude}";
    }

    public function oneToOneInverse()
    {
        $latitude = 123;
        $longitude = 321;

        $location = Location::where('latitude',$latitude)
                            ->where('longitude',$longitude)
                            ->get()
                            ->first();
        $country = $location->country;
        echo $country->name;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Belgica',
            'latitude' => '159',
            'longitude' => '951',
        ];

        $country = Country::create($dataForm);
        $location = $country->location()->create($dataForm);
    }
}
