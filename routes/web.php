<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\GroceryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealDepositController;
use App\Http\Controllers\MealRateController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OtherExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SeatController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
        // Route::get('/admin/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
        Route::get('/admin/dashboard', [BackendController::class, 'index'])->name('dashboard')->middleware('auth:admin');

        // routes for member
        Route::get('/member/add', [MemberController::class, 'addMember'])->name('member.add')->middleware('auth:admin');
        Route::post('/member/add', [MemberController::class, 'storeMember'])->name('member.store')->middleware('auth:admin');
        Route::get('/member/manage', [MemberController::class, 'manageMember'])->name('member.manage')->middleware('auth:admin');
        Route::get('/member/{id}/show', [MemberController::class, 'showMember'])->name('member.show')->middleware('auth:admin');
        Route::get('/member/{id}/edit', [MemberController::class, 'editMember'])->name('member.edit')->middleware('auth:admin');
        Route::post('/member/{id}/update', [MemberController::class, 'updateMember'])->name('member.update')->middleware('auth:admin');
        Route::post('/member/{id}/delete', [MemberController::class, 'deleteMember'])->name('member.delete')->middleware('auth:admin');

        // routes for room
        Route::get('/room/add', [RoomController::class, 'addRoom'])->name('room.add')->middleware('auth:admin');
        Route::post('/room/add', [RoomController::class, 'storeRoom'])->name('room.store')->middleware('auth:admin');
        Route::get('/room/manage', [RoomController::class, 'manageRoom'])->name('room.manage')->middleware('auth:admin');
        Route::get('/room/{id}/edit', [RoomController::class, 'editRoom'])->name('room.edit')->middleware('auth:admin');
        Route::post('/room/{id}/update', [RoomController::class, 'updateRoom'])->name('room.update')->middleware('auth:admin');
        Route::post('/room/{id}/delete', [RoomController::class, 'deleteRoom'])->name('room.delete')->middleware('auth:admin');

        // routes for seat
        Route::get('/seat/add', [SeatController::class, 'alocateSeat'])->name('seat.alocate')->middleware('auth:admin');
        Route::post('/seat/add', [SeatController::class, 'storeAlocatedSeat'])->name('store.seat.alocated')->middleware('auth:admin');
        Route::get('/seat/{id}/edit', [SeatController::class, 'editAlocatedSeat'])->name('edit.seat.alocated')->middleware('auth:admin');
        Route::post('/seat/{id}/delete', [SeatController::class, 'deleteAlocatedSeat'])->name('delete.seat.alocated')->middleware('auth:admin');

        // routes for meal deposit
        Route::get('/deposit/meal', [MealDepositController::class, 'addMealDeposit'])->name('mealDeposit.add')->middleware('auth:admin');
        Route::post('/deposit/meal', [MealDepositController::class, 'storeMealDeposit'])->name('mealDeposit.store')->middleware('auth:admin');
        Route::get('/edit/deposit/{id}/meal', [MealDepositController::class, 'editMealDeposit'])->name('mealDeposit.edit')->middleware('auth:admin');
        Route::post('/update/deposit/{id}/meal', [MealDepositController::class, 'updateMealDeposit'])->name('mealDeposit.update')->middleware('auth:admin');
        Route::post('/delete/deposit/{id}/meal', [MealDepositController::class, 'deleteMealDeposit'])->name('mealDeposit.delete')->middleware('auth:admin');

        // routes for employee
        Route::get('/employee/add', [EmployeeController::class, 'addEmployee'])->name('employee.add')->middleware('auth:admin');
        Route::post('/employee/add', [EmployeeController::class, 'storeEmployee'])->name('employee.store')->middleware('auth:admin');
        Route::get('/employee/manage', [EmployeeController::class, 'manageEmployee'])->name('employee.manage')->middleware('auth:admin');
        Route::get('/employee/{id}/show', [EmployeeController::class, 'showEmployee'])->name('employee.show')->middleware('auth:admin');
        Route::get('/employee/{id}/edit', [EmployeeController::class, 'editEmployee'])->name('employee.edit')->middleware('auth:admin');
        Route::post('/employee/{id}/update', [EmployeeController::class, 'updateEmployee'])->name('employee.update')->middleware('auth:admin');
        Route::post('/employee/{id}/delete', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete')->middleware('auth:admin');

        // routes for employee designation
        Route::get('/designation/add', [EmployeeDesignationController::class, 'addDesignation'])->name('designation.add')->middleware('auth:admin');
        Route::post('/designation/add', [EmployeeDesignationController::class, 'storeDesignation'])->name('designation.store')->middleware('auth:admin');
        Route::get('/designation/{id}/edit', [EmployeeDesignationController::class, 'editDesignation'])->name('designation.edit')->middleware('auth:admin');
        Route::post('/designation/{id}/edit', [EmployeeDesignationController::class, 'updateDesignation'])->name('designation.update')->middleware('auth:admin');
        Route::post('/designation/{id}/delete', [EmployeeDesignationController::class, 'deleteDesignation'])->name('designation.delete')->middleware('auth:admin');

        // routes for meal
        Route::get('/meal/add', [MealController::class, 'addMeal'])->name('meal.add')->middleware('auth:admin');
        Route::post('/meal/add', [MealController::class, 'storeMeal'])->name('meal.store')->middleware('auth:admin');
        Route::get('/meal/manage', [MealController::class, 'manageMeal'])->name('meal.manage')->middleware('auth:admin');
        Route::get('/meal/{id}/edit', [MealController::class, 'editMeal'])->name('meal.edit')->middleware('auth:admin');
        Route::post('/meal/{id}/update', [MealController::class, 'updateMeal'])->name('meal.update')->middleware('auth:admin');
        Route::post('/meal/{id}/delete', [MealController::class, 'deleteMeal'])->name('meal.delete')->middleware('auth:admin');

        // routes for grocery
        Route::get('/grocery/add', [GroceryController::class, 'addGrocery'])->name('grocery.add')->middleware('auth:admin');
        Route::post('/grocery/add', [GroceryController::class, 'storeGrocery'])->name('grocery.store')->middleware('auth:admin');
        Route::get('/grocery/manage', [GroceryController::class, 'manageGrocery'])->name('grocery.manage')->middleware('auth:admin');
        Route::get('/grocery/{id}/show', [GroceryController::class, 'showGrocery'])->name('grocery.show')->middleware('auth:admin');
        Route::get('/grocery/{id}/edit', [GroceryController::class, 'editGrocery'])->name('grocery.edit')->middleware('auth:admin');
        Route::post('/grocery/{id}/update', [GroceryController::class, 'updateGrocery'])->name('grocery.update')->middleware('auth:admin');
        Route::post('/grocery/{id}/delete', [GroceryController::class, 'deleteGrocery'])->name('grocery.delete')->middleware('auth:admin');

        // routes for bills
        Route::get('/bill/add', [BillController::class, 'addBill'])->name('bill.add')->middleware('auth:admin');
        Route::post('/bill/add', [BillController::class, 'storeBill'])->name('bill.store')->middleware('auth:admin');
        Route::get('/bill/manage', [BillController::class, 'manageBill'])->name('bill.manage')->middleware('auth:admin');
        Route::get('/bill/{id}/show', [BillController::class, 'showBill'])->name('bill.show')->middleware('auth:admin');
        Route::get('/bill/{id}/edit', [BillController::class, 'editBill'])->name('bill.edit')->middleware('auth:admin');
        Route::post('/bill/{id}/update', [BillController::class, 'updateBill'])->name('bill.update')->middleware('auth:admin');
        Route::post('/bill/{id}/delete', [BillController::class, 'deleteBill'])->name('bill.delete')->middleware('auth:admin');

        // routes for other expense
        Route::get('/other/expense/add', [OtherExpenseController::class, 'addOtherExpense'])->name('otherExpense.add')->middleware('auth:admin');
        Route::post('/other/expense/add', [OtherExpenseController::class, 'storeOtherExpense'])->name('otherExpense.store')->middleware('auth:admin');
        Route::get('/other/expense/manage', [OtherExpenseController::class, 'manageOtherExpense'])->name('otherExpense.manage')->middleware('auth:admin');
        Route::get('/other/expense/{id}/show', [OtherExpenseController::class, 'showOtherExpense'])->name('otherExpense.show')->middleware('auth:admin');
        Route::get('/other/expense/{id}/edit', [OtherExpenseController::class, 'editOtherExpense'])->name('otherExpense.edit')->middleware('auth:admin');
        Route::post('/other/expense/{id}/update', [OtherExpenseController::class, 'updateOtherExpense'])->name('otherExpense.update')->middleware('auth:admin');
        Route::post('/other/expense/{id}/delete', [OtherExpenseController::class, 'deleteOtherExpense'])->name('otherExpense.delete')->middleware('auth:admin');

        // routes for meal-rate
        Route::get('/meal-rate/add', [MealRateController::class, 'addMealRate'])->name('meal-rate.add')->middleware('auth:admin');
        Route::post('/meal-rate/calculate', [MealRateController::class, 'calculateMealRate'])->name('meal-rate.calculate')->middleware('auth:admin');
        Route::post('/meal-rate/store', [MealRateController::class, 'storeMealRate'])->name('meal-rate.store')->middleware('auth:admin');
        Route::get('/meal-rate/manage', [MealRateController::class, 'manageMealRate'])->name('meal-rate.manage')->middleware('auth:admin');
        Route::get('/meal-rate/{id}/show', [MealRateController::class, 'showMealRate'])->name('meal-rate.show')->middleware('auth:admin');

        // routes for payment
        Route::get('/payment/add', [PaymentController::class, 'addPayment'])->name('payment.add')->middleware('auth:admin');
        Route::post('/payment/calculate', [PaymentController::class, 'calculatePayment'])->name('payment.calculate')->middleware('auth:admin');
        Route::get('/payment/manage', [PaymentController::class, 'managePayment'])->name('payment.manage')->middleware('auth:admin');
        Route::get('/payment/{id}/show', [PaymentController::class, 'showPayment'])->name('payment.show')->middleware('auth:admin');
    });










    Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/', [BackendController::class, 'index'])->name('dashboard');
    
    
});
