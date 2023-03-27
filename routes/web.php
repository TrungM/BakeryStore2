<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
// Start//---Category ---///

Route::get('home', [HomeController::class, 'home']);
Route::get('service', [HomeController::class, 'service']);
Route::get('sign', [HomeController::class, 'sign']);

// END

// sign in

Route::get('login', [LoginController::class, 'login']);
Route::post("active_login", [LoginController::class, "login_profile"]);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('logout_home', [LoginController::class, 'logout_home']);

//sign up

Route::get('sign', [LoginController::class, 'sign_up']);

Route::post("active_sign",[LoginController::class,"active_sign_up"]);

//forgetPassword

Route::get('forgetPassword', [LoginController::class, 'loadViewforgetPassword']);
Route::post('active_forgetPassword', [LoginController::class, 'liveforgetPassword']);

// create new pass
Route::middleware('checkpass')->group(function () {
    Route::get('create-new-pass', [LoginController::class, 'loadViewCreateNewPass']);
Route::post('active_new_pass', [LoginController::class, 'active_new_pass']);
});
// login google
//composer require laravel/socialite
Route::get('logingoogle', [LoginController::class, 'redirectToGoogle']);
Route::get('google/callback', [LoginController::class, 'callback_google']);

Route::middleware('checkcustomer')->group(function () {
});


// ----Start---admin
Route::prefix('admin')->middleware('checkadmin')->group(function () {

    /////////------------------------------Manager---------Start------/////////////////
    Route::get('index', [AdminController::class, 'adminindex']);
    Route::get('dashboard', [AdminController::class, 'showdashboard']);
    Route::post('admin-dashboard', [AdminController::class, 'dashboard']);
    Route::get('manager_order', [AdminController::class, 'managerOder']);
    Route::get('index', [AdminController::class, 'adminindex']);
    Route::get('customer', [AdminController::class, 'users']);
    Route::get('staff', [AdminController::class, 'staff']);
    Route::get('displayAddUser', [AdminController::class, 'displayAddUser']);
    Route::post('addUser', [AdminController::class, 'addUser']);
    Route::get('resetPassword/{id}', [AdminController::class, 'resetPassword']);
    Route::get('details/{id}', [AdminController::class, 'details'])->name('profile');

    Route::post('updateInfoPost/{id}', [AdminController::class, 'updateInfoPost']);
    Route::get('updateInfo/{id}', [AdminController::class, 'updateInfo']);
    Route::get('customer_order/{id}', [AdminController::class, 'customerOrder']);
    Route::get('customer_orderdetail/{code}', [AdminController::class, 'customerOrderdetail']);

    Route::get('manager_order', [OrderController::class, 'managerOder']);
    Route::get('view_order/{order_code}', [OrderController::class, 'viewOrder']);
    Route::get('update/{order_code}', [OrderController::class, 'Update']);

        /////////------------------------------Manager---------END------/////////////////

});



Route::middleware('checkadmin')->group(function () {


// quan ly bai viet

Route::get('admin/post', [PostController::class, 'add_post']);
Route::get('admin/list-post', [PostController::class, 'all_post']);
Route::post('/save-post', [PostController::class, 'save_post']);
Route::get('/delete-post/{post_id}', [PostController::class, 'delete_post']);
Route::get('post-bai-viet', [PostController::class, 'post_bai_viet']);
Route::get('bai-viet/{post_title}', [PostController::class, 'bai_viet']);
//end
// admin product
// Route::prefix('admin')->middleware('checkadmin')->group(function () {
// });
Route::get('admin/adminproduct', [ProductController::class, 'adminproductmanage']);
Route::get('/product2', [ProductController::class, 'searchPost']);
Route::get('admin/productinsert', [ProductController::class, 'insert']);
Route::post('admin/insertPost', [ProductController::class, 'insertPost']);
Route::get('admin/productupdate/{product_id}', [ProductController::class, 'update']);
Route::post('admin/updatePost/{id}',  [ProductController::class, 'updatePost']);
Route::get('admin/delete/{id}', [ProductController::class, 'delete']);
// search2
Route::POST('/tim-kiem', [ProductController::class, 'search2']);
Route::get('/ascproducts_search', [ProductController::class, 'ascproducts_search']);
Route::get('/desproducts_search', [ProductController::class, 'desproducts_search']);
});

// route cho tat ca cac trang nguoi dung
// ----Start---

Route::get('store', [AccountController::class, 'store']);



//---- END---



// admin-dashboard: dang nhu 1 cai ham
// check out
Route::middleware('checkcustomer')->group(function () {

Route::get('checkout', [CheckoutController::class, 'checkout']);
Route::post('district', [CheckoutController::class, 'district']);
Route::post('wards', [CheckoutController::class, 'wards']);
Route::get('purchase/{customer_id}', [CheckoutController::class, 'purchase']);


});
// Route::post('add_customer', [CheckoutController::class, 'addCustomer']);
Route::post('customer_information', [CheckoutController::class, 'customerInformation']);
Route::post('save_customer_shipping', [CheckoutController::class, 'saveCustomerShipping']);
Route::post('update_customer/{customer_id}', [CheckoutController::class, 'updateCustomer']);
Route::get('delivery', [CheckoutController::class, 'delivery']);
Route::post('select_delivery', [CheckoutController::class, 'select_delivery']);

