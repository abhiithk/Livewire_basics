<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\Test;

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
    return view('welcome');
}
);
// Route::get('/welcome_to_abhijith', function ()
//  {
//     return view('livewire.show-posts');
// }
// );
Route::get('/welcome_to_abhijith', 'ShowPosts@index');
Route::get('/welcome_users', 'Test@index');
Route::get('/forms', 'Forms@index');
Route::get('/books', 'Book@index');
// Route::get('/welcome_to_abhijith',  ShowPosts::class);
//Route::get('/welcome_to_abhijith',  \App\Http\Livewire\ShowPosts::class);