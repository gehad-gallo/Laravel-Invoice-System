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

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 




##############################################################################################

	//// Admin login ///
 	Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'guest:admin'], function () {
	       
		Route::get('/admin-login','CustomLoginController@adminLogin')->name('admin.login');
		Route::post('/admin-login', 'CustomLoginController@checkAdminLogin')-> name('admin.login.access');

    });

	//// Admin logout ///
     Route::get('/admin-logout', 'App\Http\Controllers\CustomLoginController@gitLogout')->name('admin.logout');



	////  Admin routes /////
	Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'auth:admin'],function(){
		
		Route::get('/','DashboardController@index')->name('dashboard');	 //admin home
		Route::get('/departments','DepartmentController@showData')->name('departments');	
		Route::post('/department/add','DepartmentController@insertNewDepartment')->name('insert.department');
		Route::get('/delete-department','DepartmentController@delateDepartment')->name('delete.department');
		Route::get('/edit-department/{id}','DepartmentController@editDepartment')->name('edit.department');
		Route::post('/edit-department/{id}','DepartmentController@saveEditDepartment')->name('save.department.edit');


		////  Admin  -  clients routes /////

		Route::get('/clients','ClientController@allClients')->name('all.clients');
		Route::get('/delete_client', 'ClientController@deleteClient')->name('delete.client'); 
		Route::get('/edit_client/{id}', 'ClientController@editClient')->name('edit.client');  
		Route::post('/edit_client/{id}', 'ClientController@saveEditClient')->name('save.edit.client'); 

		Route::get('/add/client', 'ClientController@addNewClient')->name('add.client'); 
		Route::post('/add/client', 'ClientController@insertNewClient')->name('save.add.client'); 


		///  Admin  -  Sales persons /////

		Route::get('/sales-persons', 'SalesPersonsController@allSalesPesons')->name('all.sales.persons'); 
		Route::get('/add_sales_person', 'SalesPersonsController@addNewSales')->name('add.new.sales.person'); 
		Route::post('/add_sales_person', 'SalesPersonsController@saveNewSeles')->name('save.new.sales.person'); 

		Route::get('/edit_sales_person/{id}', 'SalesPersonsController@editSales')->name('edit.sales');  
		Route::post('/edit_sales_person/{id}', 'SalesPersonsController@saveEditSales')->name('save.edit.sales'); 	
		Route::get('/delete_sales_person', 'SalesPersonsController@deleteSales')->name('delete.sales.person'); 



		///  Admin  -  Invoices /////

		Route::get('/all-invoices','InvoiceController@getAllInvoices')->name('all.invoices');
		Route::get('/add-invoice', 'InvoiceController@addMore')->name('add.invoice');  
	 	Route::post('/add-invoice', 'InvoiceController@storeInvoiceData')->name('store.invoice');  
		Route::get('/invoice-perview/{id}', 'InvoiceController@perviewInvoice')->name('perview.invoice');
		Route::get('/invoice-pdf/{id}', 'InvoiceController@invoicePDF')->name('pdf.invoice');

		Route::get('/invoice-pdf','InvoiceController@showPDF')->name('pdf');

	});

	



##############################################################################################
##############################################################################################
##############################################################################################

#######################################
	
##############################################################################################

##############################################################################################
	/// orders /////
/*	Route::group(['namespace' => 'App\Http\Controllers\Admin'],function(){

		Route::get('/orders', 'OrderController@orderForm')->name('order.form');  
		Route::post('/add_order', 'OrderController@addNewOrder')->name('add.new.order'); 

		
		});*/



/*

   
});
*/
	/////// employees login //////

	Route::get('/login','App\Http\Controllers\CustomLoginController@employeeLogin')->name('login');

	////  employees routes /////

	Route::group(['namespace' => 'App\Http\Controllers\Employees'],function(){

		
		//Route::get('/home','EmployeeController@index')->name('home.Employee'); //employee home
		 
	});

});


