<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

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



Route::resource('address',AddressController::class);

Route::resource('home', HomeController::class);


Route::get('/send-email', function () {
    $recipient = 'nepalshreejal@gmail.com';
    $data = ['subject'=>'TEST subject'
    ,'message' => 'This is a test email with dynamic content.','view'=>'emails/sample'];
    try {
        Config::set('mail.from.name', 'SRIJAL NEPAL');
        Mail::to($recipient)->send(new TestMail($data));
        return 'Email sent successfully!';
    } catch (Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});


