<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\MemberController;
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
    
    // Route::resource('member', MemberController::class);
    Route::get('/member/add', [MemberController::class, 'addMember'])->name('member.add');
    Route::post('/member/add', [MemberController::class, 'storeMember'])->name('member.store');
    Route::get('/member/manage', [MemberController::class, 'manageMember'])->name('member.manage');
    Route::get('/member/{id}/edit', [MemberController::class, 'editMember'])->name('member.edit');
    Route::post('/member/{id}/update', [MemberController::class, 'updateMember'])->name('member.update');
    Route::post('/member/{id}/delete', [MemberController::class, 'deleteMember'])->name('member.delete');
});
