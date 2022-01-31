<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Session;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\SitesettingController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\ApiController;


Route::get('/', function () {
    return view('admin.login');
});



Route::get('admin/login','App\Http\Controllers\Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('admin/login', 'App\Http\Controllers\Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('admin/logout', 'App\Http\Controllers\Auth\AdminAuthController@logout')->name('adminLogout');


Route::get('admin/dashboard','App\Http\Controllers\DashboardController@dashboard')->name('dashboard');

Route::get('admin/changepassword','App\Http\Controllers\ChangepasswordController@index')->name('changepassword');
Route::post('admin/update_password','App\Http\Controllers\ChangepasswordController@change_password')->name('update_password');

//---Site Setting Routes---
Route::get('admin/sitesetting','App\Http\Controllers\SitesettingController@index')->name('sitesetting');
Route::post('admin/addupdatesitesetting','App\Http\Controllers\SitesettingController@addUpdateSetting')->name('addUpdateSiteSetting');

//---Manage Email- Template Routes---
Route::get('admin/email_template','App\Http\Controllers\EmailTemplateController@index')->name('email_template');
Route::get('admin/add_email_template','App\Http\Controllers\EmailTemplateController@addEmailTemplate')->name('addEmailTemplate');
Route::post('admin/ckeditor_upload','App\Http\Controllers\EmailTemplateController@ckeditor_upload')->name('ckeditor_upload');
Route::post('admin/addEmailTemplateData','App\Http\Controllers\EmailTemplateController@addEmailTemplateData')->name('addEmailTemplateData');
Route::get('admin/emailTemplateList','App\Http\Controllers\EmailTemplateController@emailTemplateList')->name('emailTemplateList');
Route::get('admin/changeStatus','App\Http\Controllers\EmailTemplateController@changeStatus')->name('changeStatus');
Route::get('admin/deleteEmailTemp','App\Http\Controllers\EmailTemplateController@deleteEmailTemp')->name('deleteEmailTemp');
Route::get('admin/editMailTemp/{id}','App\Http\Controllers\EmailTemplateController@editMailTemp')->name('editMailTemp');
Route::post('admin/updateMailTemp','App\Http\Controllers\EmailTemplateController@updateMailTemp')->name('updateMailTemp');
Route::get('admin/getId','App\Http\Controllers\EmailTemplateController@getId')->name('getId');


Route::get('admin/user','App\Http\Controllers\UserController@index')->name('user');
Route::get('admin/userList','App\Http\Controllers\UserController@userList')->name('userList');

//API
Route::post('Api/login','App\Http\Controllers\ApiController@login')->name('login');

// Route::get('/', function () {
//     return view('admin.login');
// });

// Route::get('/admin/dashboard',[DashboardController::class,'index']);

// Route::get('/admin/login',[LoginController::class,'index']);
// Route::post('/admin/loginForm',[LoginController::class,'login']);

// Route::get('/admin/logout',[LoginController::class,'logout']);





