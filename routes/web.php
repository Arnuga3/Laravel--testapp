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

Route::get('/', function () {
    return view('welcome');
});

// Basic Auth
Route::get('/admin', function () {
    return view('admin.profile');
})->middleware('auth.basic');

// CRUD Routes
Route::resources([
    'companies' => 'CompanyController',
    'employees' => 'EmployeeController'
]);

// Additional routes to upload/delete images
Route::put('companies/image/{id}', 'CompanyController@uploadImage')->name('companies.uploadImage');
Route::delete('companies/image/{id}', 'CompanyController@deleteImage')->name('companies.deleteImage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
