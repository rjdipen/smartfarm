<?php

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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'HomeController@index');
// this is for all authenticate user
//===============  START COOKIE GENERATE ===================
Route::get('gen/session', 'User\OrderController@gen_session');
Route::get('remove/session', 'User\OrderController@remove_session');
Route::get('show/temp/list', 'User\StoreController@temp_list');
Route::get('show/temp/list/save', 'User\StoreController@tempsave');
//===============  END COOKIE GENERATE ===================

//    ==================== START STORE ====================
Route::get('shop', 'User\StoreController@index');
Route::get('shop/product', 'User\StoreController@all_product');
Route::get('shop/product/index', 'User\StoreController@indexproduct');
Route::get('shop/product/cat/{id}', 'User\StoreController@product');
Route::get('shop/product/subcat/{id}', 'User\StoreController@product_subcat');
Route::get('shop/search', 'User\StoreController@product_search');
Route::get('shop/product/details', 'User\StoreController@product_details');


//    ==================== START INFORMATION ====================
Route::get('information', 'User\InformationController@index');
Route::get('information/all', 'User\InformationController@allInformation');
Route::get('information/all/index', 'User\InformationController@indexInformation');
Route::get('information/cat/{id}', 'User\InformationController@icatList');
Route::get('information/subcat/{id}', 'User\InformationController@isubcatList');
Route::get('information/search', 'User\InformationController@informationSearch');
Route::get('information/details', 'User\InformationController@informationDetails');
//    ==================== END INFORMATION ====================


//    ==================== START TRAINING ====================
Route::get('training', 'User\TrainingController@index');
Route::get('training/all', 'User\TrainingController@allTseries');
Route::get('training/all/index', 'User\TrainingController@allindexTseries');
Route::get('training/cat/{id}', 'User\TrainingController@tcatList');
Route::get('training/subcat/{id}', 'User\TrainingController@tsubcatList');
Route::get('training/search', 'User\TrainingController@trainingSearch');
Route::get('training/details', 'User\TrainingController@trainingDetails');
//    ==================== END TRAINING ====================




