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

Route::get('/', function () {
    return view('welcome');
});
Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as' => 'contactus.store', 'uses' => 'ContactUSController@contactUSPost']);
Auth::routes();
Route::resource('/card', 'CardController');
Route::resource('/deck', 'DeckController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@index')->name('search');
Route::get('/cardDisplay', 'CardDisplayController@cardDisplay')->name('cardDisplay');
Route::get('/searchResults', 'CardDisplayController@cardDisplay');
Route::get('/nextPage', 'CardDisplayController@cardDisplay');


//Route::get('/card/create', 'CardDisplayController@create')->name('card.create');
//Route::post('/card', 'CardDisplayController@store')->name('card.store');

Route::get('/card/create', 'CardController@create')->name('card.create');
Route::post('/card', 'CardController@store')->name('card.store');
Route::get('/deck/create', 'DeckController@create')->name('deck.create');
Route::post('/deck', 'DeckController@store')->name('deck.store');



Route::resource('/news', 'BlogController');
Route::resource('/card', 'CardController');
//Route::resource('/deck', 'DeckController');
//Route::resource('/profile/', 'Profile/ProfileController');


Route::group(
    ['middleware' => "App\Http\Middleware\AdminMiddleware"],
    function () {
        Route::match(['get', 'post'], '/admin/', "HomeController@admin");
    }
);

Route::group(
    ['middleware' => "App\Http\Middleware\MemberMiddleware"],
    function () {
        Route::match(['get', 'post'], '/editor/', "HomeController@member");
    }
);

Route::get('/dashboard', 'HomeController@index')->name('home');
require __DIR__ . '/profile/profile.php';

//Route::get('/profile.shows', 'App\UserController@view_post');
Route::get('/profile/shows', 'BlogController@view_post');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('/post/create', 'BlogController@create')->name('post.create');
Route::post('/post/store', 'BlogController@store')->name('post.store');

Route::get('/post/show/{id}', 'BlogController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);

