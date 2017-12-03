<?php

// Vehicle type Routes
Route::get('/', 'HomeController@getHomepage');
Route::get('/vehicle-types', 'TypesController@index');
Route::post('/vehicle-types/store', 'TypesController@store');
Route::post('/vehicle-types/remove/{id}', 'TypesController@destroy');
Route::post('/vehicle-types/types', 'TypesController@getAllTypes');

// Service Routes
Route::get('/services', 'ServicesController@index');
Route::get('/services/vehicle-category/{id}', 'ServicesController@services');
Route::post('/services/vehicle-category/{id}', 'ServicesController@getServices');
Route::post('/service/store', 'ServicesController@store');
Route::post('/service/show/{id}', 'ServicesController@show');
Route::post('/service/vehicle-type/{id}', 'ServicesController@getServiceByType');
Route::post('/service/remove/{id}', 'ServicesController@destroy');
Route::post('/service/type/{id}', 'ServicesController@servicesByType');

//Appointment Routes
Route::get('/appointments/', 'AppointmentsController@index');
Route::get('/appointments/all-appointments', 'AppointmentsController@appointments');
Route::get('/appointments/book-appointment/', 'AppointmentsController@create');
Route::post('/appointments/book-appointment', 'AppointmentsController@store');
Route::post('/appointments/remove/{id}', 'AppointmentsController@destroy');
Route::post('/appointments/show/{id}', 'AppointmentsController@show');
Route::post('/appointments/all-appointments', 'AppointmentsController@booked');

//Vehicle Routes
Route::get('/vehicles/', 'CarsController@index');
Route::get('/vehicles/create-vehicle/', 'CarsController@create');
Route::post('/vehicles/store-vehicle', 'CarsController@store');
Route::post('/vehicles/all', 'CarsController@vehicles');
Route::post('/vehicles/remove/{id}', 'CarsController@destroy');
Route::post('/vehicles/update/{id}', 'CarsController@update');
Route::post('/vehicles/show/{id}', 'CarsController@show');
Route::post('/vehicles/customer-vehicle/{id}', 'CarsController@vehiclesByCustomer');

//Customer Routes
Route::get('/customers/', 'CustomersController@index');
Route::get('/customers/create-customer/', 'CustomersController@create');
Route::post('/customers/store-customer', 'CustomersController@store');
Route::post('/customers/all', 'CustomersController@customers');
Route::post('/customers/remove/{id}', 'CustomersController@destroy');
Route::post('/customers/update/{id}', 'CustomersController@update');
Route::post('/customers/show/{id}', 'CustomersController@show');

//Authentication routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
 