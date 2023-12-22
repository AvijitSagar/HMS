<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\MealDepositController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
use App\Models\MealDeposit;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('backend.home.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/', [BackendController::class, 'index'])->name('dashboard');
    
    // routes for member
    Route::get('/member/add', [MemberController::class, 'addMember'])->name('member.add');
    Route::post('/member/add', [MemberController::class, 'storeMember'])->name('member.store');
    Route::get('/member/manage', [MemberController::class, 'manageMember'])->name('member.manage');
    Route::get('/member/{id}/show', [MemberController::class, 'showMember'])->name('member.show');
    Route::get('/member/{id}/edit', [MemberController::class, 'editMember'])->name('member.edit');
    Route::post('/member/{id}/update', [MemberController::class, 'updateMember'])->name('member.update');
    Route::post('/member/{id}/delete', [MemberController::class, 'deleteMember'])->name('member.delete');

    // routes for room
    Route::get('/room/add', [RoomController::class, 'addRoom'])->name('room.add');
    Route::post('/room/add', [RoomController::class, 'storeRoom'])->name('room.store');
    Route::get('/room/manage', [RoomController::class, 'manageRoom'])->name('room.manage');
    Route::get('/room/{id}/edit', [RoomController::class, 'editRoom'])->name('room.edit');
    Route::post('/room/{id}/update', [RoomController::class, 'updateRoom'])->name('room.update');
    Route::post('/room/{id}/delete', [RoomController::class, 'deleteRoom'])->name('room.delete');

    // routes for seat
    Route::get('/seat/add', [SeatController::class, 'alocateSeat'])->name('seat.alocate');
    Route::post('/seat/add', [SeatController::class, 'storeAlocatedSeat'])->name('store.seat.alocated');
    Route::get('/seat/{id}/edit', [SeatController::class, 'editAlocatedSeat'])->name('edit.seat.alocated');
    Route::post('/seat/{id}/delete', [SeatController::class, 'deleteAlocatedSeat'])->name('delete.seat.alocated');

    // routes for meal deposit
    Route::get('/deposit/meal', [MealDepositController::class, 'addMealDeposit'])->name('mealDeposit.add');
    Route::post('/deposit/meal', [MealDepositController::class, 'storeMealDeposit'])->name('mealDeposit.store');
});
