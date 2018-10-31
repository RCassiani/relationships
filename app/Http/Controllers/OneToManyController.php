<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        $countries = Country::with('states')->get();
        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";
            $states = $country->states;

            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }
            echo "<hr>";
        }

    }

    public function oneToManyTwo()
    {
        $countries = Country::with('states')->get();
        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";
            $states = $country->states;

            foreach ($states as $state) {
                echo ")<br>{$state->initials} - {$state->name} (";
                foreach($state->cities as $city){
                    echo "{$city->name} | ";
                }
            }
            echo ")<hr>";
        }

    }

    public function manytoOne()
    {
        $state = State::all();
        foreach ($state as $state_v) {
            echo "{$state_v->initials} - {$state_v->name}<br>";
            $country = $state_v->country;

            echo "<b>{$country->name}</b>";
            echo "<hr>";
        }

    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name' => 'Ceará',
            'initials' => 'CE'
        ];

        $country = Country::find(1);
        $country->states()->create($dataForm);

    }

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
            'country_id' => '1'
        ];

        State::create($dataForm);

    }

    public function hasManyThrough()
    {
        $country = Country::find(2);
        echo "<b>{$country->name}</b><br>";
        $cities = $country->cities;
        foreach($cities as $city){
            echo "$city->name | ";
        }
        echo "<br>Total Cidades: {$cities->count()}";
    }
}
