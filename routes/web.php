<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Status;
use App\Query;


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

//Guest Routes
Route::get('/', 'LandingPageController@index')->name('homepage');

Route::get('/register', 'Guest\GuestController@register')->name('register');

Route::post('/register', 'Guest\GuestController@UserRegistration')->name('user.register');

Route::get('/login', 'Guest\GuestController@login')->name('login');

Route::post('/login', 'Guest\GuestController@UserLogin')->name('user.login');

//Forgot Password Routes
Route::get('/reset/email', 'Auth\ForgotPasswordController@showLinkRequestForm')
		  ->name('showResetLinkForm');

Route::post('/reset/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('resetLink');	

Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');	

Route::post('/reset/password', 'Auth\ResetPasswordController@reset')->name('resetPassword');

//Post
Route::get('/posts/{post}', 'Post\PostController@show')->name('post.show');	

//Search Route
Route::get('/results', 'Post\PostController@search');


Route::group(['middleware' => ['auth']], function(){

	//Notifications Route
	Route::get('/markasread', 'Message\MessageController@markasread');

	//Comments Route
	Route::post('/posts/{post}/comment', 'Comment\CommentController@store');
	Route::get('/comment/delete/{comment}', 'Comment\CommentController@destroy');

	Route::get('/logout',  'User\UserController@Logout')->name('logout');


	Route::group(['middleware' => ['user']], function(){

		//User Route
		Route::get('/userdashboard', 'User\UserController@UserDashboard')->name('userdashboard');
		Route::get('/user/profile', 'User\ProfileController@Profile')->name('user.profile');
		Route::patch('/user/{profile}', 'User\ProfileController@ProfileUpdate')->name('profile.update');
		Route::patch('/password/update/{profile}', 'User\ProfileController@PasswordUpdate')->name('password.update');

		// Image Route
		Route::post('/user/pictures/{user}', 'User\UserController@ProfilePicture');

		// POSTMADE Routes
		Route::get('/postmade/{show}', 'User\PostsMadeController@show')->name('postsmade.show');
		Route::get('/postmade/{edit}/edit', 'User\PostsMadeController@edit')->name('postsmade.edit');
		Route::patch('/postmade/{update}/update', 'User\PostsMadeController@update')->name('postsmade.update');


		Route::get('/postmade/delete/{delete}', 'User\PostsMadeController@destroy')->name('postsmade.delete');

		//Post Route
		Route::post('/create', 'Post\PostController@store')->name('post.create');


		//Search Friend Route
		Route::get('/friend', 'User\SearchFriendController@byname');
		Route::get('/location', 'User\SearchFriendController@bylocation');
		Route::get('/showfriend/{friend}', 'User\SearchFriendController@showfriend');

		//Follow Routes
		Route::get('/user/follow/{user}', 'User\AddFriendController@follow');
		Route::get('/user/unfollow/{user}', 'User\AddFriendController@unfollow');
		Route::get('/followers', 'User\AddFriendController@followers');
		Route::get('/following', 'User\AddFriendController@following');
		Route::get('/userpost/{user}', 'user\AddFriendController@userposts');



		//Likes Route
		Route::get('/comment/like/{comment}', 'Comment\LikesController@like');
		Route::get('/comment/unlike/{comment}', 'Comment\LikesController@unlike');


		//Message Route
		Route::get('/message/{send_to}', 'Message\MessageController@message');
		Route::post('/message/create/{send_to}', 'Message\MessageController@create');

		Route::post('/contactadmin', 'User\QueryController@contactadmin')->name('contactadmin');

	

	});

	Route::group(['middleware' => ['admin']], function(){

		//Admin Routes
		Route::get('/admindashboard', 'Admin\AdminController@admindashboard')->name('admindashboard');
		Route::get('/account', 'Admin\AdminController@account')->name('account');
		Route::get('/allusers', 'Admin\AdminController@allusers')->name('allusers');
		Route::get('/suspendedusers', 'Admin\AdminController@suspendedusers')->name('suspendedusers');
		Route::get('/alladmin', 'Admin\AdminController@alladmin')->name('alladmin');

		//Posts Route
		Route::get('/post/{post}', 'Admin\PostActionController@show')->name('showpost');
		Route::get('/deletepost/{delete}', 'Admin\PostActionController@destroy')->name('deletepost');


		//Delete User
		Route::get('/deleteuser/{delete}', 'Admin\AdminController@destroy')->name('deleteuser');

		//Suspend User
		Route::get('/suspend/{user}', 'Admin\AdminActionsController@suspend')->name('suspend');
		Route::get('/unban/{user}', 'Admin\AdminActionsController@unban')->name('unban');

		//Remove Admin Priveledges
		Route::get('/removeadmin/{user}', 'Admin\AdminActionsController@removeadmin')->name('removeadmin');


		//Create Admin
		Route::post('/createadmin', 'Admin\AdminActionsController@createadmin')->name('createadmin');

		//Query Messages

		Route::get('/querymessages', 'Admin\QueriesController@querymessages')->name('querymessages');
		Route::get('/replyquery/{user}', 'Admin\QueriesController@replyquery')->name('replyquery');
		Route::post('/sendreply/{user}', 'Admin\QueriesController@sendreply')->name('sendreply');
		Route::get('/deletequery/{query}', 'Admin\QueriesController@deletequery')->name('deletequery');



		});
		

});

  






Route::get('query/{id}', function($id) {
    
     $query =  Query::find($id)->user;
     return $query;

    // foreach ($query->user as $user) {
    	
    	// echo $user->name;
    // }
});