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

//---Manage Blogs Routes---
Route::get('admin/blog','App\Http\Controllers\BlogController@index')->name('blog');
Route::get('admin/blogList','App\Http\Controllers\BlogController@blogList')->name('blogList');
Route::post('admin/addBlogData','App\Http\Controllers\BlogController@addBlogData')->name('addBlogData');
Route::get('admin/add_blog','App\Http\Controllers\BlogController@addBlog')->name('addBlog');
Route::get('admin/getblogId','App\Http\Controllers\BlogController@getblogId')->name('getblogId');
Route::get('admin/deleteBlog','App\Http\Controllers\BlogController@deleteBlog')->name('deleteBlog');
Route::get('admin/editBlog/{id}','App\Http\Controllers\BlogController@editBlog')->name('editBlog');
Route::post('admin/updateBlog','App\Http\Controllers\BlogController@updateBlog')->name('updateBlog');
Route::get('admin/viewBlog/{id}','App\Http\Controllers\BlogController@viewBlog')->name('viewBlog');
Route::get('admin/changeBlogStatus','App\Http\Controllers\BlogController@changeBlogStatus')->name('changeBlogStatus');

//---Manage CMS Pages---
Route::get('admin/cms','App\Http\Controllers\CmsController@index')->name('cms');
Route::get('admin/cmsList','App\Http\Controllers\CmsController@cmsList')->name('cmsList');
Route::get('admin/changeCmsStatus','App\Http\Controllers\CmsController@changeCmsStatus')->name('changeCmsStatus');
Route::post('admin/addCmsData','App\Http\Controllers\CmsController@addCmsData')->name('addCmsData');
Route::get('admin/add_cms','App\Http\Controllers\CmsController@addCms')->name('addCms');
Route::get('admin/editCms/{id}','App\Http\Controllers\CmsController@editCms')->name('editCms');
Route::post('admin/updateCms','App\Http\Controllers\CmsController@updateCms')->name('updateCms');
Route::get('admin/getcmsId','App\Http\Controllers\CmsController@getcmsId')->name('getcmsId');
Route::get('admin/deleteCms','App\Http\Controllers\CmsController@deleteCms')->name('deleteCms');
Route::get('admin/viewCms/{id}','App\Http\Controllers\CmsController@viewCms')->name('viewCms');

//---Manage Users---
Route::get('admin/user','App\Http\Controllers\UserController@index')->name('user');
Route::get('admin/userList','App\Http\Controllers\UserController@userList')->name('userList');
Route::get('admin/editUser/{id}','App\Http\Controllers\UserController@editUser')->name('editUser');
Route::post('admin/updateUser','App\Http\Controllers\UserController@updateUser')->name('updateUser');


//API
Route::post('Api/login','App\Http\Controllers\ApiController@login')->name('login');

// Route::get('/', function () {
//     return view('admin.login');
// });

// Route::get('/admin/dashboard',[DashboardController::class,'index']);

// Route::get('/admin/login',[LoginController::class,'index']);
// Route::post('/admin/loginForm',[LoginController::class,'login']);

// Route::get('/admin/logout',[LoginController::class,'logout']);





