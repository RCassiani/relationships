<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        $cities = City::with('comments')->get();
        foreach ($cities as $city){
            echo "<b>{$city->name}</b>";

            $comments = $city->comments;
            foreach ($comments as $comment) {
                echo "<br>{$comment->description}";
            }
            echo "<hr>";
        }
    }

    public function polymorphicInsert()
    {
        $city = City::where('name','Novo Hamburgo')->get()->first();
        echo $city->name;

        $comment = $city->comments()->create([
            'description' => "Old Comment {$city->name} ".date('Y-m-d H:i:s')
        ]);
    }
}
