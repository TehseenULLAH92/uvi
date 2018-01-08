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

Auth::routes();
// Administration LEVEL 1
Route::group(['prefix' => 'admin'], function () {
  Route::get('dashboard', 'admin\AdminController@index');
  //Route::get('dashboard', 'admin\DashboardController@index');
  Route::get('dashboard', 'admin\DashboardController@index');
  Route::get('companies', 'admin\CompaniesController@index');
  Route::get('companies/add', 'admin\CompaniesController@add');
  Route::get('companies/edit/{company_id}', 'admin\CompaniesController@edit');
  Route::get('companies/profile/{company_id}', 'admin\CompaniesController@company_profile');
  Route::get('companies/delete/{company_id}', 'admin\CompaniesController@delete');
  Route::get('users', 'admin\UserController@index');
  Route::get('users/add', 'admin\UserController@add');
  Route::get('users/delete/{driver_id}', 'admin\UserController@delete');
  Route::get('/drivers', 'admin\DriversController@index');
  Route::get('drivers/add', 'admin\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'admin\DriversController@edit');
  Route::get('drivers/delete/{driver_id}', 'admin\DriversController@delete');
  Route::get('submissions', 'admin\SubmissionsController@index');
  Route::get('account', 'admin\UserController@account');
  Route::get('profile', 'admin\UserController@profile');
  Route::get('users/add_user/{id}', 'admin\UserController@add_user_to_company_view');

  // post data
  Route::post('add_new_companies', 'admin\CompaniesController@add_new_companies');
  Route::post('companies/update/{company_id}', 'admin\CompaniesController@update');
  Route::post('add_new_user', 'admin\UserController@add_new_user');
  Route::post('add_new_driver', 'admin\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'admin\DriversController@update');
  Route::post('updatePassword', 'admin\UserController@updatePassword');
  Route::post('updateProfile', 'admin\UserController@updateProfile');
  Route::post('users/add_user_to_company/{id}', 'admin\UserController@add_user_to_company');

});
// Car Rental Companies LEVEL 2A
Route::group(['prefix' => 'crcompanies'], function () {
  Route::get('dashboard', 'cr\CrController@index');
  Route::get('users', 'cr\UserController@index');
  Route::get('users/add', 'cr\UserController@add');
  Route::get('drivers/add', 'cr\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'cr\DriversController@edit');
  Route::get('drivers/delete/{driver_id}', 'cr\DriversController@delete');
  Route::get('/drivers', 'cr\DriversController@index');
  Route::get('/reports', 'cr\ReportsController@index');
  Route::get('account', 'cr\UserController@account');
  Route::get('profile', 'cr\UserController@profile');

  Route::post('add_new_driver', 'cr\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'cr\DriversController@update');
  Route::post('add_new_user', 'cr\UserController@add_new_user');
  Route::post('updatePassword', 'cr\UserController@updatePassword');
  Route::post('updateProfile', 'cr\UserController@updateProfile');
});
// Insurance Companies LEVEL 2B
Route::group(['prefix' => 'incompanies'], function () {
  Route::get('/', 'in\InController@index');
  Route::get('dashboard', 'in\InController@index');
  Route::get('/drivers', 'in\DriversController@index');
  Route::get('drivers/add', 'in\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'in\DriversController@edit');
  Route::get('drivers/delete/{driver_id}', 'in\DriversController@delete');
  Route::get('reports', 'in\ReportsController@index');
  Route::get('account', 'in\InController@account');
  Route::get('profile', 'in\InController@profile');

  //post data
  Route::post('add_new_driver', 'in\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'in\DriversController@update');
  Route::post('updatePassword', 'in\InController@updatePassword');
  Route::post('updateProfile', 'in\InController@updateProfile');
});

// Car Rental Employees LEVEL 3
Route::group(['prefix' => 'cremployees'], function () {
  Route::get('/dashboard', 'cre\CreController@index');
  Route::get('reports', 'cre\ReportsController@index');
  Route::get('account', 'cre\CreController@account');
  Route::get('profile', 'cre\CreController@profile');
  Route::get('/drivers', 'cre\DriversController@index');
  Route::get('drivers/add', 'cre\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'cre\DriversController@edit');
  Route::get('drivers/view/{driver_id}', 'cre\DriversController@view');
  Route::get('drivers/delete/{driver_id}', 'cre\DriversController@delete');

  Route::post('add_new_driver', 'cre\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'cre\DriversController@update');
  Route::post('updatePassword', 'cre\CreController@updatePassword');
  Route::post('updateProfile', 'cre\CreController@updateProfile');

});
