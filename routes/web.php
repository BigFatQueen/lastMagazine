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

// Route::get('/', function () {
//     return view('backend.staticalDashboard');
// })->middleware('auth');

Route::get('/', function () {

	if(Auth::check()){
		$user=Auth::user();
		if($user->hasRole('guest')){
			// dd('y');
			return redirect('/announce');
		}else{
			return redirect('/staticalDashboard');
			
		}
		
	}else{
		return redirect('/announce');
	}
	


	
    
});



// Route::get('/backend', function () {
//     return view('backend.index');
// });
// ============================================================
Route::group(['middleware' => ['auth','role:superadmin']], function () {

    Route::get('/academic', function () {
    return view('backend.academic');
	})->name('academic.index');

	Route::resource('/faculty','FacultyController');

	Route::get('/supermanager','AllUserController@smindex')->name('supermanager.index');

	Route::get('/getsuperManager','AllUserController@getsuperManager')->name('getsuperManager');

	Route::delete('/supermanagerDelete/{id}','AllUserController@supermanagerDelete')->name('supermanagerDelete');
	Route::post('/supermanagerStore','AllUserController@supermanagerStore')->name('supermanagerStore');
	Route::put('/supermanagerUpdate/{id}','AllUserController@supermanagerUpdate')->name('supermanagerUpdate');

	Route::resource('/coordinator','CoordinatorController');

});
// ============================================================

Route::group(['middleware' => ['auth','role:superadmin|coordinator|student|manager']], function () {

    Route::get('/staticalDashboard','AllUserController@staticalDashboard')->name('staticalDashboard');

	Route::get('/getStatical1','MagazineController@getStatical1')->name('getStatical1');
	Route::get('/getStatical2','MagazineController@getStatical2')->name('getStatical2');
	
});





// Route::get('/academic', function () {
//     return view('backend.academic');
// })->name('academic.index');  admin

Route::post('/comment','MagazineController@comment')->name('magazine.comment');
Route::get('/getcomment/{id}','MagazineController@getcomment')->name('magazine.getcomment');


// Route::resource('/faculty','FacultyController');//admin
Route::get('/getFaculties','FacultyController@getFaculties')->name('getFaculties');

Route::get("/academicList", "AcademicController@index");
Route::get("/academicEdit/{id}", "AcademicController@update");
Route::get("/academicDelete/{id}", "AcademicController@destroy");
Route::get("/academicStore", "AcademicController@store");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// level route
// Route::resource('/level','backend\LevelController');


// Route::get('/supermanager','AllUserController@smindex')->name('supermanager.index');
// Route::get('/getsuperManager','AllUserController@getsuperManager')->name('getsuperManager');

// Route::delete('/supermanagerDelete/{id}','AllUserController@supermanagerDelete')->name('supermanagerDelete');
// Route::post('/supermanagerStore','AllUserController@supermanagerStore')->name('supermanagerStore');
// Route::put('/supermanagerUpdate/{id}','AllUserController@supermanagerUpdate')->name('supermanagerUpdate');


// Route::resource('/coordinator','CoordinatorController');
Route::get('/getCoordinator','AllUserController@getCoordinator')->name('getCoordinator');

Route::resource('/student','StudentController');
Route::get('/getStudent','AllUserController@getStudent')->name('getStudent');
Route::get('/getclassByL/{id}','AllUserController@getclassByL')->name('getclassByL');

Route::resource('/announce','AnnounceController');


Route::resource('/magazine','MagazineController')->middleware('auth');

Route::get('/addProposal/{id}','MagazineController@addProposal')->name('addProposal');

Route::get('/myproposalByA/{id}','MagazineController@myproposalByA')->name('myproposalByA');


// Aricle show
Route::get('pdfview/{id}','MagazineController@pdfview')->name('pdfview');

//adminProposalmanageByCoordinatior
Route::get('admitPMbyC/{pid}','MagazineController@admitPMbyC')->name('admitPMbyC');
Route::get('selectdProposal/{pid}','MagazineController@selectdProposal')->name('selectdProposal');
Route::get('unselectdProposal/{pid}','MagazineController@unselectdProposal')->name('unselectdProposal');

Route::get('/sendBasic','MagazineController@sendBasic')->name('sendBasic');
Route::get('/announceList','AnnounceController@announcelist')->name('announcelist');
Route::get('/getArticleByAID/{id}','MagazineController@getArticleByAID')->name('getArticleByAID');

//getarticle for coordinator according faculty id of coordinator
Route::get('/getArticleforFID/{id}','MagazineController@getArticleforFID')->name('getArticleforFID');
//article detail for guest
Route::get('/articleDGuest/{id}','MagazineController@articleDGuest')->name('articleDGuest')->middleware('auth');


// staticalDashboard.blade.php
// Route::get('/staticalDashboard','AllUserController@staticalDashboard')->name('staticalDashboard');

// Route::get('/getStatical1','MagazineController@getStatical1')->name('getStatical1');
// Route::get('/getStatical2','MagazineController@getStatical2')->name('getStatical2');


Route::get('/downloadzip/{id}','MagazineController@downloadzip')->name('downloadzip');


Route::get('/getMByFID/{id}','MagazineController@getMByFID')->name('getMByFID');


// comment ajax
Route::get('/getNoComment/{id}','MagazineController@getNoComment')->name('getNoComment');
Route::get('/getNoComment14/{id}','MagazineController@getNoComment14')->name('getNoComment14');


Route::get('magazineShow/{id}','MagazineController@magazineShow')->name('magazineShow');


// ==================================================================================================
// forgeting password

Route::post('reset_password_without_token','AccountsController@validatePasswordRequest');

Route::post('reset_password_with_token','AccountsController@resetPassword');










