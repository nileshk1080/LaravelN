<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signUp', function () {
    return view('signup');
});

Route::get('/home', function () {
    return view('homepage');
});

Route::get('/t', function () {
    return view('tickettable3');
});


Route::post('/loginUser', [AuthenticationController::class, 'loginUser']);
Route::post('/signUpUser', [AuthenticationController::class, 'signUpUser']);
Route::get('/logout', [AuthenticationController::class, 'logout']);

Route::post('/addticket', [TicketController::class, 'addticket'])->middleware(['auth', 'role:Admin,User'])->name('addticket');

Route::post('/deleteTicket', [TicketController::class, 'deleteTicket'])->middleware(['auth', 'role:Admin,User']);

Route::post('/completeTicket', [TicketController::class, 'completeTicket'])->middleware(['auth', 'role:Admin,User']);

Route::post('/editTicket', [TicketController::class, 'editTicket'])->middleware(['auth', 'role:Admin']);

Route::post('/editSubmitTicket', [TicketController::class, 'editSubmitTicket'])->middleware(['auth', 'role:Admin,User']);

Route::get('/getAllTickets', [TicketController::class, 'getAllTickets'])->middleware(['auth', 'role:Admin,User']);

Route::get('/newTickets', [TicketController::class, 'newTickets'])->middleware(['auth', 'role:Admin,User']);



// Route::get('/dashboard', function () {

//     return "Dashboard";});

Route::get('/', [HomepageController::class, 'index']);

Route::get('/hello', [TestController::class, 'index']);

Route::get('/testdb', function () {
    return DB::connection()->getDatabaseName();
});

Route::get('/users', [DbController::class, 'index']);




Route::get('/ticketview', function () {
    return view('ticketview');
})->name('ticketview')->middleware(['auth', 'role:Admin,User']);

Route::get('/addTicketPage', function () {
    return view('addTicketPage');
})->name('addTicketPage')->middleware(['auth', 'role:Admin,User']);

Route::get('/editTicketPage', function () {
    return view('editTicketPage');
})->name('editTicketPage')->middleware(['auth', 'role:Admin,']);

Route::get('/error', function () {
    return view('error');
})->name('error');
