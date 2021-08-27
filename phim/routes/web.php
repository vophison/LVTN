<?php

//use Illuminate\Support\Facades\Route;

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
//frontend 
Route::get('/','HomeController@index');
Route::post('/chon-rap-order','Homecontroller@chon_rap_o');
Route::post('/chon-phong-order','Homecontroller@chon_phong_o');
Route::post('/chon-suatchieu-order','Homecontroller@chon_suatchieu_o');
Route::get('/trangchu','HomeController@index');
Route::get('/phimdangchieu','HomeController@phimdangchieu');
Route::get('/phimsapchieu','HomeController@phimsapchieu');
// tim kiem
Route::post('/tim-kiem','HomeController@search');
Route::post('/tim-kiemday','HomeController@timkiemtheongay');
//the loai phim trang chu
Route::get('/the-loai-phim/{theloaiphim_id}','theloaiphim@show_theloai_home');
// Route::get('/dang-phim/{dangphim_id}','phim@show_dang_home');
//chi tiet phim
Route::get('/chi-tiet-phim/{phim_id}','Phim@details_phim');
//chi tiet combo
Route::get('/chi-tiet-combo/{combo_id}','combo@details_combo');
//login
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/login-customer','CheckoutController@login_customer');



//checkout
Route::post('/checkout','CheckoutController@checkout');
Route::post('/hoanthanh-datve','CheckoutController@hoanthanh_datve');

Route::get('/thongtin-kh/{id}','CheckoutController@thongtinkh');
Route::get('/suakhachhang/{id}','CheckoutController@get_Suathongtin');
Route::post('/suattkhachhang/{id}','CheckoutController@post_Suathongtin');


// danh muc quan ly ve
Route::get('/manager-ve','CheckoutController@manager_ve');
Route::get('/view-ve/{veId}','CheckoutController@view_ve');

Route::get('/delete-vedat/{ve_id}','CartController@delete_vedat');
Route::get('/delete-vedatadmin/{ve_id}','CartController@delete_vedatadmin');


//danh muc quan ly khach hang
Route::get('/manager-khachhang','CheckoutController@manager_khachhang');
Route::get('/thongtinkhachhang','CartController@show_thongtinkhachhang');
//login mxh
Route::get('/google','MXHController@googleRedirect');
Route::get('/google/callback','MXHController@handleGoogleCallback');


//backend 
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//authentication
//Route::get('/authlogin','AuthController@getauthlogin');
//Route::post('/authlogin','AuthController@postauthlogin');

///Xac thuc mail dang ky
Route::match(['GET','POST'],'/confirm_register/{code}','MailController@xacNhanEmail');

//category product danh muc the loai
Route::get('/add-theloaiphim','theloaiphim@add_theloaiphim');
Route::get('/edit-theloaiphim/{theloaiphim_id}','theloaiphim@edit_theloaiphim');
Route::get('/delete-theloaiphim/{theloaiphim_id}','theloaiphim@delete_theloaiphim');
Route::get('/all-theloaiphim','theloaiphim@all_theloaiphim');
// duyet the loai
Route::get('/unactive-theloaiphim/{theloaiphim_id}','theloaiphim@unactive_theloaiphim');
Route::get('/active-theloaiphim/{theloaiphim_id}','theloaiphim@active_theloaiphim');

Route::post('/save-theloaiphim','theloaiphim@save_theloaiphim');
//sua noi dung the loai
Route::post('/update-theloaiphim/{theloaiphim_id}','theloaiphim@update_theloaiphim');



// danh muc dangphim
Route::get('/add-dangphim','dangphim@add_dangphim');
Route::get('/edit-dangphim/{dangphim_id}','dangphim@edit_dangphim');
Route::get('/delete-dangphim/{dangphim_id}','dangphim@delete_dangphim');
Route::get('/all-dangphim','dangphim@all_dangphim');
// duyet dangphim
Route::get('/unactive-dangphim/{dangphim_id}','dangphim@unactive_dangphim');
Route::get('/active-dangphim/{dangphim_id}','dangphim@active_dangphim');

Route::post('/save-dangphim','dangphim@save_dangphim');
//sua noi dung dangphim
Route::post('/update-dangphim/{dangphim_id}','dangphim@update_dangphim');



// danh muc phong
Route::get('/add-phong','Phong@add_phong');

Route::get('/edit-phong/{phong_id}','Phong@edit_phong');
Route::get('/delete-phong/{phong_id}','Phong@delete_phong');
Route::get('/all-phong','Phong@all_phong');
/* Route::post('/add-phong','Phong@test')->name('loadrap'); */
Route::post('/chon-suatchieu','Phong@chon_suatchieu');

