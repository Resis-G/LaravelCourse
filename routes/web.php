<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Jobs\SendEmail;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
/*Role::create([
    'name'=> 'mod',
    'display_name'=>'moderador de mensajes'
]);
Role::create([
    'name'=> 'admin',
    'display_name'=>'administrador del sitio'
]);*/
Route::get('job', function(){
    dispatch(new SendEmail);
    return "Listo!";
});

Route::get('Roles',function(){
    return Role::with('user')->get();
});

Route::get('/',['as'=>'home','uses'=>'PagesController@home']);

Route::get('saludos/{nombre?}', ['as'=>'saludos','uses'=>'PagesController@saludo'])->where('nombre',"[A-Za-z]+");

Route::resource('messages','MessagesController');

Route::resource('users','UsersController');

Route::view('login', 'auth.login')->name('login');
Route::post('login',[AuthenticatedSessionController::class,'store']);
Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::resource('register','Auth\RegisteredUserController');