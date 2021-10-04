<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'init']);

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
Route::get('/chats', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('chats');
Route::get('/dashboardpage', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('dashboardpage');
Route::get('/analytics', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('analytics');
Route::get('/logout', [
    App\Http\Controllers\Auth\LoginController::class,
    'logout',
]);
Route::get('/waitaccept', [
    App\Http\Controllers\ModelController::class,
    'waitaccept',
])->name('waitaccept');
Route::get('/models', [
    App\Http\Controllers\ModelsController::class,
    'index',
])->name('models');
Route::get('/models/{name}', [
    App\Http\Controllers\ModelsController::class,
    'detail',
]);
Route::get('/userprofile', [
    App\Http\Controllers\ModelController::class,
    'profile',
])->name('userprofile');
Route::get('/editprofile', [
    App\Http\Controllers\ModelController::class,
    'editprofile',
])->name('editprofile');
Route::post('/saveprofile', [
    App\Http\Controllers\ModelController::class,
    'saveprofile',
])->name('saveprofile');
Route::get('/models/{name}/chat', [
    App\Http\Controllers\ModelsController::class,
    'chat',
]);
Route::get('/modelmanagement', [
    App\Http\Controllers\AdminController::class,
    'model',
])->name('modelmanagement');
Route::get('/bannermanagement', [
    App\Http\Controllers\AdminController::class,
    'banner',
])->name('bannermanagement');
Route::get('/advertisemanagement', [
    App\Http\Controllers\AdminController::class,
    'advertise',
])->name('advertisemanagement');
Route::get('/newbanner', [
    App\Http\Controllers\AdminController::class,
    'newbanner',
])->name('newbanner');
Route::get('/newadvertise', [
    App\Http\Controllers\AdminController::class,
    'newadvertise',
])->name('newadvertise');
Route::post('/addnewbanner', [
    App\Http\Controllers\AdminController::class,
    'addnewbanner',
])->name('addnewbanner');
Route::post('/addnewadvertise', [
    App\Http\Controllers\AdminController::class,
    'addnewadvertise',
])->name('addnewadvertise');
Route::get('/delbanner/{post}', [
    App\Http\Controllers\AdminController::class,
    'delbanner',
])->name('delbanner');
Route::get('/deladvertise/{post}', [
    App\Http\Controllers\AdminController::class,
    'deladvertise',
])->name('deladvertise');
Route::get('/editbanner/{post}', [
    App\Http\Controllers\AdminController::class,
    'editbanner',
])->name('editbanner');
Route::get('/editadvertise/{post}', [
    App\Http\Controllers\AdminController::class,
    'editadvertise',
])->name('editadvertise');
Route::post('/editsavebanner', [
    App\Http\Controllers\AdminController::class,
    'editsavebanner',
])->name('editsavebanner');
Route::post('/editsaveadvertise', [
    App\Http\Controllers\AdminController::class,
    'editsaveadvertise',
])->name('editsaveadvertise');
Route::post('/modelaccept', [
    App\Http\Controllers\AdminController::class,
    'accept',
])->name('modelaccept');
Route::post('/modelreject', [
    App\Http\Controllers\AdminController::class,
    'reject',
])->name('modelreject');
Route::get('/premiumvideos', [
    App\Http\Controllers\PremiumvideosController::class,
    'index',
])->name('premiumvideos');
Route::post('/premiumvideos/search', [
    App\Http\Controllers\PremiumvideosController::class,
    'search',
])->name('premiumvideosearch');
Route::get('/explore', [
    App\Http\Controllers\ExploreController::class,
    'index',
])->name('explore');
Route::post('/explore/search', [
    App\Http\Controllers\ExploreController::class,
    'search',
])->name('exploresearch');
Route::get('/favorites', [
    App\Http\Controllers\FavoritesController::class,
    'index',
])->name('favorites');
Route::get('/livenow', [
    App\Http\Controllers\LivenowController::class,
    'index',
])->name('livenow');
Route::get('/blogs', [
    App\Http\Controllers\BlogsController::class,
    'index',
])->name('blogs');
Route::get('/contactus', [
    App\Http\Controllers\ContactusController::class,
    'index',
])->name('contactus');
Route::get('/faqs', [
    App\Http\Controllers\FaqsController::class,
    'index',
])->name('faqs');
Route::get('/managepost', [
    App\Http\Controllers\ManagepostController::class,
    'index',
])->name('managepost');
Route::get('/newpost', [
    App\Http\Controllers\NewpostController::class,
    'index',
])->name('newpost');
Route::post('/editsavepost', [
    App\Http\Controllers\NewpostController::class,
    'editsave',
])->name('editsavepost');
Route::get('/editpost/{post}', [
    App\Http\Controllers\ManagepostController::class,
    'edit',
])->name('editpost');
Route::get('/delpost/{post}', [
    App\Http\Controllers\ManagepostController::class,
    'delete',
])->name('delpost');
Route::post('/addnewpost', [
    App\Http\Controllers\NewpostController::class,
    'add',
])->name('addnewpost');
Route::get('/model/signup', [
    App\Http\Controllers\ModelController::class,
    'signup',
])->name('modelsignup');
Route::get('/fan/signup', [
    App\Http\Controllers\FanController::class,
    'signup',
])->name('fansignup');
Route::post('/cover', [
    App\Http\Controllers\ModelController::class,
    'cover',
])->name('cover');
Route::post('/profile', [
    App\Http\Controllers\ModelController::class,
    'profileimg',
])->name('profile');
Route::post('/paid', [
    App\Http\Controllers\PaidController::class,
    'paid',
])->name('paid');
Route::post('/add-favorite', [
    App\Http\Controllers\FavoritesController::class,
    'add',
])->name('add-favorite');
Route::post('/remove-favorite', [
    App\Http\Controllers\FavoritesController::class,
    'remove',
])->name('remove-favorite');