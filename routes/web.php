<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//One to One
$this->get('one-to-one','OneToOneController@oneToOne');
$this->get('one-to-one-inverse','OneToOneController@oneToOneInverse');
$this->get('one-to-one-insert','OneToOneController@oneToOneInsert');

//One to Many
$this->get('one-to-many','OneToManyController@oneToMany');
$this->get('many-to-one','OneToManyController@manyToOne');
//$this->get('one-to-one-insert','OneToOneController@oneToOneInsert');


Route::get('/', function () {
    return view('welcome');
});
