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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//ログアウト中のページ
//ログイン画面　ログイン画面を表示
Route::get('/login', 'Auth\LoginController@login')->name('login');
//ログイン処理
Route::post('/login', 'Auth\LoginController@login');

//新規登録画面
//新規画面を表示させる
Route::get('/register', 'Auth\RegisterController@register');
//見えない処理をする　新規ユーザー登録
Route::post('/register', 'Auth\RegisterController@register');

//postのみ見えない処理は限らない　ログアウトの処理
Route::get('/logout', 'Auth\LoginController@logout');

//登録を完了した時の画面を表示させる
Route::get('/added', 'Auth\RegisterController@added');

//投稿フォーム//
// Route::prefix('admin/items')->name('admin.items.')->group(function() {
//     Route::get('index', 'ItemsController@index')->name('index');
//  });

//  Route::resource('top', 'PostsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);

//ログイン中のページ
//投稿画面（トップ）を表示させる
Route::get('/top', 'PostsController@index');

//プロフィール画面を表示させる
Route::get('/profile', 'UsersController@profile');

//プロフィールを更新させる
Route::post('/update', 'UsersController@update')->name('profile.update');

//検索画面を表示させる
Route::get('/search', 'UsersController@search');

//ユーザー一覧と検索画面
Route::get('/','UsersController@search')->name('users.search');

// Route::get('/users/show', 'UsersController@users.show');

//フォローリスト画面を表示させる
Route::get('/follow-list', 'FollowsController@followList');
//フォロワーリスト画面を表示させる
Route::get('/follower-list', 'FollowsController@followerList');

//つぶやきの登録を処理する
Route::post('/post/create', 'PostsController@create');

//つぶやきを更新の処理をする
Route::post('/post/update', 'PostsController@postsupdate');

//つぶやきを消去の処理をする
Route::get('/post/{id}/delete', 'PostsController@delete');
// //テストコード
// Route::get('/', function () {
//     return view('welcome');
// });

// //下記コードを記述しましょう。
// Route::get('hello', function(){
//     echo 'Hello World !';
// });

// //テストコード
// Route::get('hello', 'PostsController@hello');