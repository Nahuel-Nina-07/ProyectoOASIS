<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZohoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contacts-roles', [ZohoController::class, 'getContactsRoles']);
Route::get('leads/{id}', [ZohoController::class, 'getLeads']);
Route::get('contacts/{id}', [ZohoController::class, 'getContacts']);
Route::get('accounts/{id}', [ZohoController::class, 'getAccounts']);