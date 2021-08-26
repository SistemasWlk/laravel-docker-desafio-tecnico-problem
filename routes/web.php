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

// Route::get('/', function () {
//     echo "okay";
//     //return view('welcome');
// });

Route::get('/',                             'Site\SiteController@index')->name('principal'); 
Route::get('resultadocorredororderbyid',    'DesafioTecnico\ResultadoCorredorController@orderByIdade')->name('orderbyidade'); 

Route::resource('problemone',               'DesafioTecnico\ProblemOneController');
Route::resource('problemfour',              'DesafioTecnico\ProblemFourController');

Route::resource('clienttype',               'DesafioTecnico\ClientTypeController');
Route::resource('client',                   'DesafioTecnico\ClientController');
Route::resource('book',                     'DesafioTecnico\BookController');
Route::resource('loan',                     'DesafioTecnico\LoanController');
