<?php

use http\Client\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


Route::get('/payment', function() {
    return view('landing.payment');
});

Route::get('/payment/{id}/success', 'App\Http\Controllers\Landing\AppController@payment_success')->name('landing.payment.success');
Route::get('/payment/success', 'App\Http\Controllers\Landing\AppController@success')->name('payment.success');

Route::get('/sitemap.xml',
    'App\Http\Controllers\Landing\AppController@sitemap')->name('landing.sitemap');

Route::get('/.well-known/apple-developer-merchantid-domain-association.txt', function(){
    return file_get_contents("../.well-known/apple-developer-merchantid-domain-association.txt");
});
/*
 * ADMIN ROUTES
 * */
Route::group(['prefix' => 'admin'], function () {
    /**
     * AUTH ROUTES
     */
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/login',
            '\App\Http\Controllers\Admin\Account\AuthController@login')->name('admin.auth.login');
        Route::post('/login',
            '\App\Http\Controllers\Admin\Account\AuthController@login')->name('admin.auth.login');
    });


    /**
     * ADMIN PANEL ROUTES
     */
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout',
            '\App\Http\Controllers\Admin\Account\AuthController@logout')->name('admin.auth.logout');

        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.index');

        Route::get('/transactions', '\App\Http\Controllers\Admin\TransactionsController@index')->name('admin.transactions.index');

        Route::get('/admins', '\App\Http\Controllers\Admin\Admins\AdminController@admins')->name('admin.admins.index');
        Route::post('/admins', '\App\Http\Controllers\Admin\Admins\AdminController@admins')->name('admin.admins.index');
        Route::get('/admins/{id}/delete', '\App\Http\Controllers\Admin\Admins\AdminController@delete')->name('admin.admins.delete');

        Route::post('/', '\App\Http\Controllers\Admin\AppController@changePassword')->name('admin.index');

        Route::get('/orders', '\App\Http\Controllers\Admin\AppController@orders')->name('admin.orders');
        Route::get('/orders/{order}/delete', '\App\Http\Controllers\Admin\AppController@ordersDelete')->name('admin.orders.delete');
        Route::get('/back-calls', '\App\Http\Controllers\Admin\AppController@calls')->name('admin.calls');
        Route::get('/calls/{call}/delete', '\App\Http\Controllers\Admin\AppController@callsDelete')->name('admin.calls.delete');


        Route::get('/rent/cars', '\App\Http\Controllers\Admin\Rent\CarController@index')->name('admin.rent.cars');
        Route::get('/rent/cars/add',
            '\App\Http\Controllers\Admin\Rent\CarController@create')->name('admin.rent.cars.add');
        Route::post('/rent/cars/add',
            '\App\Http\Controllers\Admin\Rent\CarController@create')->name('admin.rent.cars.add');
        Route::get('/rent/cars/{car}/edit',
            '\App\Http\Controllers\Admin\Rent\CarController@edit')->name('admin.rent.cars.edit');
        Route::post('/rent/cars/{car}/edit',
            '\App\Http\Controllers\Admin\Rent\CarController@edit')->name('admin.rent.cars.edit');
        Route::get('/rent/cars/{car}/remove-image',
            '\App\Http\Controllers\Admin\Rent\CarController@removeImage')->name('admin.rent.cars.remove_image');
        Route::get('/rent/cars/{car}/delete',
            '\App\Http\Controllers\Admin\Rent\CarController@destroy')->name('admin.rent.cars.delete');

        Route::get('/categories',
            '\App\Http\Controllers\Admin\Categories\CategoryController@index')->name('admin.categories');
        Route::get('/categories/add',
            '\App\Http\Controllers\Admin\Categories\CategoryController@create')->name('admin.categories.add');
        Route::post('/categories/add',
            '\App\Http\Controllers\Admin\Categories\CategoryController@create')->name('admin.categories.add');
        Route::get('/categories/{category}/edit',
            '\App\Http\Controllers\Admin\Categories\CategoryController@edit')->name('admin.categories.edit');
        Route::post('/categories/{category}/edit',
            '\App\Http\Controllers\Admin\Categories\CategoryController@edit')->name('admin.categories.edit');
        Route::get('/categories/{category}/delete',
            '\App\Http\Controllers\Admin\Categories\CategoryController@destroy')->name('admin.categories.delete');
    });
});

