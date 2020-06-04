<?php
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup','AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/employee','Api\EmployeeController');
Route::apiResource('/supplier','Api\SupplierController');
Route::apiResource('/category','Api\CategoryController');
Route::apiResource('/product','Api\ProductController');
Route::apiResource('/expense','Api\ExpenseController');
Route::apiResource('/customer','Api\CustomerController');

Route::Post('/salary/paid/{id}','Api\SalaryController@Paid');
Route::Get('/salary','Api\SalaryController@allSalary');
Route::Get('/salary/view/{id}','Api\SalaryController@viewSalary');
Route::Get('/edit/salary/{id}','Api\SalaryController@EditSalary');
Route::Post('/salary/update/{id}','Api\SalaryController@SalaryUpdate');
Route::Post('/stock/update/{id}','Api\StockController@stockUpdate');

Route::get('/getting/product/{id}','Api\PosController@GetProduct');
Route::get('/addTocart/{id}','Api\CartController@AddToCart');
Route::get('/cart/product','Api\CartController@CartProduct');
Route::get('/remove-to-cart/{id}','Api\CartController@removeToCart');
Route::get('/increment-to-cart/{id}','Api\CartController@Increment');
Route::get('/decrement-to-cart/{id}','Api\CartController@Decrement');
Route::get('/vat','Api\CartController@Vats');
Route::post('/order-done','Api\CartController@orderDone');
Route::get('/orders','Api\OrderController@TotalOrder');
Route::get('/order-details1/{id}','Api\OrderController@OrderDetails1');
Route::get('/order-details2/{id}','Api\OrderController@OrderDetails2');
Route::get('/search-date/{id}','Api\OrderController@searchDate');
Route::get('/search-month/{id}','Api\OrderController@searchMonth');
Route::get('/sell-today','Api\PosController@sellToday');
Route::get('/collection-today','Api\PosController@collectionToday');
Route::get('/due-today','Api\PosController@dueToday');
Route::get('/expense-today','Api\PosController@expenseToday');
Route::get('/re-order','Api\PosController@reOrder');





