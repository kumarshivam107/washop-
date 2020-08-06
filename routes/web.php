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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',"indexController@index");

Route::match(['get','post'],'/admin', "adminController@adminlogin");
Route::get('/productdetail/{id}','indexController@productdetail');
//Creating Route For About Us Page:-
Route::get('/aboutus','indexController@aboutus');
//Creating Route For Contact Us Page:-
Route::match(['get','post'],'/contactus','indexController@contactus');
// Craeting Route For Category Wise Product Showing
Route::get('/categorylist/{id}','indexController@categorylist');
//Creating Route For Getting updated price:-
Route::get('/getupdated-price/{id}','indexController@updatedprice');
//Creating Route For Cart Page:-
Route::get('/cart','indexController@cart');
//Creating a Route For Cart Database Entry:-
Route::match(['get','post'],'/addcart','indexController@addcart');
//Deleting the Cart:-
Route::get('/deletecart/{id}','indexController@deletecart');
//Updating the Quantity:-
Route::match(['get','post'],'/update-quantity/{mark}/{id}','indexController@updatequantity');
//Route For Creating Login/Register page:-
Route::get('/login-register','userController@userlogin');
//Route For Singup a User as Normal user:-
Route::post('/user-register','userController@userRegister');
//Route For Login a User as Normal user:-
Route::match(['get','post'],'/user-login','usercontroller@userslogin');

//Route For Email Verfication:-
Auth::routes(['verify' => true]);
 
//Creating Middleware for User protected Page:-
Route::group(['middleware'=>['frontlogin']],function(){
    //Route For Logout a user:-
    Route::match(['get','post'],'/userlogout','userController@userslogout');
    //Route For My Account Page:-
    Route::match(['get','post'],'/myaccount','userController@myaccount');
    //Route for Change the password of Accunt:-
    Route::match(['get','post'],'/myaccount/changepassword','userController@changepassword');
    //Route For Address Adding Page:-
    Route::match(['get','post'],'/myaccount/myaddress','userController@myaddress');
    //Route For Checkout Page:-
    Route::match(['get','post'],'/checkout','userController@checkout');
    //Route For Edit Address Page:-
    Route::match(['get','post'],'/editaddress/{id}','userController@editaddress');
    //Route For Oder-Review Page:-
    Route::match(['get','post'],'/order-review','userController@orderReview');
    //Route For placing Order:-
    Route::match(['get','post'],'/place-order','orderController@placeorder');
    //Routes For Thanks Page:-
    Route::get('/thanks','orderController@thanks');
    //Routes For Order View Section:-
    Route::match(['get','post'],'/myaccount/myorders','orderController@myorders');
    //Routes For View Details of Order:-
    Route::match(['get','post'],'/myorders/viewDetails/{id}','orderController@viewDetails');
    //Route For gettting payment gateway:-
    Route::match(['get','post'],'/paymentgateway','orderController@paymentgateway');
});
Route::group(['middleware'=>['auth']],function(){
    // Category Routes
    Route::match(['get','post'],'/admin/addcategory',"categoryController@addcategory");
    Route::get('/admin/viewcategory','categoryController@viewcategory');
    Route::match(['get','post'],'/admin/editcategory/{id}','categoryController@editcategory');
    Route::match(['get','post'],'/admin/deletecategory/{id}','categoryController@deletecategory');
    Route::match(['get','post'],'/admin/updatecategorystatus','categoryController@update_status');
    // Products Routes
    Route::get('/admin/dashboard',"adminController@admindashboard");
    Route::match(['get','post'],'/addproduct','adminController@addproduct');
    Route::get('viewproduct','adminController@viewproduct');
    Route::match(['get','post'],'editproduct/{id}','adminController@editproduct');
    Route::get('/deleteproduct/{id}','admincontroller@deleteproduct');
    Route::match(['get','post'],'/admin/updateproductstatus','adminController@update_status');
    Route::match(['get','post'],'/admin/getsubcategory/{id}','adminController@getsubcategory');
    Route::match(['get','post'],'/admin/featurestatus','adminController@featurestatus');
    //Bannner Routes:-
    Route::match(['get','post'],'/admin/addbanner','bannerController@addbanner');
    Route::get('/admin/viewbanner','bannerController@viewbanner');
    Route::match(['get','post'],'/admin/editbanner/{id}','bannerController@editbanner');
    Route::get('/admin/deletebanner/{id}','bannerController@deletebanner');

    //Product Attributes Route:-
    Route::match(['get','post'],'/admin/addproductattribute/{id}','productController@addattribute');
    Route::match(['get','post'],'/admin/deleteattribute/{id}','productController@deleteattribute');
    Route::post('/admin/editattribute/{id}','productController@editattribute');

    //Add Image Route:-
    Route::match(['get','post'],'/admin/addimage/{id}','productController@addimage');
    Route::match(['get','post'],'/admin/delete-alt-image/{id}','productController@deleteimage');

    //View Order Route:-
    Route::match(['get','post'],'/admin/orders','productController@vieworder');
});

Route::get('/logout','adminController@adminlogout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
