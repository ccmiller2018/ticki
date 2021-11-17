<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Ticket\CreateTicketController;
use App\Http\Controllers\Api\V1\Ticket\GetTicketController;
use App\Http\Controllers\Api\V1\Ticket\UpdateTicketController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/ticket', CreateTicketController::class)->name('api.createTicket');
Route::get('/ticket/{ticket}', GetTicketController::class)->name('api.getTicket.id');
Route::put('/ticket/{ticket}', UpdateTicketController::class)->name('api.updateTicket.id');
// Route::get('ticket', GetAllTicketsController::class)->name('api.getAllTickets');



// Route::post('/column', CreateColumnsController::class)->name('api.createColumn');
// Route::get('/column/{id}', GetColumnsController::class)->name('api.getColumn.id');
// Route::put('/column/{id}', UpdateColumnsController::class)->name('api.updateColumn.id');
// Route::get('column', GetAllColumnsController::class)->name('api.getAllTickets');
