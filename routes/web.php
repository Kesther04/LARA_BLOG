<?php


use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CommentController;

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

Route::get('/', function () {
    $posts = Post::take(25)->latest()->get();
    $rpo = Post::inRandomOrder()->take(3)->get();
    return view('home',['posts' => $posts,'rpo' => $rpo]);
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',function () {return redirect('/auth/login');});
Route::get('/auth/login',function(){return view('/auth/login');});

//for User Authentication
Route::post('/backend_reg', [UserController::class, 'register']);
Route::post('/backend_login', [UserController::class, 'login']);
Route::get('/dashboard/news_upload',function(){return view('/dashboard/news_upload');});

//for Authentication of Posts
Route::post('/dashboard/backend_news', [PostController::class, 'post']);
Route::get('/posts/allposts/{title}', [PostController::class, 'postScreen']);
Route::get('/posts/allpop/{id}', [LikeController::class, 'likePost']);
Route::post('/posts/allposts/backend_comm',[CommentController::class, 'postComment']);
Route::post('/posts/allrep', [RepController::class, 'repScreen']);
Route::post('/posts/allrex', [RepController::class, 'postReply']);

//for Navigations
Route::get('news/politics', function(){return view('news/politics');});
Route::get('news/local', function(){return view('news/local');});
Route::get('news/metro', function(){return view('news/metro');});
Route::get('news/global', function(){return view('news/global');});
Route::get('entertainment/celebrities', function(){return view('entertainment/celebrities');});
Route::get('entertainment/music', function(){return view('entertainment/music');});
Route::get('entertainment/movies', function(){return view('entertainment/movies');});
Route::get('lifestyle/fashion', function(){return view('lifestyle/fashion');});
Route::get('lifestyle/beauty&health', function(){return view('lifestyle/beauty&health');});
Route::get('lifestyle/relationships&weddings', function(){return view('lifestyle/relationships&weddings');});
Route::get('lifestyle/culture_related', function(){return view('lifestyle/culture_related');});
Route::get('sports/sports', function(){return view('sports/sports');});
Route::get('business/international', function(){return view('business/international');});
Route::get('business/national', function(){return view('business/national');});
Route::get('quizzes/quizzes', function(){return view('quizzes/quizzes');});