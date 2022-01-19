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
require __DIR__.'/auth.php';




Route::get('/','Form\FormController@index');
Route::get('/home','Form\FormController@index')->name('home');
Route::get('admin/login', 'Admin\AdminAuthController@adminLogin')->name('admin.login');
Route::post('/admin/login', 'Admin\AdminAuthController@attemptLogin')->name('admin.login.attempt');

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('admin')->group(function () {

    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/profile','AdminAuthController@profile')->name('profile');
    Route::name('caremanager.')->prefix('CareManager')->group(function (){

        Route::get('/list','CareManagerController@List')->name('list');
        Route::get('/add','CareManagerController@add')->name('add');
        Route::get('/edit/{id}','CareManagerController@edit')->name('edit');
        Route::post('/store','CareManagerController@store')->name('store');
        Route::post('/update','CareManagerController@update')->name('update');
        Route::get('/delete/{id}','CareManagerController@delete')->name('delete');
        Route::get('/archive/{id}','CareManagerController@archive')->name('archive');
        Route::get('/unarchive/{id}','CareManagerController@unarchive')->name('unarchive');
        Route::get('/suspend/{id}','CareManagerController@suspend')->name('suspend');
        Route::get('/active/{id}','CareManagerController@active')->name('active');
    });
    Route::name('services.')->group(function (){

        Route::get('/county','CountyController@countyList')->name('county');
        Route::post('/county-save','CountyController@countySave')->name('county.save');
        Route::post('/county-update','CountyController@countyUpdate')->name('county.update');
        Route::get('/county-delete/{id}','CountyController@countyDelete')->name('county.delete');

        Route::get('/locality','CountyController@localityList')->name('locality');
        Route::post('/locality-save','CountyController@localitySave')->name('locality.save');
        Route::post('/locality-update','CountyController@localityUpdate')->name('locality.update');
        Route::get('/locality-delete/{id}','CountyController@localityDelete')->name('locality.delete');

        Route::get('/province','CountyController@provinceList')->name('province');
        Route::post('/province-save','CountyController@provinceSave')->name('province.save');
        Route::post('/province-update','CountyController@provinceUpdate')->name('province.update');
        Route::get('/province-delete/{id}','CountyController@provinceDelete')->name('province.delete');

        //who crud
        Route::get('/who-list','WHOController@whoList')->name('who.list');
        Route::post('/who-save','WHOController@whoSave')->name('who.save');
        Route::post('/who-update','WHOController@whoUpdate')->name('who.update');
        Route::get('/who-delete/{id}','WHOController@whoDelete')->name('who.delete');

        //expectation crud
        Route::get('/expect-list','WHOController@expectList')->name('expect.list');
        Route::post('/expect-save','WHOController@expectSave')->name('expect.save');
        Route::post('/expect-update','WHOController@expectUpdate')->name('expect.update');
        Route::get('/expect-delete/{id}','WHOController@expectDelete')->name('expect.delete');

        //quality of life crud
        Route::get('/quality-list','WHOController@qualityList')->name('quality.list');
        Route::post('/quality-save','WHOController@qualitySave')->name('quality.save');
        Route::post('/quality-update','WHOController@qualityUpdate')->name('quality.update');
        Route::get('/quality-delete/{id}','WHOController@qualityDelete')->name('quality.delete');

        //services assistance of life crud
        Route::get('/assistance-list','WHOController@assistanceList')->name('assistance.list');
        Route::post('/assistance-save','WHOController@assistanceSave')->name('assistance.save');
        Route::post('/assistance-update','WHOController@assistanceUpdate')->name('assistance.update');
        Route::get('/assistance-delete/{id}','WHOController@assistanceDelete')->name('assistance.delete');
    });

    Route::name('patient.')->group(function (){
        Route::get('/category','PatientController@categoryList')->name('category');
        Route::post('/category-save','PatientController@categorySave')->name('category.save');
        Route::post('/category-update','PatientController@categoryUpdate')->name('category.update');
        Route::get('/category-delete/{id}','PatientController@categoryDelete')->name('category.delete');

        Route::get('/visit-type','PatientController@visitList')->name('visit.type');
        Route::post('/visit-type-save','PatientController@visitSave')->name('visit.type.save');
        Route::post('/visit-type-update','PatientController@visitUpdate')->name('visit.type.update');
        Route::get('/visit-type-delete/{id}','PatientController@visitDelete')->name('visit.type.delete');

        Route::get('/diagnose','PatientController@diagnoseList')->name('diagnose');
        Route::post('/diagnose-save','PatientController@diagnoseSave')->name('diagnose.save');
        Route::post('/diagnose-update','PatientController@diagnoseUpdate')->name('diagnose.update');
        Route::get('/diagnose-delete/{id}','PatientController@diagnoseDelete')->name('diagnose.delete');
    });

    Route::name('ops_manager.')->prefix('ops_manager')->group(function () {

        Route::get('list','OpsManagerController@list')->name('list');
        Route::get('add','OpsManagerController@add')->name('add');
        Route::post('/store','OpsManagerController@store')->name('store');
        Route::post('/update','OpsManagerController@update')->name('update');
        Route::get('/edit/{id}','OpsManagerController@edit')->name('edit');
        Route::get('/delete/{id}','OpsManagerController@delete')->name('delete');
    });

    Route::get('/web-cms','CMSController@webCMS')->name('cms.general');
    Route::post('/save-cms','CMSController@saveCMS')->name('setting.save');
});

