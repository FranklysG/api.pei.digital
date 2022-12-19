<?php

use App\Http\Controllers\Integration\IntegrationController;
use App\Http\Controllers\Plan\PlanController;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Workspace\WorkspaceController;
use App\Http\Controllers\ZipCode\ZipCodeController;
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
    Route::delete('/workspace', [WorkspaceController::class, 'destroy'])->name('api.workspace.destroy');
    
    Route::get('/settings', [SettingController::class, 'show'])->name('api.setting.show');
    Route::put('/settings', [SettingController::class, 'update'])->name('api.setting.update');
    Route::post('/settings', [SettingController::class, 'store'])->name('api.setting.store');
});