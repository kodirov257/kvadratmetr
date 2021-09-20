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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('admin',function () {
    return redirect('ru/admin');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/', 'HomeController@index')->name('home');

//    Auth::routes();

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('login/phone', 'Auth\LoginController@phone')->name('login.phone');
    Route::get('logout', 'Auth\LoginController@logout');

    Route::post('login', 'Auth\LoginController@login')->name('signin'); // TODO duplicate
    Route::post('login/phone', 'Auth\LoginController@verify');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');// TODO duplicate
    Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');// TODO duplicate
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');// TODO duplicate
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');// TODO duplicate

    Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::get('password/reset/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('password/reset/email', 'Auth\ForgotPasswordController@resetEmail')->name('password.reset.email');
    Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset/request', 'Auth\ForgotPasswordController@resetRequest')->name('password.reset.request');

    Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

    Route::get('verify/email', 'Auth\RegisterController@email')->name('email.verification');
    Route::get('verify/email/{token}', 'Auth\RegisterController@verifyEmail')->name('verify.email');
    Route::get('verify/email/resend', 'Auth\RegisterController@resendEmailShow')->name('resend.email.show');
    Route::post('verify/email/resend', 'Auth\RegisterController@resendEmail')->name('resend.email.verification');
    Route::get('verify/phone', 'Auth\RegisterController@phone')->name('phone.verification');
    Route::post('verify/phone', 'Auth\RegisterController@verifyPhone')->name('verify.phone');
    Route::get('verify/phone/resend', 'Auth\RegisterController@resendPhoneShow')->name('resend.phone.show');
    Route::post('verify/phone/resend', 'Auth\RegisterController@resendPhone')->name('resend.phone.verification');

    Route::get('/login/{network}', 'Auth\NetworkController@redirect')->name('login.network');
    Route::get('/login/{network}/callback', 'Auth\NetworkController@callback');

    Route::group(
        [
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => 'Admin',
            'middleware' => ['auth', 'can:admin-panel'],
        ],
        function () {
            Route::post('/ajax/upload/image', 'UploadController@image')->name('ajax.upload.image');

            Route::get('/', 'HomeController@index')->name('home');
            Route::resource('users', 'UsersController');

            Route::resource('category', 'CategoryController');

            Route::post('/users/{user}/verify', 'UsersController@verify')->name('users.verify');

            Route::resource('regions', 'RegionController');

            Route::resource('pages', 'PageController');

            Route::group(['prefix' => 'pages/{page}', 'as' => 'pages.'], function () {
                Route::post('/first', 'PageController@first')->name('first');
                Route::post('/up', 'PageController@up')->name('up');
                Route::post('/down', 'PageController@down')->name('down');
                Route::post('/last', 'PageController@last')->name('last');
            });

            Route::group(['prefix' => 'projects', 'as' => 'projects.', 'namespace' => 'Projects'], function () {

                Route::resource('categories', 'CategoryController');

                Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
                    Route::post('/first', 'CategoryController@first')->name('first');
                    Route::post('/up', 'CategoryController@up')->name('up');
                    Route::post('/down', 'CategoryController@down')->name('down');
                    Route::post('/last', 'CategoryController@last')->name('last');
                });

                Route::resource('characteristics', 'CharacteristicController');

                Route::group(['prefix' => 'characteristics/{characteristic}', 'as' => 'characteristics.'], function () {
                    Route::post('/first', 'CharacteristicController@first')->name('first');
                    Route::post('/up', 'CharacteristicController@up')->name('up');
                    Route::post('/down', 'CharacteristicController@down')->name('down');
                    Route::post('/last', 'CharacteristicController@last')->name('last');
                });

//                Route::get('/', 'ProjectController@index')->name('index');
                Route::get('/{project}/edit', 'ProjectController@edit')->name('edit');
                Route::put('/{project}/update', 'ProjectController@update')->name('update');
                Route::get('/{project}/photos', 'ProjectController@photosForm')->name('photos');
                Route::post('/{project}/photos', 'ProjectController@photos');
                Route::get('/{project}/characteristics', 'ProjectController@characteristicsForm')->name('characteristics');
                Route::post('/{project}/characteristics', 'ProjectController@characteristics');
                Route::post('/{project}/moderate', 'ProjectController@moderate')->name('moderate');
                Route::get('/{project}/reject', 'ProjectController@rejectForm')->name('reject');
                Route::post('/{project}/reject', 'ProjectController@reject');
                Route::delete('/{project}/destroy', 'ProjectController@destroy')->name('destroy');

                Route::group(['prefix' => 'values', 'as' => 'values.'], function () {
                    Route::get('create', 'ValueController@create')->name('add');
                    Route::post('', 'ValueController@store')->name('store');
                    Route::get('characteristic/{characteristic}', 'ValueController@show')->name('show');
                    Route::get('characteristic/{characteristic}/edit', 'ValueController@edit')->name('edit');
                    Route::put('characteristic/{characteristic}', 'ValueController@update')->name('update');
                    Route::delete('characteristic/{characteristic}', 'ValueController@destroy')->name('destroy');
                    Route::post('characteristic/{characteristic}/first', 'ValueController@first')->name('first');
                    Route::post('characteristic/{characteristic}/up', 'ValueController@up')->name('up');
                    Route::post('characteristic/{characteristic}/down', 'ValueController@down')->name('down');
                    Route::post('characteristic/{characteristic}/last', 'ValueController@last')->name('last');
                });
            });
            Route::resource('projects', 'Projects\ProjectController');

            Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {
                Route::get('/', 'BannerController@index')->name('index');
                Route::get('/{banner}/show', 'BannerController@show')->name('show');
                Route::get('/{banner}/edit', 'BannerController@editForm')->name('edit');
                Route::put('/{banner}/edit', 'BannerController@edit');
                Route::post('/{banner}/moderate', 'BannerController@moderate')->name('moderate');
                Route::get('/{banner}/reject', 'BannerController@rejectForm')->name('reject');
                Route::post('/{banner}/reject', 'BannerController@reject');
                Route::post('/{banner}/pay', 'BannerController@pay')->name('pay');
                Route::delete('/{banner}/destroy', 'BannerController@destroy')->name('destroy');
            });

            Route::group(['prefix' => 'tickets', 'as' => 'tickets.'], function () {
                Route::get('/', 'TicketController@index')->name('index');
                Route::get('/{ticket}/show', 'TicketController@show')->name('show');
                Route::get('/{ticket}/edit', 'TicketController@editForm')->name('edit');
                Route::put('/{ticket}/edit', 'TicketController@edit');
                Route::post('{ticket}/message', 'TicketController@message')->name('message');
                Route::post('/{ticket}/close', 'TicketController@close')->name('close');
                Route::post('/{ticket}/approve', 'TicketController@approve')->name('approve');
                Route::post('/{ticket}/reopen', 'TicketController@reopen')->name('reopen');
                Route::delete('/{ticket}/destroy', 'TicketController@destroy')->name('destroy');
            });
        }
    );

    Route::get('/banner/get', 'BannerController@get')->name('banner.get');
    Route::get('/banner/{banner}/click', 'BannerController@click')->name('banner.click');

    Route::group([
        'prefix' => 'projects',
        'as' => 'projects.',
        'namespace' => 'Projects',
    ], function () {
        Route::get('/show/{project}', 'ProjectController@show')->name('show');
        Route::post('/show/{project}/phone', 'ProjectController@phone')->name('phone');
        Route::post('/show/{project}/favorites', 'FavoriteController@add')->name('favorites');
        Route::delete('/show/{project}/favorites', 'FavoriteController@remove');

        Route::get('/{projects_path?}', 'ProjectController@index')->name('index')->where('projects_path', '.+');
    });

    Route::group(
        [
            'prefix' => 'cabinet',
            'as' => 'cabinet.',
            'namespace' => 'Cabinet',
            'middleware' => ['auth'],
        ],
        function () {
            Route::get('/', 'HomeController@index')->name('home');

            Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
                Route::get('/', 'ProfileController@index')->name('home');
                Route::get('/edit', 'ProfileController@edit')->name('edit');
                Route::put('/update', 'ProfileController@update')->name('update');
                Route::post('/phone', 'PhoneController@request');
                Route::get('/phone', 'PhoneController@form')->name('phone');
                Route::put('/phone', 'PhoneController@verify')->name('phone.verify');

                Route::post('/phone/auth', 'PhoneController@auth')->name('phone.auth');
            });

            Route::get('favorites', 'FavoriteController@index')->name('favorites.index');
            Route::delete('favorites/{project}', 'FavoriteController@remove')->name('favorites.remove');

            Route::resource('tickets', 'TicketController')->only(['index', 'show', 'create', 'store', 'destroy']);
            Route::post('tickets/{ticket}/message', 'TicketController@message')->name('tickets.message');

            Route::group([
                'prefix' => 'projects',
                'as' => 'projects.',
                'namespace' => 'Projects',
//            'middleware' => [App\Http\Middleware\FilledProfile::class],
            ], function () {
                Route::get('/', 'ProjectController@index')->name('index');
                Route::get('/create', 'CreateController@category')->name('create');
                Route::get('/create/region/{category}/{region?}', 'CreateController@region')->name('create.region');
                Route::get('/create/project/{category}/{region?}', 'CreateController@project')->name('create.project');
                Route::post('/create/project/{category}/{region?}', 'CreateController@store')->name('create.project.store');

                Route::get('/{project}/edit', 'ManageController@editForm')->name('edit');
                Route::put('/{project}/edit', 'ManageController@edit');
                Route::get('/{project}/photos', 'ManageController@photosForm')->name('photos');
                Route::post('/{project}/photos', 'ManageController@photos');
                Route::get('/{project}/characteristics', 'ManageController@characteristicsForm')->name('characteristics');
                Route::post('/{project}/characteristics', 'ManageController@characteristics');
                Route::post('/{project}/send', 'ManageController@send')->name('send');
                Route::post('/{project}/close', 'ManageController@close')->name('close');
                Route::delete('/{project}/destroy', 'ManageController@destroy')->name('destroy');
            });

            Route::group([
                'prefix' => 'banners',
                'as' => 'banners.',
                'namespace' => 'Banners',
                'middleware' => [App\Http\Middleware\FilledProfile::class],
            ], function () {
                Route::get('/', 'BannerController@index')->name('index');
                Route::get('/create', 'CreateController@category')->name('create');
                Route::get('/create/region/{category}/{region?}', 'CreateController@region')->name('create.region');
                Route::get('/create/banner/{category}/{region?}', 'CreateController@banner')->name('create.banner');
                Route::post('/create/banner/{category}/{region?}', 'CreateController@store')->name('create.banner.store');

                Route::get('/show/{banner}', 'BannerController@show')->name('show');
                Route::get('/{banner}/edit', 'BannerController@editForm')->name('edit');
                Route::put('/{banner}/edit', 'BannerController@edit');
                Route::get('/{banner}/file', 'BannerController@fileForm')->name('file');
                Route::put('/{banner}/file', 'BannerController@file');
                Route::post('/{banner}/send', 'BannerController@send')->name('send');
                Route::post('/{banner}/cancel', 'BannerController@cancel')->name('cancel');
                Route::post('/{banner}/order', 'BannerController@order')->name('order');
                Route::delete('/{banner}/destroy', 'BannerController@destroy')->name('destroy');
            });
        }
    );

    Route::get('/{page_path}', 'PageController@show')->name('page')->where('page_path', '.+');
});