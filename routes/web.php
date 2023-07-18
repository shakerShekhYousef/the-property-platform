<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
// use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\LeadController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\LanguageController;
use App\Http\Controllers\dashboard\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboard\TenantController;


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
Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/out', 'App\Http\Controllers\Auth\LoginController@logout');
//user
Route::get('/creat', 'App\Http\Controllers\dashboard\UserController@create')->name('creat');
Route::post('/creatuser', 'App\Http\Controllers\dashboard\UserController@store')->name('creatuser');
Route::get('/index', 'App\Http\Controllers\dashboard\UserController@index')->name('index');
Route::get('edit/{id}', 'App\Http\Controllers\dashboard\UserController@edit')->name('edit_user');
Route::post('/update_user/{id}', 'App\Http\Controllers\dashboard\UserController@update')->name('update_user');
//change password
Route::get('chngepassword/{id}', 'App\Http\Controllers\dashboard\UserController@changepass')->name('changepass');
Route::post('/change/{id}','App\Http\Controllers\dashboard\UserController@change')->name('change.update');
//resetpassword
Route::get('resetpassword/{id}', 'App\Http\Controllers\dashboard\UserController@resetpassword')->name('resetpassword');
Route::post('/createpassword/{id}','App\Http\Controllers\dashboard\UserController@createpassword')->name('createpassword');
//profile
Route::get('/profile/{id}', 'App\Http\Controllers\dashboard\UserController@profile')->name('profile');
//user_list
Route::get('user_list', 'App\Http\Controllers\dashboard\UserController@user_list')->name('user_list');
//delet
Route::post('/delete_user', 'App\Http\Controllers\dashboard\UserController@deluser')->name('delete_user');
//excel
Route::post('excel','App\Http\Controllers\dashboard\UserController@excel')->name('excel');
//change image
Route::get('changeimage/{id}', 'App\Http\Controllers\dashboard\UserController@changeimage')->name('changeimage');
Route::post('/update_imge/{id}', 'App\Http\Controllers\dashboard\UserController@update_imge')->name('update_imge');


//Leads
Route::resource('leads',LeadController::class);
Route::get('leads_pool', [LeadController::class,'leadspool'])->name('leads.pool');
Route::post('delete_lead',[LeadController::class,'delete_lead'])->name('delete_lead');
Route::get('select_city/{id}',[LeadController::class,'selectcity'])->name('select_city');
//Leads Import & Export
Route::get('leads_import', [LeadController::class,'leadsimport'])->name('leads.import');
Route::get('get_cities', [LeadController::class,'get_cities'])->name('leads.get_cities');
Route::get('get/{filename}', [LeadController::class, 'getLeadsFile'])->name('getleadfile');
Route::post('leads_import_file', [LeadController::class, 'leadsimportfile'])->name('leads.import.file');
Route::post('leads_export_file', [LeadController::class,'leadsexportfile'])->name('leads.export.file');

//Properties
Route::resource('properties',PropertyController::class)->except(['index','destroy']);
Route::get('properties_list', [PropertyController::class,'property_list'])->name('properties_list');
Route::post('get_cities', [PropertyController::class,'get_cities'])->name('get_cities');
Route::post('export_excel', [PropertyController::class,'export_excel'])->name('export_excel');
Route::post('delete_property',[PropertyController::class,'delete_property'])->name('delete_property');
Route::post('delete_inventory_images',[PropertyController::class,'delete_inventory_images'])
    ->name('delete_inventory_images');
Route::post('delete_property_images',[PropertyController::class,'delete_property_images'])
    ->name('delete_property_images');
//Tenants
Route::resource('tenants',TenantController::class)->except(['index','destroy']);
Route::get('tenants_list', [TenantController::class,'tenant_list'])->name('tenants_list');
Route::post('tenant_export_excel', [TenantController::class,'export_excel'])->name('tenant_export_excel');
Route::post('delete_tenant',[TenantController::class,'delete_tenant'])->name('delete_tenant');
//Lang
Route::get('/{lang?}', [LanguageController::class,'swap'])->name('home');
