<?php
use App\Product;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard','App\Http\Controllers\OrderController@index')->name('dashboard'); 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/','App\Http\Controllers\ProductController@index')->name('acceuil'); 


/* Produit */
Route::get('/viewItem/{id}','App\Http\Controllers\ProductController@show')->name('products.show');

/* Panier */
Route::get('/Panier','App\Http\Controllers\CartController@index')->name('Panier');
Route::post('/Panier/ajout','App\Http\Controllers\CartController@store')->name('Cart.store');
Route::get('/VidePanier', 'App\Http\Controllers\CartController@Detruir')->name('Panier_vide');
Route::patch('/Panier/{rowid}','App\Http\Controllers\CartController@update')->name('Update');
Route::get('/Panier/{rowid}','App\Http\Controllers\CartController@destroy')->name('delete');

/* Checkout */

Route::middleware('auth')->group(function () {
Route::get('/Paiement','App\Http\Controllers\CheckoutController@index')->name('paiement');
Route::post('/Paiement','App\Http\Controllers\CheckoutController@store')->name('paiement.store');
Route::get('stripe','App\Http\Controllers\CheckoutController@stripe')->name('stripe');
Route::post('stripe', 'App\Http\Controllers\CheckoutController@stripePost')->name('stripe.post');

});

/*mail gerer*/
Route::get('/send-email', 'App\Http\Controllers\MailController@sendEmail');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

//bakaladmin@gmail.com
//admin