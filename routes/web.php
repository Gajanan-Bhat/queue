<?php

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
    App\Jobs\SendWelcomeEmail::dispatch();
    $batch = [
            new \App\Jobs\PullRepo('laracasts/project1'),
            new \App\Jobs\PullRepo('laracasts/project2'),
            new \App\Jobs\PullRepo('laracasts/project3'),
        
    ];
    \Illuminate\Support\Facades\Bus::batch($batch)->dispatch();
    return view('welcome');
});
