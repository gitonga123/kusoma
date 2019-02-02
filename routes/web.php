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

Route::get('/list-users/{id}', function (\Illuminate\Http\Request $request, $id) {
    if (!auth()->check()) {
        throw new \App\Exceptions\HackerAlertException();
    } else {
        return \App\User::findOrFail($id);
    }
})->where('id', '[0-9]+');

Route::get("/custom", function (){
    dd(config('app.developers'));
});

Route::get('/', function () {
    return view('welcome');
});

Route::get("/admins", function (){
    dd(config('blog.admins'));
});

Route::middleware('testing_middle')->get("/env", function (){
    dd(session()->get('test'));
});

Auth::routes();

Route::get('/logout', function() { 
    auth()->logout();
});

Route::prefix('admin')->group(function () {
    Route::resource('series', 'SeriesController');
});

Route::get('/register/confirm', 'ConfirmEmailController@index')->name('confirm-email');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testingvue', 'TestController@index')->name('testingvue');
