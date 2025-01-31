<?php

use App\Http\Controllers\Administrator\AuthController;
use App\Http\Controllers\Administrator\CategoryController;
use App\Http\Controllers\Administrator\ContactController as AdministratorContactController;
use App\Http\Controllers\Administrator\GemstoneController;
use App\Http\Controllers\Administrator\IndexController as AdministratorIndexController;
use App\Http\Controllers\Administrator\KarmkandController;
use App\Http\Controllers\Administrator\ProductController;
use App\Http\Controllers\Administrator\ProviderController as AdministratorProviderController;
use App\Http\Controllers\Administrator\ServiceController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ProviderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[IndexController::class, 'index'])->name('home');
Route::get('/user/account-verification/{user_email}/{registrationtoken}',[FrontAuthController::class,'accountVerification'])->name('account.email.verification');
Route::get('/about',[IndexController::class, 'about'])->name('about');
Route::get('/astrologer',[IndexController::class, 'astrologer'])->name('astrologer');
Route::get('/astrologer/{slug}',[IndexController::class, 'astrologerDetails'])->name('astrologer.details');
Route::get('/karamkand',[IndexController::class, 'karamkand'])->name('karamkand');
Route::get('/karamkand-details',[IndexController::class, 'karamkandDetails'])->name('karamkand-details');
Route::get('/testimonial',[IndexController::class, 'testimonial'])->name('testimonial');
Route::get('/contact',[IndexController::class, 'contact'])->name('contact');
Route::get('/login',[FrontAuthController::class, 'login'])->name('login');
Route::post('/userLogin',[FrontAuthController::class, 'userLogin'])->name('userLogin');
Route::get('/registration',[FrontAuthController::class, 'registration'])->name('registration');
Route::post('/user-registration',[FrontAuthController::class, 'userRegister'])->name('user.register');
Route::get('/userlogout',[FrontAuthController::class, 'logout'])->name('userlogout');
Route::post('/contact-us',[ContactController::class, 'contactUs'])->name('contact-us');
Route::get('/blog',[IndexController::class, 'blog'])->name('blog');
Route::get('/forget-password',[IndexController::class, 'ForgetPassword'])->name('user-forget-password');
Route::post('/user-password/submit-request', [IndexController::class, 'submitForgetPasswordForm'])->name('user.submit.request');
Route::get('/user-password/reset/{token}', [IndexController::class, 'getresetPasswordForm'])->name('user.reset.password.getForm');
Route::post('/user-reset-password', [IndexController::class, 'submitResetPasswordForm'])->name('user-reset.password.post');

// Route::get('/gemstones/gemstone-cat/{slug}/', [IndexController::class, 'gemesCategory'])->name('gemstone.category');
// Route::get('/gemstones', [IndexController::class, 'gemstones'])->name('gemstones');
// Route::get('/filter_gemstones', [IndexController::class, 'filterProducts'])->name('filter.gemstones');

Route::get('/gemstones/gemstone-cat/{slug}/', [IndexController::class, 'gemesCategory'])->name('gemstone.category');
Route::get('/gemstones', [IndexController::class, 'gemstones'])->name('gemstones');
Route::get('/filter_cat_by_gemstones', [IndexController::class, 'filterProducts'])->name('filter.gemstones');
Route::get('/filter_gemstones', [IndexController::class, 'filterGemstones'])->name('filter.gems');

