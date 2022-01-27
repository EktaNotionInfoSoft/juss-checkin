<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login','App\Http\Controllers\ApiController@login')->name('login');
Route::post('register','App\Http\Controllers\ApiController@register')->name('register');
Route::post('get_setting','App\Http\Controllers\ApiController@get_setting')->name('get_setting');
Route::post('change_password','App\Http\Controllers\ApiController@change_password')->name('change_password');
Route::post('logout','App\Http\Controllers\ApiController@logout')->name('logout');
Route::post('check_auth','App\Http\Controllers\ApiController@check_auth')->name('check_auth');

Route::post('add_task','App\Http\Controllers\ApiController@add_task')->name('add_task');
Route::post('get_task_list','App\Http\Controllers\ApiController@get_task_list')->name('get_task_list');
Route::post('get_task_details','App\Http\Controllers\ApiController@get_task_details')->name('get_task_details');
Route::post('edit_task','App\Http\Controllers\ApiController@edit_task')->name('edit_task');
Route::post('delete_task','App\Http\Controllers\ApiController@delete_task')->name('delete_task');
Route::post('change_task_status','App\Http\Controllers\ApiController@change_task_status')->name('change_task_status');

Route::post('add_guest_facility','App\Http\Controllers\ApiController@add_guest_facility')->name('add_guest_facility');
Route::post('get_guest_facility','App\Http\Controllers\ApiController@get_guest_facility')->name('get_guest_facility');
Route::post('delete_guest_facility','App\Http\Controllers\ApiController@delete_guest_facility')->name('delete_guest_facility');
Route::post('guest_facility_details','App\Http\Controllers\ApiController@guest_facility_details')->name('guest_facility_details');
Route::post('edit_guest_facility','App\Http\Controllers\ApiController@edit_guest_facility')->name('edit_guest_facility');

Route::post('add_property','App\Http\Controllers\ApiController@add_property')->name('add_property');
Route::post('edit_property','App\Http\Controllers\ApiController@edit_property')->name('edit_property');
Route::post('get_my_property','App\Http\Controllers\ApiController@get_my_property')->name('get_my_property');
Route::post('delete_property','App\Http\Controllers\ApiController@delete_property')->name('delete_property');
Route::post('get_property_details','App\Http\Controllers\ApiController@get_property_details')->name('get_property_details');
Route::post('get_property_type','App\Http\Controllers\ApiController@get_property_type')->name('get_property_type');
 
Route::post('add_module','App\Http\Controllers\ApiController@add_module')->name('add_module');
Route::post('get_module_name','App\Http\Controllers\ApiController@get_module_name')->name('get_module_name');
Route::post('delete_module','App\Http\Controllers\ApiController@delete_module')->name('delete_module');

Route::post('get_permission_list','App\Http\Controllers\ApiController@get_permission_list')->name('get_permission_list');
Route::post('add_role','App\Http\Controllers\ApiController@add_role')->name('add_role');
Route::post('delete_role','App\Http\Controllers\ApiController@delete_role')->name('delete_role');
Route::post('get_role_name','App\Http\Controllers\ApiController@get_role_name')->name('get_role_name');

Route::post('edit_role','App\Http\Controllers\ApiController@edit_role')->name('edit_role');

Route::post('get_role_details','App\Http\Controllers\ApiController@get_role_details')->name('get_role_details');



Route::post('add_department','App\Http\Controllers\ApiController@add_department')->name('add_department');
Route::post('edit_department','App\Http\Controllers\ApiController@edit_department')->name('edit_department');
Route::post('get_department_list','App\Http\Controllers\ApiController@get_department_list')->name('get_department_list');
Route::post('delete_department','App\Http\Controllers\ApiController@delete_department')->name('delete_department');

Route::post('add_employee','App\Http\Controllers\ApiController@add_employee')->name('add_employee');
Route::post('edit_employee','App\Http\Controllers\ApiController@edit_employee')->name('edit_employee');
Route::post('get_employee_list','App\Http\Controllers\ApiController@get_employee_list')->name('get_employee_list');
Route::post('delete_employee','App\Http\Controllers\ApiController@delete_employee')->name('delete_employee');
 
Route::post('assign_department','App\Http\Controllers\ApiController@assign_department')->name('assign_department');
Route::post('assign_role','App\Http\Controllers\ApiController@assign_role')->name('assign_role');
Route::post('assign_task','App\Http\Controllers\ApiController@assign_task')->name('assign_task');



Route::post('add_room_service','App\Http\Controllers\ApiController@add_room_service')->name('add_room_service');
Route::post('edit_room_service','App\Http\Controllers\ApiController@edit_room_service')->name('edit_room_service');
Route::post('get_room_list','App\Http\Controllers\ApiController@get_room_list')->name('get_room_list');
Route::post('delete_room_service','App\Http\Controllers\ApiController@delete_room_service')->name('delete_room_service');
Route::post('change_room_status','App\Http\Controllers\ApiController@change_room_status')->name('change_room_status');

