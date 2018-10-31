<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'Pedreira')->get()->first();
        echo "<b>{$city->name}</b>";

        $companies = $city->companies;
        foreach ($companies as $company) {
            echo "<br>$company->name";
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::find(1);
        echo "<b>{$company->name}</b>";

        $cities = $company->cities;
        foreach ($cities as $city) {
            echo "<br>$city->name";
        }
    }

    public function manyToManyInsert()
    {
        $dataForm = [7];
        $company = Company::find(1);
        echo "<b>{$company->name}</b>";

        //$company->cities()->attach($dataForm);
        //$company->cities()->sync($dataForm);
        $company->cities()->detach($dataForm);

        $cities = $company->cities;
        foreach ($cities as $city) {
            echo "<br>$city->name";
        }
    }
}
