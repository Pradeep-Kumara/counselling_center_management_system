<?php

Auth::routes();




//Client Interface
Route::get('/clientInterface', 'ClientInterfaceController@index')->name('clientInterface');



Route::get('/signin', function () {
        return view('signin');
        })->middleware('guest');


//Login
Route::post('/signin', 'SecurityController@login')->name('login');

//Client Sign Up
Route::get('/clientSignup', 'SecurityController@signup')->name('clientSignup');
Route::post('/saveClient', 'ClientController@saveClient')->name('saveClient');




//After Login ('auth')
Route::group(['middleware' => 'auth', 'prefix' => ''], function () {




    //Dashboard
   /* Route::get('/', function () {
        return view('index', ['title' => 'Dashboard']);
    });
    Route::get('/index', function () {
        return view('index', ['title' => 'Dashboard']);
    });*/

    Route::get('/index', 'DashboardController@dashboardIndex')->name('index');
    Route::get('/', 'DashboardController@dashboardIndex')->name('/');



    //Log Out
    Route::get('/logout', 'SecurityController@logoutNow')->name('logout');



    //Status Change
    Route::post('/activateDeactivate', 'StatusController@activateDeactivate')->name('activateDeactivate');




    //Appointment
    Route::get('/makeAppointment', 'AppointmentController@index')->name('makeAppointment');
    Route::get('/appointmentLog', 'AppointmentLogController@appointmentLog')->name('appointmentLog');
    Route::post('/saveAppointment','AppointmentController@saveAppointment')->name('saveAppointment');
    Route::post('/showAmount','AppointmentController@showAmount')->name('showAmount');
    Route::post('/getTimeSlot','AppointmentController@getTimeSlot')->name('getTimeSlot');

    //Appointment Log
    Route::post('/savePayment','AppointmentLogController@savePayment')->name('savePayment');
    Route::post('/cancelAppointment','AppointmentLogController@cancelAppointment')->name('cancelAppointment');



    //Payment Log
    Route::get('/paymentLog', 'PaymentLogController@index')->name('paymentLog');




    //Category
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/saveCategory', 'CategoryController@categorySave')->name('saveCategory');
    Route::post('/updateCategory', 'CategoryController@categoryUpdate')->name('updateCategory');
    Route::post('/deleteCategory', 'CategoryController@categoryDelete')->name('deleteCategory');




    //Client Management In Admin
    Route::get('/clientManagement', 'ClientController@index')->name('clientManagement');
    Route::post('/saveClientByAdmin', 'ClientController@saveClientByAdmin')->name('saveClientByAdmin');
    Route::post('/updateClient', 'ClientController@updateClient')->name('updateClient');




    //User Management In Admin
    Route::get('/userManagement', 'UserController@index')->name('userManagement');
    Route::post('/saveUser', 'UserController@saveUser')->name('saveUser');
    //Route::post('/category-select-box', 'UserController@categorySelectBox')->name('category-select-box');
    Route::post('/updateUser', 'UserController@updateUser')->name('updateUser');





    //Counselling-GDF
    Route::get('/gdf', 'GdfController@index')->name('gdf');





    //My Account
    Route::get('/myAccount', 'MyAccountController@index')->name('myAccount');
    Route::post('/getUserDetails', 'MyAccountController@getUserDetails')->name('getUserDetails');
    Route::post('/updateUserDetails', 'MyAccountController@updateUserDetails')->name('updateUserDetails');
    Route::post('/changePassword', 'MyAccountController@changePassword')->name('changePassword');



    //Reports
    Route::get('/revenueReport', 'RevenueReportController@revReportIndex')->name('revenueReport');
    Route::get('/clientReport', 'ClientReportController@clientReportIndex')->name('clientReport');










    /*//Feedback
    Route::get('/feedback', 'FeedbackController@index')->name('feedback');*/








//Test Start

    //Route::get('/testPage', 'TestController@testPage')->name('testPage');
    /* above route can be also written like this
    Route::get('/testPage', function () {
        return view('test.test',['title'=>'Test Page']);
    }); */




    Route::get('/testPage', 'TestController@testFunction')->name('testPage');




//Test End

});