Route::post('add_travel_agent','App\Http\Controllers\ApiController@add_travel_agent')->name('add_travel_agent');
Route::post('edit_travel_agent','App\Http\Controllers\ApiController@edit_travel_agent')->name('edit_travel_agent');
Route::post('get_travel_agent_list','App\Http\Controllers\ApiController@get_travel_agent_list')->name('get_travel_agent_list');
Route::post('delete_travel_agent','App\Http\Controllers\ApiController@delete_travel_agent')->name('delete_travel_agent');
Route::post('get_travel_agent_details','App\Http\Controllers\ApiController@get_travel_agent_details')->name('get_travel_agent_details');


Route::post('create_coupon_code','App\Http\Controllers\ApiController@create_coupon_code')->name('create_coupon_code');
Route::post('edit_coupon_code','App\Http\Controllers\ApiController@edit_coupon_code')->name('edit_coupon_code');
Route::post('get_coupon_code_list','App\Http\Controllers\ApiController@get_coupon_code_list')->name('get_coupon_code_list');
Route::post('delete_coupon_code','App\Http\Controllers\ApiController@delete_coupon_code')->name('delete_coupon_code');
Route::post('get_coupon_code_details','App\Http\Controllers\ApiController@get_coupon_code_details')->name('get_coupon_code_details');



Route::post('add_restaurant','App\Http\Controllers\ApiController@add_restaurant')->name('add_restaurant');
Route::post('edit_restaurant','App\Http\Controllers\ApiController@edit_restaurant')->name('edit_restaurant');
Route::post('get_restaurant_list','App\Http\Controllers\ApiController@get_restaurant_list')->name('get_restaurant_list');
Route::post('delete_restaurant','App\Http\Controllers\ApiController@delete_restaurant')->name('delete_restaurant');
 
 
Route::post('get_homepage_banner','App\Http\Controllers\ApiController@get_homepage_banner')->name('get_homepage_banner');
 

Route::post('get_about_us_page','App\Http\Controllers\ApiController@get_about_us_page')->name('get_about_us_page');
Route::post('get_privacy_policy_page','App\Http\Controllers\ApiController@get_privacy_policy_page')->name('get_privacy_policy_page');
Route::post('get_term_condition_page','App\Http\Controllers\ApiController@get_term_condition_page')->name('get_term_condition_page');


Route::post('submit_contact_us','App\Http\Controllers\ApiController@submit_contact_us')->name('submit_contact_us');
 
Route::post('get_testimonials','App\Http\Controllers\ApiController@get_testimonials')->name('get_testimonials');
 
 
Route::post('add_agency','App\Http\Controllers\ApiController@add_agency')->name('add_agency');
Route::post('edit_agency','App\Http\Controllers\ApiController@edit_agency')->name('edit_agency');
Route::post('get_agency_list','App\Http\Controllers\ApiController@get_agency_list')->name('get_agency_list');
Route::post('get_agency_details','App\Http\Controllers\ApiController@get_agency_details')->name('get_agency_details');
Route::post('delete_agency','App\Http\Controllers\ApiController@delete_agency')->name('delete_agency'); 
 
Route::post('add_agent_commission','App\Http\Controllers\ApiController@add_agent_commission')->name('add_agent_commission');
Route::post('edit_agent_commission','App\Http\Controllers\ApiController@edit_agent_commission')->name('edit_agent_commission');
Route::post('get_agent_commission_list','App\Http\Controllers\ApiController@get_agent_commission_list')->name('get_agent_commission_list');
Route::post('get_agent_commission_details','App\Http\Controllers\ApiController@get_agent_commission_details')->name('get_agent_commission_details');
Route::post('delete_agent_commission','App\Http\Controllers\ApiController@delete_agent_commission')->name('delete_agent_commission');


Route::post('get_agent_of_agency','App\Http\Controllers\ApiController@get_agent_of_agency')->name('get_agent_of_agency');
 

Route::post('add_booking','App\Http\Controllers\ApiController@add_booking')->name('add_booking');

//dashboard-reception
Route::post('check_in','App\Http\Controllers\ApiController@check_in')->name('check_in');
Route::post('get_assigned_room_list','App\Http\Controllers\ApiController@get_assigned_room')->name('get_assigned_room_list');
Route::post('get_check_out_guest_details','App\Http\Controllers\ApiController@check_out_guest_details')->name('check_out_guest_details');
Route::post('check_out','App\Http\Controllers\ApiController@check_out')->name('check_out');
Route::post('get_check_in_details','App\Http\Controllers\ApiController@get_check_in_details')->name('get_check_in_details');
Route::post('get_check_list_details','App\Http\Controllers\ApiController@get_check_list_details')->name('get_check_list_details');

Route::post('get_booking_details','App\Http\Controllers\ApiController@get_booking_details')->name('get_booking_details');

Route::post('onwer_dashboard','App\Http\Controllers\ApiController@onwer_dashboard')->name('onwer_dashboard');




























 
 
 
 