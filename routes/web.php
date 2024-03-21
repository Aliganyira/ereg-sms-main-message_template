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

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/', function () {
                return view('ui::templates.dashlite.auth.login');
//                return view('ui::templates.starten.auth.login');
//                return view('ui::templates.starten.layouts.home');
    });
});

Route::get('sms', 'HomeController@sms');
Route::get('notification', 'HomeController@notification');
Route::get('notifications', 'HomeController@showNotifications');
Route::get('sample_email', 'HomeController@sample_email');
Route::get('/mail_template', function () {
    $data = array(
        'to_email' => 'tamaledns@gmail.com',
        'to_name' => 'Dennis',
        'body' => 'body',
        'subject' => 'Subject',
    );
    return view('emails.mail', $data);
});

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('/app', function () {
        return view('ui::templates.limitless.vue-layout_5');
    });

});

Route::group(['middleware' => ['web', 'auth', 'role:super-admin']], function () {

    Route::get('/dashboard', 'AdminController@index');
    Route::get('/calender', 'AdminController@calender');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/register', function () {
    return redirect('/login');
});

Route::post('/register', function () {
    return redirect('/login');
});


