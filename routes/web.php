// routes/web.php

<?php
Route::view('/', 'welcome');
Auth::routes(['verify' => true]);


Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');

Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');


Route::post('/writer/login/', 'Auth\LoginController@writerLogin');

Route::post('/register/writer', 'Auth\RegisterController@createWriter');

Route::view('/home', 'home')->middleware('auth','verified');






Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){


    Route::group(['middleware' => ['auth:admin','guard.verified:admin']], function () {
    
        Route::view('/home', 'admin.home')->name('home');
    });

    
    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function(){
        
        Route::get('/login', 'LoginController@showLoginForm');
        Route::post('/login', 'LoginController@login');
        Route::get('/register', 'RegisterController@showRegisterForm');
        Route::post('/register', 'RegisterController@create');
        
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('/email/verify','VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('/email/resend','VerificationController@resend')->name('verification.resend');

    });

    

    //Put all of your admin routes here...

});


Route::view('/writer', 'writer');