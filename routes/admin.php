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
         Route::resource('category', 'CategoryController');
         Route::resource('subcategory', 'SubcategoryController');
         Route::resource('brand', 'BrandController');
         Route::resource('country', 'CountryController');
         Route::get('changepassword','UserController@changepassword');
         Route::post('user/submitnewpassword','UserController@submitnewpassword');
         Route::resource('user', 'UserController');
         Route::resource('university', 'UniversityController');
         Route::resource('applicant', 'ApplicantController');
         Route::post('apply/getUniversity','ApplyController@getUniversity');
         Route::post('apply/getStatus','ApplyController@getStatus');
         Route::resource('apply', 'ApplyController');
         Route::resource('appliedstatus', 'AppliedStatusController');
         Route::get('report/countrywise', 'ReportController@countrywise');
         Route::get('report/universitywise', 'ReportController@universitywise');
         Route::get('report/intakewise', 'ReportController@intakewise');
         Route::get('report/genderwise', 'ReportController@genderwise');
         Route::get('report/districtwise', 'ReportController@districtwise');
         Route::get('report/getreportdetail', 'ReportController@getreportdetail');

       
     });
 });


