<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Route;

Route::add('/', 'Front\HomeController@index');
Route::add('about', 'Front\HomeController@index');
Route::add('example', 'Front\ExampleController@index');
Route::add('task', 'Front\TaskController@index');
Route::add('tasks', 'Front\TaskController@index');
Route::add('create/task', 'Front\TaskController@create');
Route::add('update/task/{id}', 'Front\TaskController@update');
Route::add('tasks/create', 'Front\TaskController@create');
Route::add('delete/task/{id}', 'Front\TaskController@delete');


//Route Oluşturma
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($uri === '') {
    $uri = '/';
}

Route::dispatch($uri);
