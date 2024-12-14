<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;

Route::get('/', [AdminController::class, 'renderWelcomePage'])->name('welcome');

Route::get('/test/{id}', [TestController::class, 'show']);

Route::get('/skills-json', [TestController::class, 'getAllSkillsJson'])->middleware('auth');

Route::get('/skills', [TestController::class, 'getAllSkills']);

Route::get('/skills/{category}', [TestController::class, 'getSkillsCategory']);

Route::get('/create-skill', [SkillController::class, 'renderCreatePage'])->middleware('auth')->name('skillCreate');

Route::post('/create-skill', [SkillController::class, 'CreateSkill'])->middleware('auth')->name('skillCreate.post');

Route::get('/delete-skill/{id}', [SkillController::class, 'deleteSkill'])->middleware('auth')->name('skillDelete');



Route::get('/create-job-for-portfolio', [PortfolioController::class, 'renderCreatePage'])->middleware('auth')->name('createJobForPortfolio');

Route::post('/create-job-for-portfolio', [PortfolioController::class, 'createJobForPortfolio'])->middleware('auth')->name('createJobForPortfolio.post');

Route::get('/delete-portfolio-job/{id}', [PortfolioController::class, 'deleteJob'])->middleware('auth')->name('deleteJob');


Route::get('/pages/{name}', [AdminController::class, 'renderPublicPages'])->name('pages');


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


Route::post('/add-comment', [BlogController::class, 'addComment'])->name('addComment');

Route::get('/delete-comment/{id}', [BlogController::class, 'deleteComment'])->name('deleteComment');
Route::post('/edit-comment/{id}', [BlogController::class, 'editComment'])->name('editComment');


Route::post('/leads', [AdminController::class, 'addLead'])
    ->name('addLead');

Route::middleware([
    'auth',
    'roleChecker:admin'
])->prefix('admin')->group(function () {
    // /admin/users
    Route::get('/users', [AdminController::class, 'renderUsers'])->name('renderUsers');
    Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::post('/updateUser/{id}', [AdminController::class, 'updateUserPost'])->name('updateUser.post');

    Route::get('/addUser', [AdminController::class, 'renderAddUser'])->name('renderAddUser');
    Route::post('/addUser', [AdminController::class, 'addUserPost'])->name('addUserPost');

    Route::get('/postCategories', [AdminController::class, 'renderCategories'])->name('renderCategories');
    Route::get('/deleteCategory/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/updateCategory/{id}', [AdminController::class, 'updateCategory'])->name('updateUser');
    Route::post('/updateCategory/{id}', [AdminController::class, 'updateCategoryPost'])->name('updateCategory.post');
    Route::get('/addCategory', [AdminController::class, 'addCategory'])->name('addCategory');
    Route::post('/addCategory', [AdminController::class, 'addCategoryPost'])->name('addCategory.post');

    Route::get('/posts', [AdminController::class, 'renderPosts'])->name('renderPosts');
    Route::get('/deletePost/{id}', [AdminController::class, 'deletePost'])->name('deletePost');
    Route::get('/updatePost/{id}', [AdminController::class, 'renderUpdatePost'])->name('renderUpdatePost');
    Route::post('/updatePost/{id}', [AdminController::class, 'updatePost'])->name('updatePost.post');
    Route::get('/addPost', [AdminController::class, 'renderAddPost'])->name('renderAddPost');
    Route::post('/addPost', [AdminController::class, 'addPost'])->name('addPost.post');

    Route::get('/leads', [AdminController::class, 'renderLeads'])->name('renderLeads');
    Route::delete('/leads/{id}', [AdminController::class, 'deleteLead'])->name('deleteLead');

    Route::get('/sliders', [AdminController::class, 'renderSlidersPage'])->name('renderSlidersPage');
    Route::delete('/sliders/{id}', [AdminController::class, 'deleteSlider'])->name('deleteSlider');
    Route::get('/add-slider', [AdminController::class, 'renderAddSliderPage'])->name('renderAddSliderPage');
    Route::post('/add-slider', [AdminController::class, 'addSlider'])->name('addSlider');
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
