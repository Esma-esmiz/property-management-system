<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
 /*  $dep= Department::create([
      'name'=>'ICT',
  ]);
  
  $pos= Position::create([
    'name'=>'ICT',
]);

$user= User::create([
    'email'=>'esm@g.com',
    'password'=>'123'$dep=Department::find(1);
  dd($dep->positions);
]); */
  
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user',UserController::class);
Route::resource('campus',CampusController::class);
Route::resource('department',DepartmentController::class);
Route::resource('position',PositionController::class);
 