Route::group(['middleware' => 'auth'], function () {

//    ==================== START store ====================
    Route::post('shop/product/review', 'User\StoreController@review');
//    ==================== START DASHBOARD ====================
    Route::get('dashboard', 'User\DashboardController@index');
    Route::post('dashboard/profile/edit', 'User\DashboardController@profileUpdate');
//    ==================== START DASHBOARD ====================

//    ==================== START DELIVERY ====================
    Route::get('shop/checkout', 'DeliveryController@index');
    Route::post('shop/checkout/delivery', 'DeliveryController@save');
//    ==================== END DELIVERY ====================

//    ==================== START PAYMENT ====================
    Route::get('shop/order/payment', 'PaymentController@index');
    Route::post('shop/order/payment/save', 'PaymentController@save');
    Route::get('shop/order/print', 'PaymentController@printOrder');
    Route::get('shop/order/confirm', 'PaymentController@confirmOrder');

//    ==================== END PAYMENT ====================

//    Route::get('shop/checkout', 'User\StoreController@checkout');

//    Route::get('shop/order/print', 'User\OrderController@orderPrint');


//    ==================== END STORE ====================

//    ==================== START AUCTION ====================
    Route::get('auction', 'User\AuctionController@index');
//    ==================== END AUCTION ====================

//    ==================== START BLOG ====================
    Route::get('blog', 'User\BlogController@index');
    Route::get('blog/all', 'User\BlogController@allBlog');
    Route::get('blog/all/index', 'User\BlogController@allBlogIndex');
    Route::get('blog/cat/{id}', 'User\BlogController@blogCat');
    Route::get('blog/search', 'User\BlogController@blogSearch');
    Route::get('blog/details', 'User\BlogController@blogDetails');
    Route::post('blog/details/cmd/save', 'User\BlogController@blogCmd');
    Route::post('blog/details/cmd/edit', 'User\BlogController@blogCmdEdit');
    Route::get('blog/details/cmd/del{id}', 'User\BlogController@blogCmdDel');
    Route::post('blog/details/reply', 'User\BlogController@blogReply');
    Route::post('blog/details/reply/edit', 'User\BlogController@blogReplyEdit');
    Route::get('blog/details/reply/del{id}', 'User\BlogController@blogReplyDel');
//    ==================== END BLOG ====================

Route::group(['middleware' => ['admin']], function () {

    Route::get('admin', 'HomeController@admin')->name('admin');




//    ==================== START CITY ====================
    Route::get('city', 'Information\CityController@index');
    Route::post('city/save', 'Information\CityController@save');
    Route::post('city/edit', 'Information\CityController@edit');
    Route::get('city/del{id}', 'Information\CityController@del');
//    ==================== END CITY ====================

//    ==================== START STATE ====================
    Route::get('state', 'Information\StateController@index');
    Route::post('state/save', 'Information\StateController@save');
    Route::post('state/edit', 'Information\StateController@edit');
    Route::get('state/del{id}', 'Information\StateController@del');
//    ==================== END STATE ====================

//    ==================== START INFORMATION ====================

//    ==================== START CATEGORY ====================
    Route::get('icat/list', 'Information\IcatController@index');
    Route::post('icat/save', 'Information\IcatController@save');
    Route::post('icat/edit', 'Information\IcatController@edit');
    Route::get('icat/del{id}', 'Information\IcatController@del');
//    ==================== END CATEGORY ====================

//    ==================== START SUBCATEGORY ====================
    Route::get('isubcat/list', 'Information\IsubcatController@index');
    Route::post('isubcat/save', 'Information\IsubcatController@save');
    Route::post('isubcat/edit', 'Information\IsubcatController@edit');
    Route::get('isubcat/del{id}', 'Information\IsubcatController@del');
//    ==================== END SUBCATEGORY ====================

//    ==================== START SERIES ====================
    Route::get('iseries/list', 'Information\IseriesController@index');
    Route::post('iseries/save', 'Information\IseriesController@save');
    Route::post('iseries/edit', 'Information\IseriesController@edit');
    Route::get('iseries/del{id}', 'Information\IseriesController@del');
    Route::get('iseries/steps_list{id}', 'Information\IseriesController@steps_list');
    Route::get('iseries/subcat/api', 'Information\IseriesController@category_list');
    Route::get('iseries/city/api', 'Information\IseriesController@state_list');

//    ==================== END SERIES ====================

//    ==================== START STEPS ====================
    Route::get('steps/list', 'Information\IstepController@index');
    Route::post('steps/create', 'Information\IstepController@save');
    Route::post('steps/edit', 'Information\IstepController@edit');
    Route::get('steps/del{id}', 'Information\IstepController@del');
    Route::get('steps/update/{id}', 'Information\IstepController@update');
//    ==================== END STEPS ====================

//    ==================== END INFORMATION ====================


//    ==================== MAKE ADMIN ====================
    Route::get('user/list', 'HomeController@allUSer');
    Route::get('user/user', 'HomeController@makeUser');
    Route::get('user/admin', 'HomeController@makeAdmin');
    Route::get('user/del/{id}', 'HomeController@del');
//    ==================== MAKE ADMIN ====================



//    ==================== START TRAINING ====================

//    ==================== START SERIES ====================
    Route::get('tseries/list', 'Traning\TseriesController@index');
    Route::post('tseries/save', 'Traning\TseriesController@save');
    Route::post('tseries/edit', 'Traning\TseriesController@edit');
    Route::get('tseries/del/{id}', 'Traning\TseriesController@del');
    Route::get('tseries/subcategory', 'Traning\TseriesController@subcategory_list');
    Route::get('tseries/subcategory/{id}', 'Traning\TseriesController@steps_list');
//    ==================== END SERIES   ====================

//    ==================== START EPISODE   ====================
    Route::post('tepisode/save', 'Traning\TitemsController@save');
    Route::post('tepisode/edit', 'Traning\TitemsController@edit');
    Route::get('tepisode/del/{id}', 'Traning\TitemsController@del');

//    ==================== END EPISODE   ====================

//    ==================== END TRAINING   ====================


//    ==================== START SHOP ====================
    //    ==================== START CATEGORY ====================
    Route::get('scat/list', 'Store\ScatController@index');
    Route::post('scat/save', 'Store\ScatController@save');
    Route::post('scat/edit', 'Store\ScatController@edit');
    Route::get('scat/del{id}', 'Store\ScatController@del');
//    ==================== END CATEGORY ====================

//    ==================== START SUBCATEGORY ====================
    Route::get('ssubcat/list', 'Store\SsubcatController@index');
    Route::post('ssubcat/save', 'Store\SsubcatController@save');
    Route::post('ssubcat/edit', 'Store\SsubcatController@edit');
    Route::get('ssubcat/del{id}', 'Store\SsubcatController@del');
//    ==================== END SUBCATEGORY ====================




//    ==================== START PRODUCT ====================
    Route::get('store/list', 'Store\ProductController@index');
    Route::post('store/save', 'Store\ProductController@save');
    Route::post('store/edit', 'Store\ProductController@edit');
    Route::get('store/del{id}', 'Store\ProductController@del');
    Route::get('store/subcat/api', 'Store\ProductController@subcat_list');
    Route::get('store/order/list', 'Store\ProductController@orderList');
    Route::get('store/order/{id}', 'Store\ProductController@orderdel');
    Route::get('store/shipping', 'Store\ProductController@orderShip');
//    ==================== END PRODUCT ====================


//    ==================== END SHOP ====================

//    ==================== START BLOG ====================

//    ==================== START BLOG CATEGORY ====================
    Route::get('bcat/list', 'Blog\BcatController@index');
    Route::post('bcat/save', 'Blog\BcatController@save');
    Route::post('bcat/edit', 'Blog\BcatController@edit');
    Route::get('bcat/del{id}', 'Blog\BcatController@del');
//    ==================== END BLOG CATEGORY ====================

//    ==================== START BLOG ====================
    Route::get('blog/list', 'Blog\BlogController@index');
    Route::get('blog/create', 'Blog\BlogController@create');
    Route::get('blog/update{id}', 'Blog\BlogController@update');
    Route::post('blog/save', 'Blog\BlogController@save');
    Route::post('blog/edit', 'Blog\BlogController@edit');
    Route::get('blog/del{id}', 'Blog\BlogController@del');
//    ==================== END BLOG  ====================



//    ==================== END BLOG ====================



    });
});


Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

