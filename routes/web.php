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

/*
 *
 * I can use these as facades or helper functions
 * 
 * View:: or view()
 * 
 * Request or request()
 * 
 * App or app
 * 
 * 
 * If we want to bind something into the service container, we can do this
 * 
 * App::bind('App\Billing\MyBilling', function() {
 * 	// note in this example, MyBilling must have a constructor
 * 	return \App\Billing\MyBilling('my_input_arg', config('services.stripe.secret'));
 * });
 * 
 * Now the user can do this:
 * 
 * $aBillingObject = App::make('App\Billing\MyBilling');
 * 
 * or
 * 
 * $aBillingObject = resolve('App\Billing\MyBilling');
 * 
 * The above will create the object using the args passed in the constructor
 * 
 * And App::singleton('App\Billing\MyBilling', function() {, is even better.
 * 
 * or App::instance.
 * 
 * All of the above belongs in a service provider, in App/Providers. Where in the 
 * examples above, App:: blah blah is bound to the already existing AppServiceProvider.
 * 
 * We would put the above App::bind or App::singleton, etc into the "register" method 
 * of AppServiceProvider.
 * 
 * An alternative syntax is: 
 * 
 * $this->app->singleton('App\Billing\MyBilling', function() {
 * 
 * 
 * In the config/app.php file, find the "providers" array. This is where all providers
 * are registered.
 * 
 * Those service providers that do not implement anything in its boot method, thus only 
 * having code in the register method, can be lazy loaded, by adding this:
 * 
 * protected $defer = true;
 * 
 * Service providers may be created using artisan: 
 * 
 * php artisan make:provider MyServiceProvider
 * 
 * Note that this still requires you to update the providers array in config/app.php.
 */

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
