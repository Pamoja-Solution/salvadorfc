<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',['users'=>User::paginate(10),'categories'=>Categorie::all(),"posts"=>Post::paginate(10)]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name('dashboard');

Route::middleware(['auth', 'verified','rolemanager:utilisateur'])->get('/erreur', function () {
    return view('autres');
})->name('autres');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth','verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Liste des posts
        
        // Formulaire de création
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        
        // Enregistrement du post
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        
        // Édition d'un post
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        
        // Mise à jour d'un post
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        
        // Suppression d'un post
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    });
});
Route::get('admin/posts', [PostController::class, 'index'])->name('admin.posts.index');

Route::get('admin/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');




Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Routes pour les sections
        Route::get('/posts/{post}/sections/create', [SectionControllerSite::class, 'create'])->name('sections.create');
        Route::post('/posts/{post}/sections', [SectionControllerSite::class, 'store'])->name('sections.store');
        Route::get('/posts/{post}/sections/{section}/edit', [SectionControllerSite::class, 'edit'])->name('sections.edit');
        Route::put('/posts/{post}/sections/{section}', [SectionControllerSite::class, 'update'])->name('sections.update');
        Route::delete('/posts/{post}/sections/{section}', [SectionControllerSite::class, 'destroy'])->name('sections.destroy');
    });
});


Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::get('/admin/socials', [SocialController::class, 'index'])->name('admin.socials.index');
    Route::get('/admin/socials/create', [SocialController::class, 'create'])->name('admin.socials.create');
    Route::post('/admin/socials', [SocialController::class, 'store'])->name('admin.socials.store');
    Route::get('/admin/socials/{social}/edit', [SocialController::class, 'edit'])->name('admin.socials.edit');
    Route::patch('/admin/socials/{social}', [SocialController::class, 'update'])->name('admin.socials.update');
    Route::delete('/admin/socials/{social}', [SocialController::class, 'destroy'])->name('admin.socials.destroy');
});



Route::prefix('/new')->controller(GestionAdmin::class)->middleware(['auth', 'verified','rolemanager:admin'])->name('admin.')->group(function (){
    Route::get('/category','newcat')->name('newcat');
    Route::post('/category','savecat');

    Route::get('/category/{categorie}','editcat')->name('editcat');
    Route::post('/category/{categorie}','updatecat');

    Route::delete("/delete/{categorie}",'deletcat')->name('deletecat');
    
});


require __DIR__.'/auth.php';
