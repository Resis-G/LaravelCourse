<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Role;
use Faker\Container\ContainerException;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;


/*Role::create([
    'name'=> 'mod',
    'display_name'=>'moderador de mensajes'
]);
Role::create([
    'name'=> 'admin',
    'display_name'=>'administrador del sitio'
]);*/
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