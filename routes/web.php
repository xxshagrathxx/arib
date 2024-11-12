<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TranslateController;
use App\Http\Controllers\UserController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::redirect('/', '/dashboard', 301);

    // Login
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('login-check', [AuthController::class, 'loginCheck'])->name('login.check');
    // ./Login

    Route::middleware('auth')->group(function() {
        // Authentication
            Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
            // Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
            // Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
            Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
            // Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
        // ./Authentication

        Route::prefix('/users')->middleware('role_or_permission:show_users|show_roles')->group(function() {
            // Users
                Route::prefix('/users')->middleware('role_or_permission:show_users')->group(function() {
                    Route::get('/all', [UserController::class, 'index'])->middleware('permission:show_users')->name('users.all');
                    Route::get('/create', [UserController::class, 'create'])->middleware('permission:create_users')->name('users.create');
                    Route::post('/store', [UserController::class, 'store'])->middleware('permission:create_users')->name('users.store');
                    Route::get('/show/{id}', [UserController::class, 'show'])->middleware('permission:show_users')->name('users.show');
                    Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('permission:update_users')->name('users.edit');
                    Route::post('/update/{id}', [UserController::class, 'update'])->middleware('permission:update_users')->name('users.update');
                    Route::get('/delete/{id}', [UserController::class, 'destroy'])->middleware('permission:delete_users')->name('users.delete');
                });
            // ./Users

            // Roles
                Route::prefix('/roles')->middleware('role_or_permission:show_roles')->group(function() {
                    Route::get('/all', [RoleController::class, 'index'])->middleware('permission:show_roles')->name('roles.all');
                    Route::get('/create', [RoleController::class, 'create'])->middleware('permission:create_roles')->name('roles.create');
                    Route::post('/store', [RoleController::class, 'store'])->middleware('permission:create_roles')->name('roles.store');
                    Route::get('/edit/{id}', [RoleController::class, 'edit'])->middleware('permission:update_roles')->name('roles.edit');
                    Route::post('/update/{id}', [RoleController::class, 'update'])->middleware('permission:update_roles')->name('roles.update');
                    Route::get('/delete/{id}', [RoleController::class, 'destroy'])->middleware('permission:delete_roles')->name('roles.delete');

                    Route::get('/edit/assign-permissions/{id}', [RoleController::class, 'assignPermissions'])->middleware('permission:assign_permissions')->name('users-roles-edit-assign-permissions');
                    Route::post('/update/permissions/sync', [RoleController::class, 'assignPermissionsUpdate'])->middleware('permission:update_permissions')->name('users-roles-update-assign-permissions');
                });
            // ./Roles
        });

        // Pages

            // Departments
            Route::prefix('/departments')->middleware('permission:show_departments')->group(function() {
                Route::get('/all', [DepartmentController::class, 'index'])->middleware('permission:show_departments')->name('departments.all');
                Route::get('/create', [DepartmentController::class, 'create'])->middleware('permission:create_departments')->name('departments.create');
                Route::post('/store', [DepartmentController::class, 'store'])->middleware('permission:create_departments')->name('departments-store');
                Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->middleware('permission:update_departments')->name('departments-edit');
                Route::post('/update/{id}', [DepartmentController::class, 'update'])->middleware('permission:update_departments')->name('departments-update');
                Route::get('/delete/{id}', [DepartmentController::class, 'destroy'])->middleware('permission:delete_departments')->name('departments-delete');
                Route::get('/search', [DepartmentController::class, 'search'])->middleware('permission:show_departments')->name('departments-search');
            });
            // ./Departments

            // Employees
            Route::prefix('/employees')->middleware('permission:show_employees')->group(function() {
                Route::get('/all', [EmployeeController::class, 'index'])->middleware('permission:show_employees')->name('employees.all');
                Route::get('/create', [EmployeeController::class, 'create'])->middleware('permission:create_employees')->name('employees.create');
                Route::post('/store', [EmployeeController::class, 'store'])->middleware('permission:create_employees')->name('employees-store');
                Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->middleware('permission:update_employees')->name('employees-edit');
                Route::post('/update/{id}', [EmployeeController::class, 'update'])->middleware('permission:update_employees')->name('employees-update');
                Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->middleware('permission:delete_employees')->name('employees-delete');
            });
            // ./Employees

            // Tasks
            Route::prefix('/tasks')->middleware('permission:show_tasks')->group(function() {
                Route::get('/all', [TaskController::class, 'index'])->middleware('permission:show_tasks')->name('tasks.all');
                Route::get('/create', [TaskController::class, 'create'])->middleware('permission:create_tasks')->name('tasks.create');
                Route::post('/store', [TaskController::class, 'store'])->middleware('permission:create_tasks')->name('tasks-store');
                Route::get('/edit/{id}', [TaskController::class, 'edit'])->middleware('permission:update_tasks')->name('tasks-edit');
                Route::post('/update/{id}', [TaskController::class, 'update'])->middleware('permission:update_tasks')->name('tasks-update');
                Route::get('/delete/{id}', [TaskController::class, 'destroy'])->middleware('permission:delete_tasks')->name('tasks-delete');
            });
            // ./Tasks

            // Translates
            Route::prefix('/translates')->middleware('arabicOnly', 'permission:show_translates')->group(function() {
                Route::post('/store', [TranslateController::class, 'store'])->middleware('permission:create_translates')->name('translates-store');
                Route::post('/update', [TranslateController::class, 'update'])->middleware('permission:update_translates')->name('translates-update');
                Route::get('/edit', [TranslateController::class, 'edit'])->middleware('permission:update_translates')->name('translates-edit');
                Route::get('/delete/{id}', [TranslateController::class, 'destroy'])->middleware('permission:delete_translates')->name('translates-delete');
            });
            // ./Translates

            // Profile
                Route::prefix('/profile')->group(function() {
                    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile-edit');
                    Route::post('/update', [ProfileController::class, 'update'])->name('profile-update');
                });
            // ./Profile

            // Settings
                Route::prefix('/settings')->middleware('permission:update_settings')->group(function() {
                    Route::get('/edit', [SettingsController::class, 'edit'])->name('settings-edit');
                    Route::post('/update', [SettingsController::class, 'update'])->name('settings-update');
                });
            // ./Settings

        // ./Pages
    });
});