Route::post('/save-phong','Phong@save_phong');
//sua noi dung phong
Route::post('/update-phong/{phong_id}','Phong@update_phong');


// danh muc rap
Route::get('/add-rap','Rap@add_rap');
Route::get('/edit-rap/{rap_id}','Rap@edit_rap');
Route::get('/delete-rap/{rap_id}','Rap@delete_rap');
Route::get('/all-rap','Rap@all_rap');
// duyet rap
Route::get('/unactive-rap/{rap_id}','Rap@unactive_rap');
Route::get('/active-rap/{rap_id}','Rap@active_rap');

Route::post('/save-rap','Rap@save_rap');
//sua noi dung rap
Route::post('/update-rap/{rap_id}','Rap@update_rap');


// danh muc thanh pho
Route::get('/add-thanhpho','thanhpho@add_thanhpho');
Route::get('/edit-thanhpho/{thanhpho_id}','thanhpho@edit_thanhpho');
Route::get('/delete-thanhpho/{thanhpho_id}','thanhpho@delete_thanhpho');
Route::get('/all-thanhpho','thanhpho@all_thanhpho');
// duyet thanh pho
Route::get('/unactive-thanhpho/{thanhpho_id}','thanhpho@unactive_thanhpho');
Route::get('/active-thanhpho/{thanhpho_id}','thanhpho@active_thanhpho');

Route::post('/save-thanhpho','thanhpho@save_thanhpho');
//sua thanh pho
Route::post('/update-thanhpho/{thanhpho_id}','thanhpho@update_thanhpho');

//danhmuclich
Route::get('/add-lichchieu','Lichchieu@add_lichchieu');
Route::get('/edit-lichchieu/{lichchieu_id}','Lichchieu@edit_lichchieu');
Route::get('/delete-lichchieu/{lichchieu_id}','Lichchieu@delete_lichchieu');
Route::get('/all-lichchieu','lichchieu@all_lichchieu');
// danh muc suat chieu
Route::get('/add-suatchieu','suatchieu@add_suatchieu');
Route::get('/edit-suatchieu/{suatchieu_id}','suatchieu@edit_suatchieu');
Route::get('/delete-suatchieu/{suatchieu_id}','suatchieu@delete_suatchieu');
Route::get('/all-suatchieu','suatchieu@all_suatchieu');

Route::post('/save-suatchieu','suatchieu@save_suatchieu');
//sua thanh pho
Route::post('/update-suatchieu/{suatchieu_id}','suatchieu@update_suatchieu');


// danh muc tin 
Route::get('/add-tintuc','tintuc@add_tintuc');
Route::get('/edit-tintuc/{tintuc_id}','tintuc@edit_tintuc');
Route::get('/delete-tintuc/{tintuc_id}','tintuc@delete_tintuc');
Route::get('/all-tintuc','tintuc@all_tintuc');
// duyet tin
Route::get('/unactive-tintuc/{tintuc_id}','tintuc@unactive_tintuc');
Route::get('/active-tintuc/{tintuc_id}','tintuc@active_tintuc');

Route::post('/save-tintuc','tintuc@save_tintuc');
//sua noi dung tin
Route::post('/update-tintuc/{tintuc_id}','tintuc@update_tintuc');




// danh muc phim
Route::get('/add-phim','Phim@add_phim');
Route::get('/edit-phim/{phim_id}','Phim@edit_phim');
Route::get('/delete-phim/{phim_id}','Phim@delete_phim');
Route::get('/all-phim','Phim@all_phim');
//timphim
Route::post('/tim-admin','Phim@timkiem_phim');
//timsuat
Route::post('/tim-suatchieu','suatchieu@timsuatchieu');

// duyet phim
Route::get('/unactive-phim/{phim_id}','Phim@unactive_phim');
Route::get('/active-phim/{phim_id}','Phim@active_phim');

Route::post('/save-phim','Phim@save_phim');
//sua noi dung phim
Route::post('/update-phim/{phim_id}','Phim@update_phim');


// cart
Route::post('/order-cart','CartController@order_cart');
Route::post('/order-ghe','CartController@order_ghe');
Route::get('/show-vedat','CartController@show_vedat');

// comboo
Route::post('/order-cb','CartController@order_cb');


//thanhtoanonline
Route::post('payment','CheckoutController@createPayment');
Route::get('vnpay','CheckoutController@vnpayReturn')->name('vnpay.return');

