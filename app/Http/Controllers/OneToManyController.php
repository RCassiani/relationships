<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";
            $states = $country->states;

            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }
            echo "<hr>";
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
}
