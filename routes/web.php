<?php

use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Debut;
use App\Http\Controllers\GestionAdmin;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\JouerControllerSite;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use App\Livewire\JouerComponent;
use App\Models\Calendrier;
use App\Models\Categorie;
use App\Models\Jouer;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [Debut::class, "index"])->name('index');
Route::get('/dashboard', function () {
    return view('dashboard',[
                                'users'=>User::paginate(10),
                                'categories'=>Categorie::all(),
                                "posts"=>Post::paginate(10),
                                "jouers"=>Jouer::orderBy("id","DESC")->limit(10)->get(),
                                "calendriers"=>Calendrier::orderBy("id","DESC")->paginate(10),
                            ]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name('dashboard');
/*
Route::get('admin/dashboard', function () {
    return view('dashboard',['users'=>User::paginate(10),'categories'=>Categorie::all(),"posts"=>Post::paginate(10),"jouers"=>Jouer::orderBy("DESC")->get(10)]);
})->middleware(['auth', 'verified','rolemanager:admin'])->name('admin.dashboard');
*/
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

        Route::get('/jouers', [JouerControllerSite::class, 'index'])->name('jouers.index');
    });
});
Route::get('admin/posts', [PostController::class, 'index'])->name('admin.posts.index')->middleware('rolemanager:admin');

Route::get('admin/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');




Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Routes pour les sections
        Route::get('/jouers/create', [JouerControllerSite::class, 'create'])->name('jouers.create');
        Route::post('/jouers', [JouerControllerSite::class, 'store'])->name('jouers.store');
        Route::get('/jouers/{jouer}', [JouerControllerSite::class, 'show'])->name('jouers.show');
        Route::get('/jouers/{jouer}/edit', [JouerControllerSite::class, 'edit'])->name('jouers.edit');
        Route::post('/jouers/{jouer}/', [JouerControllerSite::class, 'update'])->name('jouers.update');
        Route::delete('/jouers/{jouer}', [JouerControllerSite::class, 'destroy'])->name('jouers.destroy');
    });
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




Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    // Liste des calendriers
    Route::get('/admin/calendrier', [CalendrierController::class, 'index'])
        ->name('admin.calendrier.index');
    
    // Formulaire de création
    Route::get('/admin/calendrier/create', [CalendrierController::class, 'create'])
        ->name('admin.calendrier.create');
    
    // Enregistrement d'un nouveau calendrier
    Route::post('/admin/calendrier', [CalendrierController::class, 'store'])
        ->name('admin.calendrier.store');
    
    // Affichage d'un calendrier
    Route::get('/admin/calendrier/{calendrier}', [CalendrierController::class, 'show'])
        ->name('admin.calendrier.show');
    
    // Formulaire d'édition
    Route::get('/admin/calendrier/{calendrier}/edit', [CalendrierController::class, 'edit'])
        ->name('admin.calendrier.edit');
    
    // Mise à jour d'un calendrier
    Route::post('/admin/calendrier/{calendrier}', [CalendrierController::class, 'update'])
        ->name('admin.calendrier.update');
    
    // Suppression d'un calendrier
    Route::delete('/admin/calendrier/{calendrier}', [CalendrierController::class, 'destroy'])
        ->name('admin.calendrier.destroy');
});


Route::get('/jouers', function(){
    return view('jouers.index',[
        'gardiens'=>Jouer::where('poste', 'LIKE', 'gardien')->get(),
        'attaquants'=>Jouer::where('poste', 'LIKE', 'attaquant')->get(),
        'defenseurs' => Jouer::where('poste', 'LIKE', 'Défenseur')
        ->orWhere('poste', 'LIKE', 'Défenseur central')
        ->orWhere('poste', 'LIKE', 'Défenseur latéral')
        ->get(),
        'milieu'=>Jouer::where('poste', 'LIKE', 'milieu')
        ->orWhere('poste', 'LIKE', 'Milieu offensif')
        ->orWhere('poste', 'LIKE', 'Milieu défensif')
        ->get()
        ,
    ]);
})->name('jouers.index');
Route::get('/jouers/{jouer}/{slug}', function(string $jouer){
    $jouer =Jouer::find($jouer);
    return view('jouers.show',['jouer'=>$jouer]);
})->where([
    'jouer'=>'[0-9]+',
    'slug'=>'[a-zA-Z0-9\-]+'
])->name('joueur.show');

Route::get('/story' , function(){
    return view('admin.story.index');
})->name('story.index');
require __DIR__.'/auth.php';
Route::get('/counter', Counter::class);