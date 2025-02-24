<?php

use App\Http\Controllers\GestionAdmin;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use App\Livewire\JouerComponent;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/dashboard', function () {
    return view('dashboard',['users'=>User::paginate(10),'categories'=>Categorie::all(),"posts"=>Post::paginate(10)]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name('dashboard');

Route::get('admin/dashboard', function () {
    return view('dashboard',['users'=>User::paginate(10),'categories'=>Categorie::all(),"posts"=>Post::paginate(10)]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name('admin.dashboard');

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
        Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        
        // Suppression d'un post
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        Route::get('/jouers', JouerComponent::class)->name('jouers.index');
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
Route::middleware(['auth','verified','rolemanager:admin'])->group(function () {
    // Route pour changer le rôle d'un utilisateur (admin <-> utilisateur)
    Route::patch('/admin/users/{user}/toggle-role', [GestionAdmin::class, 'toggleRole'])
        ->name('admin.toggleUserRole');

    // Route pour supprimer un utilisateur
    Route::delete('/admin/users/{user}/delete', [GestionAdmin::class, 'deleteUser'])
        ->name('admin.deleteUser');
    Route::patch('/admin/{id}/toggle-status', [GestionAdmin::class, 'toggleStatus'])->name('admin.toggleStatus');

});



Route::prefix('/new')->controller(GestionAdmin::class)->middleware(['auth', 'verified','rolemanager:admin'])->name('admin.')->group(function (){
    Route::get('/category','newcat')->name('newcat');
    Route::post('/category','savecat');

    Route::get('/category/{categorie}','editcat')->name('editcat');
    Route::post('/category/{categorie}','updatecat');

    Route::delete("/delete/{categorie}",'deletcat')->name('deletecat');
    
});

Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

require __DIR__.'/auth.php';
Route::get('/counter', Counter::class);