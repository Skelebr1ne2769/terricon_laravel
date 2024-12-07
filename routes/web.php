<?php

use Illuminate\Support\Facades\Route;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/{id}', [TestController::class, 'show']);

Route::get('/skills-json', [TestController::class, 'getAllSkillsJson'])->middleware('auth');

Route::get('/skills', [TestController::class, 'getAllSkills']);

Route::get('/skills/{category}', [TestController::class, 'getSkillsCategory']);

Route::get('/create-skill', [SkillController::class, 'renderCreatePage'])->middleware('auth')->name('skillCreate');

Route::get('/portfolio', function(){
    $title = 'Портфолио Terricon';

    $jobs = Portfolio::all();

    return view('portfolio')
        ->with('title', $title)
        ->with('jobs', $jobs);
});

Route::get('/news', function(){
    $title = 'Страница новостей';

    return view('news', [
        'title' => $title,
        'numbers' => '1233213211321321'
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
