<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'home']);

Route::get('/home',[HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room']);
Route::get('/view_room', [AdminController::class, 'view_room']) ;
Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);
Route::get('/room_update/{id}', [AdminController::class, 'room_update']) ;
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']) ;
Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
Route::get('/bookings', [AdminController::class, 'bookings']) ;
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']) ;
Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']) ;
Route::get('/reject_book/{id}', [AdminController::class, 'reject_book']) ;
Route::get('/view_gallary', [AdminController::class, 'view_gallary']);
Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);
Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/all_messages', [AdminController::class, 'all_messages']);
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']) ;
Route::post('/mail/{id}', [AdminController::class, 'mail']) ;
Route::get('/our_rooms', [HomeController::class, 'our_rooms']);
Route::get('/hotel_gallary', [HomeController::class, 'hotel_gallary']);
Route::get('/contact_us', [HomeController::class, 'contact_us']);