//---- END---


// Start//---Products---///
Route::get('product', [ProductController::class, 'product']);
Route::get('product/ASCproduct', [ProductController::class, 'ascproducts']);
Route::get('product/DESproduct', [ProductController::class, 'descproducts']);
Route::get('view-favourite', [ProductController::class, 'viewfavourite']);
Route::get('view-product/{id}', [ProductController::class, 'viewproduct']);
Route::get('category', [ProductController::class, 'category']);

Route::post('load-comment', [ProductController::class, 'loadComment']);
Route::post('send-comment', [ProductController::class, 'sendComment']);
Route::get('admin/comment_admin', [ProductController::class, 'admin_comment_save']);
Route::post('allow_comment', [ProductController::class, 'allowComment']);
Route::post('reply_comment', [ProductController::class, 'replyComment']);



//phan cua admin
Route::get('index', [ProductController::class, 'index']);
Route::get('adminproductmanage', [ProductController::class, 'adminproductmanage']);
Route::get('productinsert', [ProductController::class, 'insert']);
Route::post('insertPost', [ProductController::class, 'insertPost']);
Route::get('productupdate/{product_id}', [ProductController::class, 'update']);
Route::post('updatePost/{id}',  [ProductController::class, 'updatePost']);
Route::get('delete/{id}', [ProductController::class, 'delete']);
Route::get('admin/size', [ProductController::class, 'sizeManager']);
Route::post('sizeManager_insert', [ProductController::class, 'sizeManager_insert']);
Route::get('admin/add_size', [ProductController::class, 'sizeManager_insert_1']);
Route::get('admin/update_size/{size_id}', [ProductController::class, 'update_page']);
Route::post('admin/updateSize/{size_id}',  [ProductController::class, 'updateSize']);
Route::get('delete_size/{size_id}', [ProductController::class, 'delete_size']);

// END

// Start//---Cart ---///

// Route::get('/AddCart/{prod_id}', [CartController::class, 'AddCart']);


Route::get('show_cart', [CartController::class, 'show_cart']);
Route::post('save_cart', [CartController::class, 'save_cart']);
Route::post('update_cart_quantity', [CartController::class, 'update_cart_quantity']);
Route::post('update_cart_size', [CartController::class, 'update_cart_size']);
Route::get('delete-to-cart/{rowId}', [CartController::class, 'deleteTocart']);

// END

// Start//---Category ---///

Route::get('submenu/{category_id}', [CategoryController::class, 'submenu']);
Route::get('submenu/ascproducts_category/{category_id}', [CategoryController::class, 'ascproducts_category']);
Route::get('submenu/desproducts_category/{category_id}', [CategoryController::class, 'desproducts_category']);

// END
// Start//---Order ---///

Route::post('update_status', [OrderController::class, 'updateStatus']);

// END
// Start//---User-information ---///
Route::get('detail-customer/{customer_id}', [HistoryController::class, 'userinformation']);
Route::get('menu_order/{order_code}', [HistoryController::class, 'menuOrder']);
Route::get('delete_order/{order_code}', [HistoryController::class, 'DeleteOrder']);

Route::get('order_detail_user/{order_code}', [HistoryController::class, 'OrderDetailUser']);
Route::get('admin/feedback_admin', [HistoryController::class, 'admin_feedback_save']);
Route::get("feedback/{order_code}/{id}",[CheckoutController::class,'feebackLoadView']);
Route::post('load_feedback', [HistoryController::class, 'loadfeedback']);
Route::post('send-feedback', [HistoryController::class, 'sendfeedback']);
Route::post('allow_feedback', [HistoryController::class, 'allowfeedback']);
Route::post('reply_feedback', [HistoryController::class, 'replyfeedback']);
Route::post('load-rating', [HistoryController::class, 'starFeedback']);
Route::post('insert-rating', [HistoryController::class, 'insertRating']);
Route::post('send_feedback/{product_id}', [HistoryController::class, 'sendFeedback']);
Route::post('showDetailorder', [HistoryController::class, 'showDetailorder']);

Route::get('history_order/{customer_id}', [HistoryController::class, 'history_order']);

// END

// Start//---User-information ---///
Route::middleware('checkcustomer')->group(function () {

Route::get('detail-profile/{customer_id}', [ProfileController::class, 'loadViewProfile']);
Route::post('detail-profile/edit/{customer_id}', [ProfileController::class, 'editDetailProfile']);
Route::post('detail-profile/change-password/{customer_id}', [ProfileController::class, 'ChangePassword']);
Route::post('detail-profile/uploadimg/{customer_id}', [ProfileController::class, 'uploadImageProfile']);

});
// END
