<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavedListController;
use App\Http\Controllers\UserController;
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


/*--- LOGOUT MODULE----*/
Route::get('/logout', [HomeController::class, 'logout'])->name('logout.get');

/*--- HOME MODULE----*/
Route::get('/', [HomeController::class, 'home'])->name('home.get');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact.get');
/*--- CONTACT EMAIL MODULE ---*/
Route::post('/post-message', [UserController::class, 'postMessage'])->name('post-message.get');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq.get');
Route::get('/about', [HomeController::class, 'about'])->name('about.get');

/*--- LOGIN MODULE----*/
Route::get('/login', [HomeController::class, 'login'])->name('login.get');
Route::post('/login', [HomeController::class, 'postLogin'])->name('login.post');

/*--- SIGNUP MODULE----*/
Route::get('/signup', [HomeController::class, 'signup'])->name('signup.get');
Route::post('/signup', [HomeController::class, 'postSignup'])->name('signup.post');

/*--- USER MODULE ---*/
Route::middleware(['auth', 'check.user.profile'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.get');
    /*--- RENTAL MODULE ---*/
    Route::get('/rentals', [UserController::class, 'rentals'])->name('rentals.get');
    Route::get('/view-rental/{id}', [UserController::class, 'viewRental'])->name('view-rental.get');
    Route::get('/publish-rental', [UserController::class, 'publishRental'])->name('publish-rental.get');
    Route::post('/publish-rental', [UserController::class, 'postRental'])->name('publish-rental.post');

    /*--- SERVICE MODULE ---*/
    Route::get('/services', [UserController::class, 'services'])->name('services.get');
    Route::get('/view-service/{id}', [UserController::class, 'viewService'])->name('view-service.get');
    Route::get('/publish-service', [UserController::class, 'publishService'])->name('publish-service.get');
    Route::post('/publish-service', [UserController::class, 'postService'])->name('publish-service.post');

    /*--- MY POSTS MODULE ---*/
    Route::get('/my-posts', [UserController::class, 'viewMyPosts'])->name('myPosts.get');
    /*---------------> MY POSTS MODULE (RENT) ---*/
    Route::get('/my-posts/rent/edit/{id}', [UserController::class, 'fetchMyPostRent'])->name('edit-my-post-rent.get');
    Route::put('/my-posts/rent/{id}', [UserController::class, 'updateMyRentPosts'])->name('update-my-post-rent.put');
    Route::get('/my-posts/rent/{id}', [UserController::class, 'deleteRentPost'])->name('delete-rent.delete');
    /*---------------> MY POSTS MODULE (SERVICE) ---*/
    Route::get('/my-posts/service/edit/{id}', [UserController::class, 'fetchMyPostService'])->name('edit-my-post-service.get');
    Route::put('/my-posts/service/{id}', [UserController::class, 'updateMyServicePosts'])->name('update-my-post-service.put');
    Route::get('/my-posts/service/{id}', [UserController::class, 'deleteServicePost'])->name('delete-service.delete');
    /*--- SAVED LIST MODULE ---*/
    Route::get('/saved-listings', [SavedListController::class, 'viewSavedListings'])->name('saved-listings.get');
    Route::post('/wishlist/add', [SavedListController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [SavedListController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::post('/wishlist/toggle', [SavedListController::class, 'toggleWishlist'])->name('wishlist.toggle');

    Route::get('/view-profile/{id}', [UserController::class, 'viewProfile'])->name('view-profile.get');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('password.get');
    Route::post('/change-password', [UserController::class, 'changePasswordUpdate'])->name('password.post');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.get');
    Route::put('/profile', [UserController::class, 'profileUpdate'])->name('profile.put');

});

