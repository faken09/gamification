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





// Registration Routes...
Route::group(['middleware' => 'guest'], function () {
Route::get('/', function () { return view('welcome'); });
});

Auth::routes();


// Route group for user logged in
Route::group(['middleware' => 'auth'], function () {
// Home page
    Route::get('/home/{name}', 'HomeController@index')->name('home');

//  Characters routes...
    Route::get('character/creation', 'CharacterController@create')->name('character.create');
    Route::post('character/save', 'CharacterController@store')->name('character.store');
    Route::get('character/{name}', 'CharacterController@show')->name('character.show');
});

// Route group for user with admin role
Route::group(['middleware' => 'isAdminUser'], function () {

    // Admin backend dashboard
    Route::get('/admin/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
        // Admin backend LOCATIONS routes...
        Route::get('admin/locations','Admin\LocationController@index')->name('admin.locations.index');
        Route::get('admin/locations/create', 'Admin\LocationController@create')->name('admin.locations.create');
        Route::post('admin/locations/store', 'Admin\LocationController@store')->name('admin.locations.store');
        Route::get('admin/locations/{id}/edit', 'Admin\LocationController@edit')->name('admin.locations.edit');
        Route::patch('admin/locations/{id}/update', 'Admin\LocationController@update')->name('admin.locations.update');
        Route::delete('admin/locations/{id}/destroy', 'Admin\LocationController@destroy')->name('admin.locations.destroy');

        // Admin backend LOCATIONS routes...
        Route::get('admin/quests','Admin\QuestController@index')->name('admin.quests.index');
        Route::get('admin/quests/create', 'Admin\QuestController@create')->name('admin.quests.create');
        Route::post('admin/quests/store', 'Admin\QuestController@store')->name('admin.quests.store');
        Route::get('admin/quests/{id}/edit', 'Admin\QuestController@edit')->name('admin.quests.edit');
        Route::patch('admin/quests/{id}/update', 'Admin\QuestController@update')->name('admin.quests.update');
        Route::delete('admin/quests/{id}/destroy', 'Admin\QuestController@destroy')->name('admin.quests.destroy');

        // Admin backend LOCATIONS routes...
        Route::get('admin/enemies','Admin\EnemyController@index')->name('admin.enemies.index');
        Route::get('admin/enemies/create', 'Admin\EnemyController@create')->name('admin.enemies.create');
        Route::post('admin/enemies/store', 'Admin\EnemyController@store')->name('admin.enemies.store');
        Route::get('admin/enemies/{id}/edit', 'Admin\EnemyController@edit')->name('admin.enemies.edit');
        Route::patch('admin/enemies/{id}/update', 'Admin\EnemyController@update')->name('admin.enemies.update');
        Route::delete('admin/enemies/{id}/destroy', 'Admin\EnemyController@destroy')->name('admin.enemies.destroy');
});