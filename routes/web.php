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

Auth::routes();

Route::get('/', 'MainController@index');
Route::get('/get-information', 'MainController@getContent');
Route::get('/maklumat/{id}', 'MainController@getInformation');
Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('home', 'HomeController');
    Route::resource('profile', 'ProfileController');
    Route::post('profile/update-data', 'ProfileController@updateData');
    Route::resource('role', 'RoleController');
    Route::resource('admin', 'AdminController');
    Route::post('admin/find-area', 'AdminController@findArea');
    Route::resource('user', 'UserController');
    Route::resource('audit', 'AuditController');
    Route::resource('mode', 'ModeController');
    Route::resource('hiking', 'MountainController');
    Route::post('hiking/find-area', 'MountainController@findArea');
    Route::post('hiking/find-hsk', 'MountainController@findHsk');
    Route::post('hiking/find-hsk-price', 'MountainController@findHskPrice');
    Route::resource('convenience', 'ConvenienceController');
    Route::post('convenience/find-area', 'ConvenienceController@findArea');
    Route::post('convenience/find-ecopark', 'ConvenienceController@findEcoPark');
    Route::post('convenience/find-convenience-sub-category', 'ConvenienceController@findConvenienceSubCategory');
    Route::resource('convenience-category', 'ConvenienceCategoryController');
    Route::resource('convenience-sub-category', 'ConvenienceSubCategoryController');
    Route::resource('others-activity', 'OthersActivityController');
    Route::post('others-activity/find-area', 'OthersActivityController@findArea');
    Route::resource('state', 'StateController');
    Route::resource('applicants-list', 'ApplicantsListController');
    Route::resource('permanent-forest', 'PermanentForestController');
    Route::post('permanent-forest/find-area', 'PermanentForestController@findArea');
    Route::post('permanent-forest/find-mountain', 'PermanentForestController@findMountain');
    
    Route::resource('eco-park', 'EcoParkController');
    Route::post('eco-park/find-area', 'EcoParkController@findArea');
    Route::post('eco-park/find-hsk', 'EcoParkController@findHsk');
    Route::resource('state-forestry-department', 'StateForestryDepartmentController');
    Route::resource('regional-forest-officials', 'RegionalForestOfficialsController');
    Route::post('regional-forest-officials/find-area', 'RegionalForestOfficialsController@findArea');
    Route::resource('audit-trail-access', 'AuditTrailAccessController');
    Route::resource('audit-trail-activity', 'AuditTrailActivityController');
    Route::get('audit-trail-activity/detail/{id}', 'AuditTrailActivityController@detail');
    Route::get('audit-trail-activity/detail/delete/{id}', 'AuditTrailActivityController@detailDelete');
    Route::resource('report', 'ReportController');
    Route::get('report/convenience/{id}/{type}', 'ReportController@convenience');
    Route::get('report/other-activities/{id}/{type}', 'ReportController@otherActivities');
     Route::get('report/hiking-activity/{id}/{type}', 'ReportController@hiking');
    Route::resource('applicant', 'ApplicantController');
    Route::resource('area', 'AreaController');

    Route::resource('application-processed', 'ApplicationProcessedController');
    Route::resource('application-payment', 'ApplicationPaymentController');
    Route::resource('application-completed', 'ApplicationCompletedController');
    Route::resource('application-canceled', 'ApplicationCanceledController');
    Route::resource('application-newest', 'ApplicationNewestController');

    Route::resource('homepage-setting', 'HomepageController');
    Route::resource('slider-setting', 'SliderController');

    Route::resource('price-category', 'PriceCategoryController');
    Route::resource('capacity-category', 'CapacityCategoryController');

    // status permohonan
    Route::resource('applicant-status', 'ApplicantStatusController');
    Route::get('applicant-status', 'ApplicantStatusController@index');
    Route::get('applicant-status/complete/{id}', 'ApplicantStatusController@complete');
    Route::get('applicant-status/finish/{id}', 'ApplicantStatusController@finish');
    Route::get('applicant-status/cancel/{id}', 'ApplicantStatusController@cancel');
    Route::get('applicant-status/delete/{id}', 'ApplicantStatusController@delete');
    Route::get('applicant-status/convenience/{id}', 'ApplicantStatusController@convenience');
    Route::get('applicant-status/other-activities/{id}', 'ApplicantStatusController@otherActivities');
    Route::get('applicant-status/hiker/{applicant_id}/{participant_id}', 'ApplicantStatusController@hiker');
    Route::get('applicant-status/hiking-activity/{id}', 'ApplicantStatusController@hiking');
    Route::post('applicant-status/delete-batch', 'ApplicantStatusController@deleteBatch');
    // Route::get('applicant-status/add-receipt', 'ApplicantStatusController@addReceipt');

    Route::get('applicant-status/view/{type}/{id}', 'ApplicantStatusController@review');

    Route::resource('campground', 'MountainCampgroundController');
    Route::resource('post-information', 'PostInformationController');
});

Route::get('form/hiking/{id}', 'ParticipantFormController@index');
Route::post('form/hiking/submit/{id}', 'ParticipantFormController@submit');
Route::get('form/completed', 'ParticipantFormController@completed');

