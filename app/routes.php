<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array('before' => 'guest'), function(){

    // Login
    Route::get('/', array('as' => 'home', 'uses' => 'LoginController@loginView'));
    Route::get('/login', array('as' => 'login', 'uses' => 'LoginController@loginView'));
    Route::post('/login', array('as' => 'loginaction', 'uses' => 'LoginController@loginAction'));
    Route::get('/info', array('as' => 'info', 'uses' => 'LoginController@infoAction'));
});


Route::group(array('before' => 'auth'), function(){

    //Logout
    Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logoutAction'));

    //Home
    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@homeView'));

    // Forms
    Route::get('/form/{form}', array('as' => 'forms', 'uses' => 'ComplaintFormController@complaintFormView'));

    //Form Submit
    Route::post('/from/submit', array('as' => 'submit', 'uses' => 'ComplaintFormController@submitAction'));

    // Complaitns overview
    Route::get('/complaints', array('as' => 'overview', 'uses' => 'ComplaintsController@overviewView'));
    Route::get('/complaints/user/{hash}', array('as' => 'overviewUser', 'uses' => 'ComplaintsController@filterOverviewByUserHash'));
    Route::post('/complaints', array('as' => 'filterOverview', 'uses' => 'ComplaintsController@filterOverviewAction'));



    //Complaint Single
    Route::get('/complaint/{id}', array('as' => 'single', 'uses' => 'ComplaintController@singleView'));
    Route::post('/complaint/update', array('as' => 'updateStatus', 'uses' => 'ComplaintController@updateStautsAction'));
    Route::post('/complaint/comment', array('as' => 'addComment', 'uses' => 'ComplaintController@addCommentAction'));
});

//Error
Route::get('/error', array('as' => 'error', 'uses' => 'HomeController@errorView'));










