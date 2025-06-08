<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

//rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//rota perfil admin
Route::get('admin/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'admin'])
->name('admin.profile');

//rota editar perfil admin
Route::post('admin/profile/update', [ProfileController::class, 'update'])
->middleware(['auth', 'admin'])
->name('admin.profile.update');

//rota editar senha admin
Route::post('admin/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth', 'admin'])
->name('admin.profile.password');

//rota Slider Destaque
Route::resource('admin/slider', SliderController::class)
->middleware(['auth', 'admin']);
