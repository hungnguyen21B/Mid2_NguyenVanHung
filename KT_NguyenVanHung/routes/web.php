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

// Route::get('/', 'TourController@getList');
// Route::get('/add', 'TourController@getFormAdd');
// Route::post('/add', 'TourController@postAdd');
//lay giao dien trang chu
Route::get('/index',['as'=>'trang-chu',
'uses'=>'PageController@getIndex']);
//lay giao dien tim kiem
Route::get('tim-kiem',['as'=>'search',
'uses'=>'PageController@getSearch']);
//lay giao dien trang gioi thieu
Route::get('/gioi-thieu',['as'=>'gioithieu',
'uses'=>'PageController@getIntro']);
//lay giao dien trang lien he
Route::get('/lien-he',['as'=>'lienhe',
'uses'=>'PageController@getContact']);
//lay giao dien loai san pham theo loai
Route::get('loai-san-pham/{type}',['as'=>'loaisanpham',
'uses'=>'PageController@getLoaiSp']);
//xu li xoa san pham
Route::get('xoa-gio-hang',['as'=>'xoagiohang',
'uses'=>'PageController@clearCart']);
//lay giao dien chi tiet san pham
Route::get('chi-tiet-san-pham/{idChitiet}',['as'=>'chitiet',
'uses'=>'PageController@getChitiet']);
//xu li add cart
Route::get('them-gio-hang/{id}',['as'=>'themgiohang',
'uses'=>'PageController@getAddToCart']);
//xu li xoa so luong 1 san pham trong gio hang
Route::get('xoa-san-pham/{id}',['as'=>'xoasanphamtronggiohang',
'uses'=>'PageController@getDeleteProductCart']);
//xu li xoa san pham do trong gio hang
Route::get('xoa-1-san-pham/{id}',['as'=>'xoa1sanphamtronggiohang',
'uses'=>'PageController@getRemoveProductCart']);
//lay giao dien dat hang
Route::get('dat-hang',['as'=>'dathang',
'uses'=>'PageController@getOrder']);
//xu li dat hang hoa
Route::post('dat-hang-hoa',['as'=>'postdathang',
'uses'=>'PageController@postOrder']);
//lay giao dien trang dang nhap
Route::get('dang-nhap',['as'=>'login',
'uses'=>'PageController@getLogin']);
//xu li dang nhap
Route::post('dang-nhap',['as'=>'login',
'uses'=>'PageController@postLogin']);
//lay giao dien trang dang ki
Route::get('dang-ki',['as'=>'signup',
'uses'=>'PageController@getSignup']);
//xu li dang ki
Route::post('dang-ki',['as'=>'signup',
'uses'=>'PageController@postSignup']);
//xu li dang xuat va tra ve dang nhap
Route::get('dang-xuat',['as'=>'logout',
'uses'=>'PageController@getLogout']);
//lay giao dien quen mat khau
Route::get('quen-mat-khau',['as'=>'getforgotPassword',
'uses'=>'PageController@getForgot']);
//xu li su kien lay code tro ve page nhap code
Route::post('nhap-code',['as'=>'forgotPassword',
'uses'=>'PageController@postForgot']);
//xu li kiem tra code
Route::post('checkCode',['as'=>'postCheckCode',
'uses'=>'PageController@postCheckCode']);
//giao dien reset mat khau
Route::post('dat-lai-password',['as'=>'resetPassword',
'uses'=>'PageController@resetPassword']);
//giao dien admin
Route::get('admin',['as'=>'index-admin',
'uses'=>'PageController@getIndexAdmin']);
//hien thi giao dien addm adm
Route::get('admin-add-form',['as'=>'getadminadd',
'uses'=>'PageController@getAdminAdd']);
//xu li add adm
Route::post('admin-add',['as'=>'adminadd',
'uses'=>'PageController@postAdminAdd']);
Route::post('admin-delete/{id}',['as'=>'admindelete',
'uses'=>'PageController@postAdminDelete']);
//hien thi giao dien edit adm
Route::get('admin-edit-form/{id}',['as'=>'getadminedit',
'uses'=>'PageController@getAdminEdit']);
//xu li edit adm
Route::post('admin-edit',['as'=>'adminedit',
'uses'=>'PageController@postAdminEdit']);