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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/transactions', 'TransactionController@transactions')->name('transactions');
Route::get('/create-transaction', 'TransactionController@newTransaction')->name('transaction_new');
Route::post('/create-transaction', 'TransactionController@createTransaction')->name('transaction_create');
Route::get('/budget', 'TransactionController@budget')->name('budget');
Route::post('/create-budget', 'TransactionController@createBudget')->name('define_budget');

Route::post('/user-auth', 'Auth\LoginController@authenticate')->name('log_user');