Route::get('/products',[IndexController::class, 'products'])->name('products');
Route::get('/cart',[IndexController::class, 'cart'])->name('cart');
Route::post('/cart-store',[CartController::class, 'cartStore'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::post('/cart-delete',[CartController::class, 'cartDelete'])->name('cart.delete');
Route::get('/checkout',[IndexController::class, 'checkout'])->name('checkout');
// Route::get('/checkout',[IndexController::class, 'checkout'])->name('checkout')->middleware('userauth');
Route::get('user/auth', [IndexController::class, 'userAuth'])->name('user.auth');
// Route::get('/register', [AdministratorIndexController::class, 'register']);
// Route::post('/userlogin', [FrontAuthController::class, 'userLogin'])->name('userLogin');
Route::post('/cart-store-gemstone',[CartController::class, 'addToCartGemstone'])->name('cart.store.gemstone');



Route::get('/astro-profile',[ProviderController::class,'profilePage'])->name('provider.profile');
Route::get('/astro-login',[ProviderController::class,'providerLoginPage'])->name('provider.login');
Route::post('/astrologer-post-login',[ProviderController::class,'providerLogin'])->name('provider.post.login');
Route::get('/astrologer-registration',[ProviderController::class,'registration'])->name('provider.registration');
Route::post('/astrologer-registration-submit',[ProviderController::class,'providerRegister'])->name('provider.post.registration');
// Route::get('/providerlogout',[FrontAuthController::class, 'logout'])->name('providerlogout');
Route::get('/astrologer/account-verification/{user_email}/{registrationtoken}',[ProviderController::class,'accountVerification'])->name('account.email.verification');


Route::redirect('/dashboard', 'dashboard');
Route::redirect('/admin-login', 'login');
Route::get('/admin-login', [AdministratorIndexController::class, 'login'])->name('admin.login');
Route::post('/postlogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/admin-forget-password',[AuthController::class, 'ForgetPassword'])->name('forget-password');
Route::post('/password/submit-request', [AuthController::class, 'submitForgetPasswordForm'])->name('admin.submit.request');
Route::get('/password/reset/{token}', [AuthController::class, 'getresetPasswordForm'])->name('reset.password.getForm');
Route::post('/reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['prefix'=>'dashboard','middleware'=>['auth','adminrestrictions']],function(){
    Route::get('/',[AdministratorIndexController::class,'index'])->name('dashboard');

    // category admin
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/categories/add', [CategoryController::class, 'create'])->name('admin.create.categories');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.store.categories');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit.categories');
    Route::post('/categories/update/{id}', [CategoryController::class, 'updateCategory'])->name('admin.update.categories');
    Route::post('/categories/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.delete.categories');


   // sub category 
    Route::post('/categories/sub_category_store', [CategoryController::class, 'storeSubCategory'])->name('admin.store.sub.categories');

    // gemstones actions
    Route::get('/gemstones', [GemstoneController::class, 'index'])->name('admin.gemstones');
    Route::get('/gemstones/add', [GemstoneController::class, 'create'])->name('admin.create.gemstones');
    Route::post('/gemstones/store', [GemstoneController::class, 'store'])->name('admin.store.gemstones');

    // karmkands actions
    Route::get('/karmkands', [KarmkandController::class, 'index'])->name('admin.karmkands');

    // product actions
    Route::get('/products', [ProductController::class, 'productsList'])->name('admin.products');
    Route::get('/products/add', [ProductController::class, 'productsAdd'])->name('admin.add.products');
    Route::post('/products/store', [ProductController::class, 'storeProduct'])->name('admin.store.products');
    Route::post('/products/product_status_change', [ProductController::class, 'productStatusChange'])->name('admin.products.status_change');
    Route::get('/products/edit/{id}', [ProductController::class, 'editProduct'])->name('admin.edit.products');
    Route::post('/products/update/{id}', [ProductController::class, 'updateProduct'])->name('admin.update.products');
    Route::post('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.delete.products');
    

    // users actions
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/users/users_status_change', [UserController::class, 'userStatusChange'])->name('admin.user.status_change');
    Route::post('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('admin.delete.users');


    // provider actions
    Route::get('/astrologer', [AdministratorProviderController::class, 'index'])->name('admin.astrologer');
    Route::post('/astrologer/provider_status_change', [AdministratorProviderController::class, 'providerStatusChange'])->name('admin.provider.status_change');
    Route::post('/astrologer/delete/{id}', [AdministratorProviderController::class, 'deleteProvider'])->name('admin.delete.providers');
    

    // contact actions
    Route::get('/contact', [AdministratorContactController::class, 'index'])->name('admin.contact');
    Route::post('/contact/delete/{id}', [AdministratorContactController::class, 'deleteContact'])->name('admin.delete.contacts');


    // services actions
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.slot-bookings-create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('admin.slot-bookings-store');
});


// Route::get('/',[AdministratorIndexController::class,'index']);
// Route::get('/dashboard',[AdministratorIndexController::class,'index'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


