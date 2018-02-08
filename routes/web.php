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
//     return view('welcome');
// });
Route::get('/', 'Admin\DashboardController@index');

Auth::routes();
// Administration LEVEL 1
Route::group(['prefix' => 'admin'], function () {
  //Route::get('dashboard', 'admin\DashboardController@index');
  Route::get('dashboard', 'Admin\DashboardController@index');
  Route::get('companies', 'Admin\CompaniesController@index');
  Route::get('companies/add', 'Admin\CompaniesController@add');
  Route::get('companies/edit/{company_id}', 'Admin\CompaniesController@edit');
  Route::get('companies/profile/{company_id}', 'Admin\CompaniesController@company_profile');
  Route::get('companies/delete/{company_id}', 'Admin\CompaniesController@delete');
  Route::get('users', 'Admin\UserController@index');
  Route::get('users/add', 'Admin\UserController@add');
  Route::get('users/edit/{id}', 'Admin\UserController@edit');
  Route::get('users/delete/{driver_id}', 'Admin\UserController@delete');
  Route::get('/drivers', 'Admin\DriversController@index');
  Route::get('drivers/add', 'Admin\DriversController@add');
  Route::get('drivers/add/{company_id}', 'Admin\DriversController@add_company_driver');
  Route::get('drivers/edit/{driver_id}', 'Admin\DriversController@edit');
  Route::get('drivers/delete/{driver_id}', 'Admin\DriversController@delete');
  Route::get('submissions', 'Admin\SubmissionsController@index');
  Route::get('account', 'Admin\UserController@account');
  Route::get('profile', 'Admin\UserController@profile');
  Route::get('users/add_user/{id}', 'Admin\UserController@add_user_to_company_view');
  Route::get('reports/drivers', 'Admin\ReportController@index');
  Route::get('reports/companies', 'Admin\ReportController@cindex');
  Route::get('submissions_reports/drivers', 'Admin\ReportController@submissions_drivers');
  Route::get('submissions_reports/companies', 'Admin\ReportController@submissions_companies');
  // Route::get('reports/add', 'Admin\ReportController@add');
  Route::get('reports/add_report/{id}', 'Admin\ReportController@add_new_report_view');
  Route::get('reports/add_creport/{id}', 'Admin\ReportController@add_new_creport_view');
  Route::post('driver_report/update_driver_report', 'Admin\ReportController@update_driver_report');
  Route::post('company_report/update_company_report', 'Admin\ReportController@update_company_report');

  Route::get('driver_report/edit/{id}', 'Admin\ReportController@edit_driver_report');
  Route::get('company_report/edit/{id}', 'Admin\ReportController@edit_company_report');
  //Route::get('get_count_report/{id}', 'Admin\DashboardController@get_count_report');

  // post data
  Route::post('add_new_companies', 'Admin\CompaniesController@add_new_companies');
  Route::post('companies/update/{company_id}', 'Admin\CompaniesController@update');
  Route::post('add_new_user', 'Admin\UserController@add_new_user');
  Route::post('users/update_user', 'Admin\UserController@update_user');
  Route::post('add_new_driver', 'Admin\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'Admin\DriversController@update');
  Route::post('updatePassword', 'Admin\UserController@updatePassword');
  Route::post('updateProfile', 'Admin\UserController@updateProfile');
  Route::post('users/add_user_to_company/{id}', 'Admin\UserController@add_user_to_company');
  Route::post('drivers/add_driver_to_company', 'Admin\DriversController@add_driver_to_company');
  //Route::post('add_new_report', 'Admin\ReportController@add_new_report');
  Route::post('reports/add_new_report/{id}', 'Admin\ReportController@add_new_report_id');
  Route::post('reports/add_new_creport/{id}', 'Admin\ReportController@add_new_creport_id');

});
// Car Rental Companies LEVEL 2A
Route::group(['prefix' => 'crcompanies'], function () {
  Route::get('dashboard', 'Cr\CrController@index');
  Route::get('users', 'Cr\UserController@index');
  Route::get('users/add', 'Cr\UserController@add');
  Route::get('drivers/add', 'Cr\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'Cr\DriversController@edit');
  Route::get('drivers/delete/{driver_id}', 'Cr\DriversController@delete');
  Route::get('/drivers', 'Cr\DriversController@index');
  Route::get('/reports', 'Cr\ReportsController@index');
  Route::get('account', 'Cr\UserController@account');
  Route::get('profile', 'Cr\UserController@profile');
  Route::get('reports', 'Cr\ReportController@index');
  // Route::get('reports/add', 'Cr\ReportController@add');
  Route::get('reports/add_report/{id}', 'Cr\ReportController@add_new_report_view');

  Route::post('add_new_driver', 'Cr\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'Cr\DriversController@update');
  Route::post('add_new_user', 'Cr\UserController@add_new_user');
  Route::post('updatePassword', 'Cr\UserController@updatePassword');
  Route::post('updateProfile', 'Cr\UserController@updateProfile');
  //Route::post('add_new_report', 'Cr\ReportController@add_new_report');
  Route::post('reports/add_new_report/{id}', 'Cr\ReportController@add_new_report_id');
});
// Insurance Companies LEVEL 2B
Route::group(['prefix' => 'incompanies'], function () {
  Route::get('/', 'In\InController@index');
  Route::get('dashboard', 'In\InController@index');
  Route::get('/drivers', 'In\DriversController@index');
  Route::get('drivers/add', 'In\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'In\DriversController@edit');
  Route::get('drivers/delete/{driver_id}', 'In\DriversController@delete');
  Route::get('reports', 'In\ReportsController@index');
  Route::get('account', 'In\InController@account');
  Route::get('profile', 'In\InController@profile');
  Route::get('reports', 'In\ReportController@index');
  // Route::get('reports/add', 'In\ReportController@add');
  Route::get('reports/add_report/{id}', 'In\ReportController@add_new_report_view');

  //post data
  Route::post('add_new_driver', 'In\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'In\DriversController@update');
  Route::post('updatePassword', 'In\InController@updatePassword');
  Route::post('updateProfile', 'In\InController@updateProfile');
  //Route::post('add_new_report', 'In\ReportController@add_new_report');
  Route::post('reports/add_new_report/{id}', 'In\ReportController@add_new_report_id');
});

// Car Rental Employees LEVEL 3
Route::group(['prefix' => 'cremployees'], function () {
  Route::get('/dashboard', 'Cre\CreController@index');
  Route::get('reports', 'Cre\ReportsController@index');
  Route::get('account', 'Cre\CreController@account');
  Route::get('profile', 'Cre\CreController@profile');
  Route::get('/drivers', 'Cre\DriversController@index');
  Route::get('drivers/add', 'Cre\DriversController@add');
  Route::get('drivers/edit/{driver_id}', 'Cre\DriversController@edit');
  Route::get('drivers/view/{driver_id}', 'Cre\DriversController@view');
  Route::get('drivers/delete/{driver_id}', 'Cre\DriversController@delete');

  Route::post('add_new_driver', 'Cre\DriversController@add_new_driver');
  Route::post('drivers/update/{driver_id}', 'Cre\DriversController@update');
  Route::post('updatePassword', 'Cre\CreController@updatePassword');
  Route::post('updateProfile', 'Cre\CreController@updateProfile');

});
