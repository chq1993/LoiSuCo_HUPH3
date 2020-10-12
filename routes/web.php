<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
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
    return view('layouts.admin');
});

Route::get('/thunghiem', function () {
    return view('layouts.thunghiem');
});


Route::get('user/layouts', function () {
    return view('layouts.user');
});

// Route::get('page', function () {
//     return view('page');
// });

Route::get('login', 'Controller@login');

//Route login
Route::get('/login', 'UserController@show_login')->name('user.login');
Route::post('/login', 'UserController@login')->name('user.check_login');

//-------------------------GROUP CHECK_AUTH----------------------------
Route::group(['middleware' => 'check_auth'], function () {
    // Route của user
    Route::get('/logout', 'UserController@logout')->name('user.logout');
    Route::get('/dashboard', 'UserController@show_dashboard');
    // public



    Route::post('user/updaterole', 'UserController@updaterole')->name('user.updaterole');
    Route::get('/', function () {
        return view('layouts.admin');
    });

    //-------------------------GROUP CHECK_USERTYPE----------------------------
    Route::group(['middleware' => 'check_usertype'], function () {
        Route::get('user/changeStatus', 'UserController@changeStatus')->name('user.changeStatus');
        Route::resource('user', 'UserController');
        Route::get('user/changeRole', 'UserController@choose_role')->name('user.changerole');
        Route::resource('division-manage', 'DivisionManageController');
        Route::resource('position-manage', 'PositionManageController');
        Route::resource('role-manage', 'RoleController');
        Route::resource('job', 'JobController');

        Route::resource('role-manage', 'RoleController');
        Route::get('/job/{id}', [JobController::class,'getJobById'])->name('job.getJobById');
        Route::get('/', function () {
            return view('layouts.admin');
        });
    });
});