Route::name('caremanager.')->prefix('care-manager')->namespace('CareManager')->middleware('careManager')->group(function () {

    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
    Route::get('survey-list','SurveyController@list')->name('survey');
    Route::get('delete/{id?}','SurveyController@delete')->name('survey.delete');
    Route::get('caremanager-single-excel/{id?}','SurveyController@singleExcel')->name('single.excel');


});

Route::name('client.')->prefix('client')->middleware('shareClient')->group(function () {

    Route::get('list','ClientController@list')->name('list');
    Route::get('add','ClientController@add')->name('add');
    Route::post('/store','ClientController@store')->name('store');
    Route::post('/update','ClientController@update')->name('update');
    Route::get('/edit/{id}','ClientController@edit')->name('edit');
    Route::get('/delete/{id}','ClientController@delete')->name('delete');

});
Route::name('caremanager.caregiver.')->prefix('CareGiver')->middleware('shareClient')->namespace('CareManager')->group(function () {

    Route::get('/list', 'CareGiverController@List')->name('list');
    Route::get('/add', 'CareGiverController@add')->name('add');
    Route::get('/edit/{id}', 'CareGiverController@edit')->name('edit');
    Route::post('/store', 'CareGiverController@store')->name('store');
    Route::post('/update', 'CareGiverController@update')->name('update');
    Route::get('/delete/{id}', 'CareGiverController@delete')->name('delete');

});

Route::name('survey.')->prefix('survey')->middleware('shareClient')->group(function () {
    Route::get('admin-list','SurveyController@adminList')->name('admin.list');
    Route::get('admin-drafts','SurveyController@drafts')->name('admin.drafts');
    Route::get('admin-single-excel/{id?}','SurveyController@singleExcel')->name('single.excel');
    Route::get('mng-list','SurveyController@mngList')->name('mng.list');
    Route::get('survey-pdf-dounlaod/{id?}','SurveyController@pdf')->name('pdf');
    Route::get('delete/{id?}','SurveyController@delete')->name('delete');

    //profile controller for both user
    Route::get('user-profile','ProfileController@profile')->name('profile');
    Route::post('user-profile-update','ProfileController@profileUpdate')->name('profile.update');
    Route::get('user-reset-password','ProfileController@resetPassoord')->name('reset.passoword');
});

Route::get('/form-submitted','Form\FormController@success')->name('success');
Route::get('/form-error','Form\FormController@error')->name('error');
Route::get('/quality-assurance','Form\FormController@fromLink')->name('client.form.link');
Route::get('/change-redirection','Form\FormController@changeRedirection')->name('change.redirection');
Route::post('/QA-form-submit','Form\FormController@formSubmit')->name('client.form.submit');
Route::get('/find-locality/{county_id?}','Form\SearchController@findLocality')->name('find.locality');
Route::get('/find-province/{county_id?}','Form\SearchController@findProvince')->name('find.province');
Route::get('/find-care-giver/{care_giver_id?}','Form\SearchController@findCareGiver')->name('find.caregiver');
Route::get('/find/care-manager/{care_manager_id?}','Form\SearchController@findCareManager')->name('find.caremanager');