/**
 * END ADMIN ROUTES
 */




Route::group(['prefix' => 'en'], function () {

        Route::get('/', '\App\Http\Controllers\Landing\AppController@index')->name('landing.index.en');
        Route::get('/thanks', '\App\Http\Controllers\Landing\AppController@thanks')->name('landing.thanks.en');
    Route::get('/contract', '\App\Http\Controllers\Landing\AppController@oferta')->name('landing.contract.en');
        Route::get('/{car_url?}', '\App\Http\Controllers\Landing\AppController@car')->name('landing.car.en');
        Route::get('/404', '\App\Http\Controllers\Landing\AppController@notFound')->name('landing.404.en');
});

Route::group(['prefix' => 'Ru'], function () {
	Route::get('/404', '\App\Http\Controllers\Landing\AppController@notFound')->name('landing.404.ru');
    Route::get('/{car_url}', '\App\Http\Controllers\Landing\AppController@car')->name('landing.car.ru');
    Route::get('/contract', '\App\Http\Controllers\Landing\AppController@oferta')->name('landing.contract.ru');
});

Route::group(['prefix' => 'ru'], function () {
	Route::get('/404', '\App\Http\Controllers\Landing\AppController@notFound')->name('landing.404.ru');
    Route::get('/{car_url}', '\App\Http\Controllers\Landing\AppController@car')->name('landing.car.ru');
    Route::get('/contract', '\App\Http\Controllers\Landing\AppController@oferta')->name('landing.contract.ru');
});

Route::group(['prefix' => 'En'], function () {

    Route::get('/', '\App\Http\Controllers\Landing\AppController@index')->name('landing.index.en');
    Route::get('/thanks', '\App\Http\Controllers\Landing\AppController@thanks')->name('landing.thanks.en');
    Route::get('/contract', '\App\Http\Controllers\Landing\AppController@oferta')->name('landing.contract.en');
    Route::get('/{car_url}', '\App\Http\Controllers\Landing\AppController@car')->name('landing.car.en');
    Route::get('/404', '\App\Http\Controllers\Landing\AppController@notFound')->name('landing.404.en');
});

Route::get('/', '\App\Http\Controllers\Landing\AppController@index')->name('landing.index.ru');
Route::get('/thanks', '\App\Http\Controllers\Landing\AppController@thanks')->name('landing.thanks.ru');
Route::get('/404', '\App\Http\Controllers\Landing\AppController@notFound')->name('landing.404');
Route::get('/contract', '\App\Http\Controllers\Landing\AppController@oferta')->name('landing.contract.ru');
Route::get('/{car_url}', '\App\Http\Controllers\Landing\AppController@car')->name('landing.car.ru');



Route::get('/language-change/{locale}',
    'App\Http\Controllers\Landing\AppController@languageChange')->name('language.change');


/**
 * CALLS
 */
Route::post('/form/call',
    'App\Http\Controllers\Landing\AppController@backCall')->name('landing.form.call');
Route::post('/form/order',
    'App\Http\Controllers\Landing\AppController@order')->name('landing.form.order');
Route::post('/form/payment',
    'App\Http\Controllers\Landing\AppController@payment')->name('landing.form.payment');


//Переключение языков
/*Route::get('language-change/{locale}', function ($locale) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], \App\Http\Middleware\Language::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($locale != \App\Http\Middleware\Language::$mainLanguage){
        array_splice($segments, 1, 0, $locale);
    }

    //формируем полный URL
    $url = str_replace('/public', '', implode("/", $segments));

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }

    if (!in_array($locale, ['en', 'ru'])) {
        abort(400);
    }

    session()->put('locale', $locale);
    App::setLocale($locale);

    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('language.change');*/