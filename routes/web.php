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

    // Quest routes
    Route::get('/quests/{id}', 'UserQuestController@show')->name('user.quest.show');
    Route::post('/quests/{id}/results', 'UserQuestController@submitResult')->name('submitResult');

});

// Route group for user with admin role
Route::group(['middleware' => 'isAdminUser'], function () {

    // Admin backend dashboard
    Route::get('/admin/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');

        // Admin backend LOCATIONS routes...
        Route::get('admin/quests','Admin\QuestController@index')->name('admin.quests.index');
        Route::get('admin/quests/create', 'Admin\QuestController@create')->name('admin.quests.create');
        Route::post('admin/quests/store', 'Admin\QuestController@store')->name('admin.quests.store');
        Route::get('admin/quests/{id}/edit', 'Admin\QuestController@edit')->name('admin.quests.edit');
        Route::patch('admin/quests/{id}/update', 'Admin\QuestController@update')->name('admin.quests.update');
        Route::delete('admin/quests/{id}/destroy', 'Admin\QuestController@destroy')->name('admin.quests.destroy');

});