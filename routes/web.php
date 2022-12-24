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

Route::get('/gui', function () {
    return view('shop-page.mail.resign-mail');
});

Route::get('/login','userController@getLogin')->name('login');
Route::post('/post-login','userController@postLogin')->name('post-login');

Route::get('/logout','userController@getLogout')->name('logout');

Route::group(['middleware' => 'auth'],function (){
    Route::group(['prefix' => 'admin'],function (){

        Route::get('/dashboard','dashboardController@dashboard')->name('dashboard');

        //Quản lý người dùng
        Route::group(['prefix' => 'staff'],function (){
            //Danh sách nhân viên
            Route::get('/','userController@listUser')->name('list-user');
            //Thêm mới nhân viên
            Route::get('/add-staff','userController@getAddUser')->name('getAdd-user');
            Route::post('/post-Adduser','userController@postAddUser')->name('postAdd-user');
            //Chỉnh sửa nhân viên
            Route::get('/edit-staff={id}','userController@getEditUser')->name('edit-staff');
            Route::post('/postEdit-staff/{id}','userController@postEditUser')->name('postEdit-staff');
            //Xóa nhân viên
            Route::get('/del-staff/{id}','userController@DelUser')->name('del-staff');
        });
        //Quản lý chuyên mục
        Route::group(['prefix' => 'cate'],function (){
            //Danh sách chuyên mục
            Route::get('/','categoryController@ListCate')->name('list-cate');

            Route::get('/danhmuc    /{id}','categoryController@listProductCate')->name('cate-product-list');
            //Thêm mới
            Route::post('/postAdd-cate','categoryController@postAddCate')->name('post-add-cate');
            //Sửa
            Route::get('/edit-cate={id}','categoryController@getEditCate')->name('edit-cate');
            Route::post('/postEdit-cate/{id}','categoryController@postEditCate')->name('post-edit-cate');
            //Xóa
            Route::get('/delcate/{id}','categoryController@DelCate')->name('del-cate');
        });
        Route::group(['prefix' => 'products'],function (){
            //Danh sách
            Route::get('/','productsController@ListProduc')->name('list-produc');

            Route::get('/them-sanpham','productsController@getAddProducts')->name('add-products');
            Route::post('/post-addSP','productsController@postAddProducts')->name('post-add-products');

            Route::get('/{id}','productsController@getEditProducts')->name('products-edit');
            Route::post('/post-edit-sp/{id}','productsController@postEditProducts')->name('products-edit-post');

            Route::get('/delSP/{id}','productsController@DelProducts')->name('del-products');
        });
        Route::group(['prefix' => 'discount'],function (){
            Route::get('/','discountController@Listdiscount')->name('listdiscount');

            Route::get('/add-discount','discountController@getAdddDiscount')->name('add-discount');
            Route::post('/post-add-discount','discountController@postAddDiscount')->name('post-add-discount');

            Route::get('/edit-discount={id}','discountController@getEditDiscount')->name('discount-edit');
            Route::post('/postEdit-discout/{id}','discountController@postEditDiscount')->name('post-edit-discount');

            Route::get('/del-discount/{id}','discountController@DelDiscount')->name('del-discount');
        });
        Route::group(['prefix' => 'bill'],function (){
            Route::get('/','BillController@listBill')->name('bill-list');

            Route::get('/don-hang/{id}','BillController@listOrder')->name('order-list');

            Route::post('/edit-bill/{id}','BillController@EditBill')->name('edit-bill');
        });
        Route::group(['prefix' => 'news'],function (){
           Route::get('/','newsController@listNew')->name('list-new');

           Route::get('/them-tin','newsController@getAddNew')->name('get-add-new');
           Route::post('/post-them-tin','newsController@postAddNew')->name('post-add-new');

            Route::get('/sua-tin/{id}','newsController@getEditNew')->name('get-edit-new');
            Route::post('/post-sua-tin/{id}','newsController@postEditNew')->name('post-edit-new');

            Route::get('/xoa-tin/{id}','newsController@delNew')->name('del-new');
        });
        Route::group(['prefix' => 'slide'],function (){
            Route::get('/','slideController@listSlide')->name('slide');

            Route::get('/them-slide','slideController@addSlide')->name('add-slide');
            Route::post('/post-them-slide','slideController@postAddSlide')->name('post-add-slide');

            Route::get('/sua-slide/{id}','slideController@editSlide')->name('edit-slide');
            Route::post('/post-sua-slide/{id}','slideController@postEditSlide')->name('post-edit-slide');

            Route::get('/xoa-slide/{id}','slideController@delSlide')->name('del-slide');
        });
    });
});

//Route::group(['prefix' => '/'],function (){
   Route::get('/','pageController@Index')->name('index');
   Route::get('/gheSofa','pageController@viewall')->name('viewall');

   Route::get('/danhmuc/{id}','pageController@viewpage')->name('viewpage');

   Route::get('/Search_sp','pageController@searchProducr')->name('producr-search');

   Route::get('/sanpham/{id}','pageController@viewproducts')->name('viewproducts');

   Route::get('/blog','pageController@viewlistNew')->name('blog');

   Route::get('/read-blog/{id}','pageController@readNew')->name('new-read');

   Route::get('/Add-Cart/{id}','pageController@addCart')->name('addCart');
   Route::get('/Del-Item-Cart/{id}','pageController@delCart')->name('delCart');
   Route::get('/List-Item-Cart','pageController@listCart')->name('listCart');

   Route::get('/Del-list-Cart/{id}','pageController@delListCart')->name('delListCart');
   Route::get('/Edit-list-Cart/{id}/{quanty}','pageController@editListCart')->name('editListCart');

   Route::get('/giao-hang','pageController@Delivery')->name('delivery');
   Route::post('/Dat-hang','pageController@postOrder')->name('order-post');

   Route::post('/resign-email','SendMailController@sendMail')->name('send-mail');
//});
