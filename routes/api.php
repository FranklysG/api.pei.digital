<?php

use App\Http\Controllers\Form\FormController;
use App\Http\Controllers\Generate\GenerateController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Specialist\SpecialistController;
use App\Http\Controllers\Workspace\WorkspaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
 
    Route::get('/workspace', [WorkspaceController::class, 'show'])->name('api.workspace.show');
    Route::post('/workspace', [WorkspaceController::class, 'store'])->name('api.workspace.store');
    Route::put('/workspace', [WorkspaceController::class, 'update'])->name('api.workspace.update');
    Route::put('/workspace/change', [WorkspaceController::class, 'change'])->name('api.workspace.change');
    Route::delete('/workspace', [WorkspaceController::class, 'destroy'])->name('api.workspace.destroy');
    
    Route::get('/setting', [SettingController::class, 'show'])->name('api.setting.show');
    Route::post('/setting', [SettingController::class, 'store'])->name('api.setting.store');
    Route::put('/setting', [SettingController::class, 'update'])->name('api.setting.update');
    
    Route::get('/form/generate', [GenerateController::class, 'show'])->name('api.form.generate.show');
    
    Route::get('/form', [FormController::class, 'show'])->name('api.form.show');
    Route::post('/form', [FormController::class, 'store'])->name('api.form.store');
    Route::put('/form', [FormController::class, 'update'])->name('api.form.update');
    Route::delete('/form', [FormController::class, 'destroy'])->name('api.form.destroy');

    Route::get('/specialist', [SpecialistController::class, 'show'])->name('api.specialist.show');
    Route::post('/specialist', [SpecialistController::class, 'store'])->name('api.specialist.store');
    Route::put('/specialist', [SpecialistController::class, 'update'])->name('api.specialist.update');
    Route::delete('/specialist', [SpecialistController::class, 'destroy'])->name('api.specialist.destroy');
});