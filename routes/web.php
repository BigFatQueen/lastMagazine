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
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/backend', function () {
    return view('backend.index');
});

Route::get('/academic', function () {
    return view('backend.academic');
});

Route::post('/comment','MagazineController@comment')->name('magazine.comment');
Route::get('/getcomment/{id}','MagazineController@getcomment')->name('magazine.getcomment');


Route::resource('/faculty','FacultyController');
Route::get('/getFaculties','FacultyController@getFaculties')->name('getFaculties');

Route::get("/academicList", "AcademicController@index");
Route::get("/academicEdit/{id}", "AcademicController@update");
Route::get("/academicDelete/{id}", "AcademicController@destroy");
Route::get("/academicStore", "AcademicController@store");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// level route
Route::resource('/level','backend\LevelController');


Route::get('/supermanager','AllUserController@smindex')->name('supermanager.index');
Route::get('/getsuperManager','AllUserController@getsuperManager')->name('getsuperManager');
Route::delete('/supermanagerDelete/{id}','AllUserController@supermanagerDelete')->name('supermanagerDelete');
Route::post('/supermanagerStore','AllUserController@supermanagerStore')->name('supermanagerStore');
Route::put('/supermanagerUpdate/{id}','AllUserController@supermanagerUpdate')->name('supermanagerUpdate');


Route::resource('/coordinator','CoordinatorController');
Route::get('/getCoordinator','AllUserController@getCoordinator')->name('getCoordinator');

Route::resource('/student','StudentController');
Route::get('/getStudent','AllUserController@getStudent')->name('getStudent');
Route::get('/getclassByL/{id}','AllUserController@getclassByL')->name('getclassByL');

Route::resource('/announce','AnnounceController');


Route::resource('/magazine','MagazineController');
Route::get('/addProposal/{id}','MagazineController@addProposal')->name('addProposal');

Route::get('/myproposalByA/{id}','MagazineController@myproposalByA')->name('myproposalByA');


// Aricle show
Route::get('pdfview/{id}','MagazineController@pdfview')->name('pdfview');

//adminProposalmanageByCoordinatior
Route::get('admitPMbyC/{pid}','MagazineController@admitPMbyC')->name('admitPMbyC');
Route::get('selectdProposal/{pid}','MagazineController@selectdProposal')->name('selectdProposal');

Route::get('/sendBasic','MagazineController@sendBasic')->name('sendBasic');
Route::get('/announceAdmin','AnnounceController@announceAdmin')->name('announceAdmin');



