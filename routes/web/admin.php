<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

//rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//rota perfil admin
Route::get('admin/profile', [ProfileController::class, 'index'])
->name('admin.profile');

//rota editar perfil admin
Route::post('admin/profile/update', [ProfileController::class, 'update'])
->name('admin.profile.update');
