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

Auth::routes();

Route::get('/', ['as' =>'welcome', 'uses' => 'HomeController@welcome']);
Route::get('/home', ['as' =>'home', 'uses' => 'HomeController@index']);

Route::group(['middleware' => 'auth'], function () {
   Route::resources([
       'companies' => 'CompaniesController',
       'employees' => 'EmployeesController',
   ]);

   Route::post('companies/data', ['as' =>'companies.data', 'uses' => 'CompaniesController@data']);
   Route::post('employees/data', ['as' =>'employees.data', 'uses' => 'EmployeesController@data']);
   Route::get('lang/{lang}', function($lang) {
      if (array_key_exists($lang, config('languages'))) {
          Session::put('applocale', $lang);
      }
      return Redirect::back();
   })->name('lang');
});
