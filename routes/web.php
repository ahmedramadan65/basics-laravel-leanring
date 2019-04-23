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
use App\Company;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/createcomp','companyCont@createcompany')->name('create.company');
Route::get('/deletecomp/{id}','companyCont@deletecompany')->name('delete.company');
Route::get('/updatepage/{id}','companyCont@updatepage')->name('update.page');
Route::post('/updatecomp/{id}','companyCont@updatecompany')->name('update.company');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createcompany', function()
{
    return view('createcompany');
});

Route::post('/createemp','employeeCont@createemployee')->name('create.employee');
Route::get('/deleteemp/{id}','employeeCont@deleteemployee')->name('delete.employee');
Route::get('/updatepageemp/{id}','employeeCont@updatepage')->name('update.pageemp');
Route::post('/updateemp/{id}','employeeCont@updateemployee')->name('update.employee');
Route::get('/createemployee', function()
{
    $companines = Company::latest()->get();
    return view('createemployee')->with('companines',$companines);
});
