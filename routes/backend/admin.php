<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::resource('employee',EmployeeController::class);
Route::resource('company',CompanyController::class);
Route::get('employee/creates/{id}',[EmployeeController::class,'creates'])->name('employee.creates');
