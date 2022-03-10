<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminPostCategoriesArchiveController;
use App\Http\Controllers\AdminPostCategoriesController;
use App\Http\Controllers\AdminPostsArchiveController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FileController;

use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'showWelcomePage']);

Route::get('about', [AboutController::class, 'showAboutPage']);

Route::get('/test/{id}/{title}', [HomeController::class, 'showParameterizedRoute']);

Route::resource('/posts', PostsController::class);

// Administration
Route::resource('/administration/post-categories/archive', AdminPostCategoriesArchiveController::class);
Route::resource('/administration/post-categories', AdminPostCategoriesController::class);

Route::resource('/administration/posts/archive', AdminPostsArchiveController::class);
Route::resource('/administration/posts', AdminPostsController::class);

Route::resource('/file', FileController::class);


// Route::resource('/file', FileController::class);

// DEMONSTRACIJA LARAVEL FUNKCIJA
// NA PRODUKCIJSKOJ VERZIJI KODA OVOGA NECE BITI

// Route::get('/insert', function() {
//     $post = new Post();
//     $post->title = 'Title 4';
//     $post->content = 'Content 4';

//     $post->save();
// });

// Route::get('/insert/{id}', function($id) {
//     $post = Post::find($id);
//     $post->title = 'Modifued Title 4.1';
//     $post->content = 'Modifued Content 4.1';

//     $post->save();
// });

// Route::get('/delete/{id}', function($id) {
//         $results = Post::destroy($id);
//         return $results;
//     });

Route::get('/softdelete/{id}', function ($id) {
    $post = Post::find($id);
    $post->delete();
});

Route::get('/soft-deleted-posts', function () {
    // $posts = Post::onlyTrashed()->get();
    // $posts = Post::withTrashed()->where('id', 6)->get();
    $posts = Post::all()->where('id', '<', 6);
    return $posts;
});

Route::get('/restore-post', function () {
    $post = Post::onlyTrashed()->where('id', 6);
    $post->restore();
});

Route::get('/forced-delete-post/{id}', function ($id) {
    $post = Post::find($id);
    $post->forceDelete();
});
