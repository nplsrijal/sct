<?php
// Route::group([
//     'namespace'  => 'App\Http\Controllers\Admin',
//     'prefix'     => 'admin',
//    'middleware' => ['auth'],
// ], function () {
//      Route::resource('login', 'LoginController')->withoutMiddleware(['auth']);


// });

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function() {


   Route::get('logout', 'LoginController@logout');
   Route::resource('login', 'LoginController');


     Route::group(['middleware' => 'admin'], function(){
         Route::resource('dashboard', 'DashboardController');

         Route::resource('usertype', 'UsertypeController');

         Route::resource('menu', 'MenuController');

         Route::post('permission/getSubmenuData', 'PermissionController@SubmenuData');
         Route::post('permission/getUsergroupWiseFormMenuData', 'PermissionController@UsergroupWiseFormMenuData');
         Route::post('permission/setformpermission', 'PermissionController@setformpermission');
         Route::get('permission/form', 'PermissionController@formPermission');
         Route::resource('permission', 'PermissionController');

         Route::get('changepassword','UserController@changepassword');
         Route::post('user/submitnewpassword','UserController@submitnewpassword');
         Route::resource('user', 'UserController');

         Route::resource('request-mobilenumber', 'RequestMobileNumberController');
         Route::get('submit-mobilenumber-list', 'SubmitMobileNumberController@getSubmittedList');
         Route::get('complete-mobilenumber-list', 'SubmitMobileNumberController@getCompletedList');
         Route::resource('submit-mobilenumber-request', 'SubmitMobileNumberController');
         Route::resource('request-mobilenumber-bulk', 'RequestMobileNumberBulkController');
         Route::post('submit-mobilenumber-request-bulk/updatestatus', 'SubmitMobileNumberBulkController@updateStatus');
         Route::resource('submit-mobilenumber-request-bulk', 'SubmitMobileNumberBulkController');
         
         Route::resource('request-card-activation', 'RequestCardActivationController');
         Route::get('submit-card-activation-list', 'SubmitCardActivationController@getSubmittedList');
         Route::get('complete-card-activation-list', 'SubmitCardActivationController@getCompletedList');
         Route::resource('submit-card-activation-request', 'SubmitCardActivationController');
         Route::resource('request-card-activation-bulk', 'RequestCardActivationBulkController');
         Route::post('submit-card-activation-bulk/updatestatus', 'SubmitCardActivationBulkController@updateStatus');
         Route::resource('submit-card-activation-bulk', 'SubmitCardActivationBulkController');

         Route::resource('account-update', 'AccountUpdateController');
         Route::get('submit-account-update-list', 'SubmitAccountUpdateController@getSubmittedList');
         Route::get('complete-account-update-list', 'SubmitAccountUpdateController@getCompletedList');
         Route::resource('submit-account-update', 'SubmitAccountUpdateController');
         Route::resource('account-update-bulk', 'AccountUpdateBulkController');
         Route::post('submit-account-update-bulk/updatestatus', 'SubmitAccountUpdateBulkController@updateStatus');
         Route::resource('submit-account-update-bulk', 'SubmitAccountUpdateBulkController');

         Route::resource('card-status-update', 'CardStatusUpdateController');
         Route::get('submit-card-status-update-list', 'SubmitCardStatusUpdateController@getSubmittedList');
         Route::get('complete-card-status-update-list', 'SubmitCardStatusUpdateController@getCompletedList');
         Route::resource('submit-card-status-update', 'SubmitCardStatusUpdateController');
         Route::resource('card-status-update-bulk', 'CardStatusUpdateBulkController');
         Route::post('submit-card-status-update-bulk/updatestatus', 'SubmitCardStatusUpdateBulkController@updateStatus');
         Route::resource('submit-card-status-update-bulk', 'SubmitCardStatusUpdateBulkController');




       
     });
 });


