<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortfolioController;

Route::get('/skills', [SkillController::class, 'getApiSkills']); 

Route::post('/skills', [SkillController::class, 'createApiSkills']);

Route::get('/portfolio', [PortfolioController::class, 'getApiJobs']); 

Route::post('/portfolio', [PortfolioController::class, 'createApiJobs']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
