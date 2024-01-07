<?php
// Route::group([
//     'namespace'  => 'App\Http\Controllers\Admin',
//     'prefix'     => 'admin',
//    'middleware' => ['auth'],
// ], function () {
//      Route::resource('login', 'LoginController')->withoutMiddleware(['auth']);


// });
use App\Http\Controllers\Admin\SubmitMobileNumberController;
use App\Http\Controllers\Admin\SubmitCardActivationController;
use App\Http\Controllers\Admin\SubmitAccountUpdateController;
use App\Http\Controllers\Admin\SubmitCardStatusUpdateController;


Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function() {

   Route::get('logout', [LoginController::class, 'logout']);
   Route::resource('login',LoginController::class);


     Route::group(['middleware' => 'admin'], function(){
         Route::resource('dashboard', DashboardController::class);

         Route::resource('usertype', UsertypeController::class);

         Route::resource('menu', MenuController::class);

         Route::post('permission/getSubmenuData', [PermissionController::class,'SubmenuData']);
         Route::post('permission/getUsergroupWiseFormMenuData', [PermissionControlle::class,'UsergroupWiseFormMenuData']);
         Route::post('permission/setformpermission', [PermissionController::class,'setformpermission']);
         Route::get('permission/form', [PermissionController::class,'formPermission']);
         Route::resource('permission', PermissionController::class);

         Route::get('changepassword',[UserController::class,'changepassword']);
         Route::post('user/submitnewpassword',[UserController::class,'submitnewpassword']);
         Route::resource('user', UserController::class);

         Route::resource('request-mobilenumber', RequestMobileNumberController::class);
         Route::get('submit-mobilenumber-list', [SubmitMobileNumberController::class,'getSubmittedList']);
         Route::get('complete-mobilenumber-list', [SubmitMobileNumberController::class,'getCompletedList']);
         Route::resource('submit-mobilenumber-request', SubmitMobileNumberController::class);
         Route::resource('request-mobilenumber-bulk', RequestMobileNumberBulkController::class);
         Route::post('submit-mobilenumber-request-bulk/updatestatus', [SubmitMobileNumberBulkController::class,'updateStatus']);
         Route::resource('submit-mobilenumber-request-bulk', SubmitMobileNumberBulkController::class);
         
         Route::resource('request-card-activation', RequestCardActivationController::class);
         Route::get('submit-card-activation-list', [SubmitCardActivationController::class,'getSubmittedList']);
         Route::get('complete-card-activation-list', [SubmitCardActivationController::class,'getCompletedList']);
         Route::resource('submit-card-activation-request', SubmitCardActivationController::class);
         Route::resource('request-card-activation-bulk', RequestCardActivationBulkController::class);
         Route::post('submit-card-activation-bulk/updatestatus', [SubmitCardActivationBulkController::class,'updateStatus']);
         Route::resource('submit-card-activation-bulk', SubmitCardActivationBulkController::class);

         Route::resource('account-update', AccountUpdateController::class);
         Route::get('submit-account-update-list', [SubmitAccountUpdateController::class,'getSubmittedList']);
         Route::get('complete-account-update-list', [SubmitAccountUpdateController::class,'getCompletedList']);
         Route::resource('submit-account-update', SubmitAccountUpdateController::class);
         Route::resource('account-update-bulk', AccountUpdateBulkController::class);
         Route::post('submit-account-update-bulk/updatestatus', [SubmitAccountUpdateBulkController::class,'updateStatus']);
         Route::resource('submit-account-update-bulk', SubmitAccountUpdateBulkController::class);

         Route::resource('card-status-update', CardStatusUpdateController::class);
         Route::get('submit-card-status-update-list', [SubmitCardStatusUpdateController::class,'getSubmittedList']);
         Route::get('complete-card-status-update-list', [SubmitCardStatusUpdateController::class,'getCompletedList']);
         Route::resource('submit-card-status-update', SubmitCardStatusUpdateController::class);
         Route::resource('card-status-update-bulk', CardStatusUpdateBulkController::class);
         Route::post('submit-card-status-update-bulk/updatestatus', [SubmitCardStatusUpdateBulkController::class,'updateStatus']);
         Route::resource('submit-card-status-update-bulk', SubmitCardStatusUpdateBulkController::class);
         Route::resource('register-upi-bin', RegisterUpiBinController::class);




       
     });
    });
 


