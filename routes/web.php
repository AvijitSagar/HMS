<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontMealController;
use App\Http\Controllers\FrontPaymentController;
use App\Http\Controllers\FrontSeatController;
use App\Http\Controllers\FrontServiceController;
use App\Http\Controllers\FrontWorkerController;
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
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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
    return redirect()->route('login');
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
        Route::get('/admin/dashboard', [BackendController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');

        // routes for member
        Route::get('/admin/member/add', [MemberController::class, 'addMember'])->name('member.add')->middleware('auth:admin');
        Route::post('/admin/member/add', [MemberController::class, 'storeMember'])->name('member.store')->middleware('auth:admin');
        Route::get('/admin/member/manage', [MemberController::class, 'manageMember'])->name('member.manage')->middleware('auth:admin');
        Route::get('/admin/member/{id}/show', [MemberController::class, 'showMember'])->name('member.show')->middleware('auth:admin');
        Route::get('/admin/member/{id}/edit', [MemberController::class, 'editMember'])->name('member.edit')->middleware('auth:admin');
        Route::post('/admin/member/{id}/update', [MemberController::class, 'updateMember'])->name('member.update')->middleware('auth:admin');
        Route::post('/admin/member/{id}/delete', [MemberController::class, 'deleteMember'])->name('member.delete')->middleware('auth:admin');

        // routes for room
        Route::get('/admin/room/add', [RoomController::class, 'addRoom'])->name('room.add')->middleware('auth:admin');
        Route::post('/admin/room/add', [RoomController::class, 'storeRoom'])->name('room.store')->middleware('auth:admin');
        Route::get('/admin/room/manage', [RoomController::class, 'manageRoom'])->name('room.manage')->middleware('auth:admin');
        Route::get('/admin/room/{id}/edit', [RoomController::class, 'editRoom'])->name('room.edit')->middleware('auth:admin');
        Route::post('/admin/room/{id}/update', [RoomController::class, 'updateRoom'])->name('room.update')->middleware('auth:admin');
        Route::post('/admin/room/{id}/delete', [RoomController::class, 'deleteRoom'])->name('room.delete')->middleware('auth:admin');

        // routes for seat
        Route::get('/admin/seat/add', [SeatController::class, 'alocateSeat'])->name('seat.alocate')->middleware('auth:admin');
        Route::post('/admin/seat/add', [SeatController::class, 'storeAlocatedSeat'])->name('store.seat.alocated')->middleware('auth:admin');
        Route::get('/admin/seat/{id}/edit', [SeatController::class, 'editAlocatedSeat'])->name('edit.seat.alocated')->middleware('auth:admin');
        Route::post('/admin/seat/{id}/delete', [SeatController::class, 'deleteAlocatedSeat'])->name('delete.seat.alocated')->middleware('auth:admin');

        // routes for meal deposit
        Route::get('/admin/deposit/meal', [MealDepositController::class, 'addMealDeposit'])->name('mealDeposit.add')->middleware('auth:admin');
        Route::post('/admin/deposit/meal', [MealDepositController::class, 'storeMealDeposit'])->name('mealDeposit.store')->middleware('auth:admin');
        Route::get('/admin/edit/deposit/{id}/meal', [MealDepositController::class, 'editMealDeposit'])->name('mealDeposit.edit')->middleware('auth:admin');
        Route::post('/admin/update/deposit/{id}/meal', [MealDepositController::class, 'updateMealDeposit'])->name('mealDeposit.update')->middleware('auth:admin');
        Route::post('/admin/delete/deposit/{id}/meal', [MealDepositController::class, 'deleteMealDeposit'])->name('mealDeposit.delete')->middleware('auth:admin');

        // routes for employee
        Route::get('/admin/employee/add', [EmployeeController::class, 'addEmployee'])->name('employee.add')->middleware('auth:admin');
        Route::post('/admin/employee/add', [EmployeeController::class, 'storeEmployee'])->name('employee.store')->middleware('auth:admin');
        Route::get('/admin/employee/manage', [EmployeeController::class, 'manageEmployee'])->name('employee.manage')->middleware('auth:admin');
        Route::get('/admin/employee/{id}/show', [EmployeeController::class, 'showEmployee'])->name('employee.show')->middleware('auth:admin');
        Route::get('/admin/employee/{id}/edit', [EmployeeController::class, 'editEmployee'])->name('employee.edit')->middleware('auth:admin');
        Route::post('/admin/employee/{id}/update', [EmployeeController::class, 'updateEmployee'])->name('employee.update')->middleware('auth:admin');
        Route::post('/admin/employee/{id}/delete', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete')->middleware('auth:admin');

        // routes for employee designation
        Route::get('/admin/designation/add', [EmployeeDesignationController::class, 'addDesignation'])->name('designation.add')->middleware('auth:admin');
        Route::post('/admin/designation/add', [EmployeeDesignationController::class, 'storeDesignation'])->name('designation.store')->middleware('auth:admin');
        Route::get('/admin/designation/{id}/edit', [EmployeeDesignationController::class, 'editDesignation'])->name('designation.edit')->middleware('auth:admin');
        Route::post('/admin/designation/{id}/edit', [EmployeeDesignationController::class, 'updateDesignation'])->name('designation.update')->middleware('auth:admin');
        Route::post('/admin/designation/{id}/delete', [EmployeeDesignationController::class, 'deleteDesignation'])->name('designation.delete')->middleware('auth:admin');

        // routes for meal
        Route::get('/admin/meal/add', [MealController::class, 'addMeal'])->name('meal.add')->middleware('auth:admin');
        Route::post('/admin/meal/add', [MealController::class, 'storeMeal'])->name('meal.store')->middleware('auth:admin');
        Route::get('/admin/meal/manage', [MealController::class, 'manageMeal'])->name('meal.manage')->middleware('auth:admin');
        Route::get('/admin/meal/{id}/edit', [MealController::class, 'editMeal'])->name('meal.edit')->middleware('auth:admin');
        Route::post('/admin/meal/{id}/update', [MealController::class, 'updateMeal'])->name('meal.update')->middleware('auth:admin');
        Route::post('/admin/meal/{id}/delete', [MealController::class, 'deleteMeal'])->name('meal.delete')->middleware('auth:admin');

        // routes for grocery
        Route::get('/admin/grocery/add', [GroceryController::class, 'addGrocery'])->name('grocery.add')->middleware('auth:admin');
        Route::post('/admin/grocery/add', [GroceryController::class, 'storeGrocery'])->name('grocery.store')->middleware('auth:admin');
        Route::get('/admin/grocery/manage', [GroceryController::class, 'manageGrocery'])->name('grocery.manage')->middleware('auth:admin');
        Route::get('/admin/grocery/{id}/show', [GroceryController::class, 'showGrocery'])->name('grocery.show')->middleware('auth:admin');
        Route::get('/admin/grocery/{id}/edit', [GroceryController::class, 'editGrocery'])->name('grocery.edit')->middleware('auth:admin');
        Route::post('/admin/grocery/{id}/update', [GroceryController::class, 'updateGrocery'])->name('grocery.update')->middleware('auth:admin');
        Route::post('/admin/grocery/{id}/delete', [GroceryController::class, 'deleteGrocery'])->name('grocery.delete')->middleware('auth:admin');

        // routes for bills
        Route::get('/admin/bill/add', [BillController::class, 'addBill'])->name('bill.add')->middleware('auth:admin');
        Route::post('/admin/bill/add', [BillController::class, 'storeBill'])->name('bill.store')->middleware('auth:admin');
        Route::get('/admin/bill/manage', [BillController::class, 'manageBill'])->name('bill.manage')->middleware('auth:admin');
        Route::get('/admin/bill/{id}/show', [BillController::class, 'showBill'])->name('bill.show')->middleware('auth:admin');
        Route::get('/admin/bill/{id}/edit', [BillController::class, 'editBill'])->name('bill.edit')->middleware('auth:admin');
        Route::post('/admin/bill/{id}/update', [BillController::class, 'updateBill'])->name('bill.update')->middleware('auth:admin');
        Route::post('/admin/bill/{id}/delete', [BillController::class, 'deleteBill'])->name('bill.delete')->middleware('auth:admin');

        // routes for other expense
        Route::get('/admin/other/expense/add', [OtherExpenseController::class, 'addOtherExpense'])->name('otherExpense.add')->middleware('auth:admin');
        Route::post('/admin/other/expense/add', [OtherExpenseController::class, 'storeOtherExpense'])->name('otherExpense.store')->middleware('auth:admin');
        Route::get('/admin/other/expense/manage', [OtherExpenseController::class, 'manageOtherExpense'])->name('otherExpense.manage')->middleware('auth:admin');
        Route::get('/admin/other/expense/{id}/show', [OtherExpenseController::class, 'showOtherExpense'])->name('otherExpense.show')->middleware('auth:admin');
        Route::get('/admin/other/expense/{id}/edit', [OtherExpenseController::class, 'editOtherExpense'])->name('otherExpense.edit')->middleware('auth:admin');
        Route::post('/admin/other/expense/{id}/update', [OtherExpenseController::class, 'updateOtherExpense'])->name('otherExpense.update')->middleware('auth:admin');
        Route::post('/admin/other/expense/{id}/delete', [OtherExpenseController::class, 'deleteOtherExpense'])->name('otherExpense.delete')->middleware('auth:admin');

        // routes for meal-rate
        Route::get('/admin/meal-rate/add', [MealRateController::class, 'addMealRate'])->name('meal-rate.add')->middleware('auth:admin');
        Route::post('/admin/meal-rate/calculate', [MealRateController::class, 'calculateMealRate'])->name('meal-rate.calculate')->middleware('auth:admin');
        Route::post('/admin/meal-rate/store', [MealRateController::class, 'storeMealRate'])->name('meal-rate.store')->middleware('auth:admin');
        Route::get('/admin/meal-rate/manage', [MealRateController::class, 'manageMealRate'])->name('meal-rate.manage')->middleware('auth:admin');
        Route::get('/admin/meal-rate/{id}/show', [MealRateController::class, 'showMealRate'])->name('meal-rate.show')->middleware('auth:admin');

        // routes for payment
        Route::get('/admin/payment/add', [PaymentController::class, 'addPayment'])->name('payment.add')->middleware('auth:admin');
        Route::post('/admin/payment/calculate', [PaymentController::class, 'calculatePayment'])->name('payment.calculate')->middleware('auth:admin');
        Route::get('/admin/payment/manage', [PaymentController::class, 'managePayment'])->name('payment.manage')->middleware('auth:admin');
        Route::get('/admin/payment/{id}/show', [PaymentController::class, 'showPayment'])->name('payment.show')->middleware('auth:admin');

        // routes for admin profile
        Route::get('/admin/profile', [AdminController::class, 'showProfile'])->name('profile.show')->middleware('auth:admin');

        // routes for view registered user 
        Route::get('/admin/registered/users', [AdminController::class, 'showRegisteredUsers'])->name('show.registered.user')->middleware('auth:admin');

        // admin panel theke user register er route
        Route::get('/admin/register/user', [RegisteredUserController::class, 'create'])->name('user.register.by.admin')->middleware('auth:admin');
        Route::post('/admin/register/user', [RegisteredUserController::class, 'store'])->name('store.registered.user.by.admin')->middleware('auth:admin');
    });



Route::middleware([
'auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [FrontendController::class, 'index'])->name('dashboard');
    Route::get('/meal', [FrontMealController::class, 'index'])->name('meal');
    Route::get('/payment', [FrontPaymentController::class, 'index'])->name('payment');
    Route::get('/seat', [FrontSeatController::class, 'index'])->name('seat');
    Route::get('/service', [FrontServiceController::class, 'index'])->name('service');
    Route::get('/worker', [FrontWorkerController::class, 'index'])->name('worker');
});
