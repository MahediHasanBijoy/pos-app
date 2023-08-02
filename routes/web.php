<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\TokenVerificationMiddleware;

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

Route::get('/', function () {
    return view('welcome');
});

// User Logout
Route::get('/logout',[UserController::class,'UserLogout']);

// User Authentication
Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

//Task api
Route::post("/create-task",[TaskController::class,'CreateTask'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-task",[TaskController::class,'DeleteTask'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-task",[TaskController::class,'UpdateTask'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-task",[TaskController::class,'TaskList'])->middleware([TokenVerificationMiddleware::class]);


// Customer API
Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/promotional-mail', [CustomerController::class, 'SendPromotionalMail'])->middleware([TokenVerificationMiddleware::class]);