<?php

use App\Http\Controllers\AdminRegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\salariesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PHPMailerController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\PayslipControllerUser;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MessagesControllerUser;
use App\Http\Controllers\UserprofilesController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();

// Route::middleware(['auth', 'is_Admin'])->group([function () {}]);

Route::get('/register/admin', [AdminRegisterController::class, 'adminAccount'])->name('adminAccount');
Route::post('/save-admin', [AdminRegisterController::class, 'registerAdmin'])->name('registerAdmin');

Route::get('/create-user', [UserprofilesController::class, 'createUser'])->name('createUser')->middleware('is_Admin');
Route::post('/store-user', [UserprofilesController::class, 'storeUserDetails'])->name('storeUserDetails')->middleware('is_Admin');
Route::post('/update-user{id}', [UserprofilesController::class, 'updateUserDetails'])->name('updateUserDetails')->middleware('is_Admin');
Route::get('/edit-user{id}', [UserprofilesController::class, 'editUserDetails'])->name('edit_details')->middleware('is_Admin');
Route::get('/delete-user{id}', [UserprofilesController::class, 'deleteUserDetails'])->name('deleteUserDetails')->middleware('is_Admin');
Route::get('/all-users', [UserprofilesController::class, 'indexAll'])->name('show')->middleware('is_Admin');
// show profile information
Route::get('/profile-admin', [UserprofilesController::class, 'profileShowAdmin'])->name('profileShowAdmin');
Route::get('/profile-user', [UserprofilesController::class, 'profileShowUser'])->name('profileShowUser');

//authentication
Route::get('/', [DashboardController::class, 'index'])->name('homepage');
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::post('/login-logic', [DashboardController::class, 'loginLogic'])->name('loginLogic');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('is_Admin');
Route::get('/userdashboard', [DashboardController::class, 'user_dashboard'])->name('userdashboard');


//reset password routes
Route::get('/reset-password-form', [DashboardController::class, 'sendEmailForm'])->name('password.request');
Route::post('/email-logic', [DashboardController::class, 'emailLogic'])->name('emailLogic');
Route::get('/reset-password', [DashboardController::class, 'resetForm'])->name('resetForm');
Route::post('/reset-logic', [DashboardController::class, 'resetLogic'])->name('resetLogic');


//PostsController//
Route::resource('Actions', PostsController::class)->middleware('is_Admin');
Route::post('/update-post{id}', [PostsController::class, 'updatePost'])->name('Actions.updatePost')->middleware('is_Admin');
Route::get('/delete{id}', [PostsController::class, 'deletePost'])->name('Actions.deletePost')->middleware('is_Admin');
Route::get('/registered-employees', [PostsController::class, 'index'])->name('Actions.registered')->middleware('is_Admin');
Route::get('/employee_manage', [PostsController::class, 'manage'])->name('Actions.employee_manage')->middleware('is_Admin');


// PayslipController//
Route::get('/payslip', [PayslipController::class, 'createSlip'])->name('slip.create')->middleware('is_Admin');
Route::post('/store', [PayslipController::class, 'storeDetails'])->name('Slip.store')->middleware('is_Admin');
Route::get('/fetch', [PayslipController::class, 'fetchAll'])->name('fetch')->middleware('is_Admin');
Route::get('/delete-slip{id}', [PayslipController::class, 'deleteSlip'])->name('delete-payslip')->middleware('is_Admin');
Route::post('/update-slip{id}', [PayslipController::class, 'updateSlip'])->name('update-payslip')->middleware('is_Admin');
Route::get('/edit/{id}', [PayslipController::class, 'editSlip'])->name('edit-payslip')->middleware('is_Admin');
//dowload pdf//
Route::get('/Slip.download.pdf{id}', [PayslipController::class, 'downloadPdf'])->name('Slip.download.pdf');
// Route::get('/Slip.download.pdf{id}', [PayslipController::class, 'downloadPdf'])->name('Slip.download.pdf');

//PHPMailerController
Route::get('/send-mail', [PHPMailerController::class, 'mailView'])->name('mailView');
Route::post('/email-sent', [PHPMailerController::class, 'storeMail'])->name('storeMail');


//Departments controller
Route::get('/create-department', [DepartmentsController::class, 'createDepartment'])->name('createDepartment')->middleware('is_Admin');
Route::post('/store-department', [DepartmentsController::class, 'storeDepartments'])->name('storeDepartments')->middleware('is_Admin');
Route::post('/update-department{id}', [DepartmentsController::class, 'updateDepartments'])->name('updateDepartments')->middleware('is_Admin');
Route::get('/show-departments', [DepartmentsController::class, 'allDepartments'])->name('allDepartments')->middleware('is_Admin');
Route::get('/edit-department{id}', [DepartmentsController::class, 'editDepartments'])->name('editDepartments')->middleware('is_Admin');
Route::get('/delete-department{id}', [DepartmentsController::class, 'deleteDepartments'])->name('deleteDepartments')->middleware('is_Admin');

//Salaries controller
Route::get('/payments', [salariesController::class, 'makePayment'])->name('makePayment')->middleware('is_Admin');
Route::get('/amount-payable', [salariesController::class, 'Create-amount'])->name('Create-amount')->middleware('is_Admin');
Route::get('/employee-leave', [salariesController::class, 'employeeLeave'])->name('employeeLeave')->middleware('is_Admin');


// normal empolyees controllers ***user_dashboard//

// PayslipControllerUser
Route::get('/generate-payslip', [PayslipControllerUser::class, 'EmployeePayslip'])->name('EmployeePayslip');

// MessageControllerUser
Route::get('/send-message', [MessagesControllerUser::class, 'CreateMessage'])->name('CreateMessage');
Route::get('/show-messages', [MessagesControllerUser::class, 'MessagesRequests'])->name('MessagesRequests')->middleware('is_Admin');
Route::post('/store-message', [MessagesControllerUser::class, 'MessageStore'])->name('MessageStore');
Route::get('/delete-message{id}', [MessagesControllerUser::class, 'DeleteMessage'])->name('DeleteMessage')->middleware('is_Admin');
Route::get('/message-status', [MessagesControllerUser::class, 'statusMessage'])->name('statusMessage');