Route::resource('account/login', 'Account\LoginController');
Route::post('account/login/action', 'Account\LoginController@Login');
Route::get('account/logout', 'Account\LoginController@Logout');
Route::resource('account/register', 'Account\RegisterController');
Route::post('account/register-check', 'Account\RegisterController@check');
Route::get('account/activate/{email}', 'Account\RegisterController@Activated');
Route::get('account/forgot-password', 'Account\ForgotPasswordController@index');
Route::post('account/forgot-password/action', 'Account\ForgotPasswordController@action');


Route::group(['middleware' => 'applicant', 'prefix' => 'account'], function(){

    Route::resource('member-home', 'Account\HomeController');
    Route::resource('member-profile', 'Account\ProfileController');
    Route::resource('member-application', 'Account\ApplicationController');
    Route::resource('member-application-status', 'Account\ApplicationStatusController');
    Route::get('member-application-status/{id}/hiking', 'Account\ApplicationStatusController@viewHiking');
    Route::get('member-application-status/{id}/convenience', 'Account\ApplicationStatusController@viewConvenience');
    Route::get('member-application-status/{id}/other', 'Account\ApplicationStatusController@viewOther');
    Route::resource('member-aktiviti-pendakian', 'Account\AktivitiPendakianController');
    Route::get('member-aktiviti-pendakian/{id}/adduser', 'Account\AktivitiPendakianController@addUser');
    Route::post('member-aktiviti-pendakian/{id}/adduser/store', 'Account\AktivitiPendakianController@addUserStore');
    Route::get('member-aktiviti-pendakian/{applicant_id}/{user_id}/edit', 'Account\AktivitiPendakianController@editUser');
    Route::post('member-aktiviti-pendakian/{applicant_id}/{user_id}/edit/update', 'Account\AktivitiPendakianController@editUserUpdate');
    Route::post('member-aktiviti-pendakian/find-area', 'Account\AktivitiPendakianController@findArea');
    Route::post('member-aktiviti-pendakian/find-mountain', 'Account\AktivitiPendakianController@findMountain');
    Route::post('member-aktiviti-pendakian/find-amount', 'Account\AktivitiPendakianController@findAmount');
    Route::post('member-aktiviti-pendakian/find-amount-mountain', 'Account\AktivitiPendakianController@findAmountMountain');
    Route::post('member-aktiviti-pendakian/find-amount-convenience', 'Account\AktivitiPendakianController@findAmountConvenience');
    Route::post('member-aktiviti-pendakian/find-ending-date', 'Account\AktivitiPendakianController@findEndingDate');
    Route::post('member-aktiviti-pendakian/find-hsk', 'Account\AktivitiPendakianController@findHsk');
    Route::post('member-aktiviti-pendakian/find-eco-park', 'Account\AktivitiPendakianController@findEcoPark');
    Route::post('member-aktiviti-pendakian/find-convenience', 'Account\AktivitiPendakianController@findConvenience');
    Route::post('member-aktiviti-pendakian/find-convenience-sub-category', 'Account\AktivitiPendakianController@findConvenienceSubCategory');
    Route::post('member-aktiviti-pendakian/find-price-type', 'Account\AktivitiPendakianController@findPriceType');

    Route::get('member-aktiviti-pendakian/process/{id}', 'Account\AktivitiPendakianController@process');
    
    Route::resource('member-tempahan-kemudahan', 'Account\TempahanKemudahanController');
    Route::post('member-tempahan-kemudahan/find-area', 'Account\TempahanKemudahanController@findArea');
    Route::post('member-tempahan-kemudahan/find-convenience', 'Account\TempahanKemudahanController@findConvenience');
    Route::post('member-tempahan-kemudahan/find-price-type', 'Account\TempahanKemudahanController@findPriceType');
    Route::post('member-tempahan-kemudahan/find-price', 'Account\TempahanKemudahanController@findPrice');
    Route::post('member-tempahan-kemudahan/find-eco-park', 'Account\TempahanKemudahanController@findEcoPark');
    Route::post('member-tempahan-kemudahan/find-convenience-sub-category', 'Account\TempahanKemudahanController@findConvenienceSubCategory');
    Route::post('member-tempahan-kemudahan/set-convenience', 'Account\TempahanKemudahanController@setConvenience');
    Route::post('member-tempahan-kemudahan/get-convenience-category', 'Account\TempahanKemudahanController@getConvenienceCategory');
    Route::post('member-tempahan-kemudahan/get-convenience', 'Account\TempahanKemudahanController@getConvenience');
    Route::get('member-tempahan-kemudahan/{id}/view', 'Account\TempahanKemudahanController@review');
    Route::get('member-tempahan-kemudahan/{id}/download', 'Account\TempahanKemudahanController@download');
    Route::resource('member-aktiviti-lain', 'Account\AktivitiLainController');
    Route::post('member-aktiviti-lain/find-area', 'Account\AktivitiLainController@findArea');
    Route::post('member-aktiviti-lain/find-activity', 'Account\AktivitiLainController@findActivity');
    Route::post('member-aktiviti-lain/find-activity-price', 'Account\AktivitiLainController@findActivityPrice');
    Route::post('member-aktiviti-lain/find-eco-park', 'Account\AktivitiLainController@findEcoPark');
    Route::post('member-aktiviti-lain/find-place', 'Account\AktivitiLainController@findPlace');
    Route::post('member-aktiviti-lain/find-capacity', 'Account\AktivitiLainController@checkCapacity');
    Route::get('member-aktiviti-lain/{id}/view', 'Account\AktivitiLainController@viewActivity');
    Route::get('member-aktiviti-lain/{id}/download', 'Account\AktivitiLainController@download');

});