<?php
use App\Products;
use App\Order_history;

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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Route::get('/', 'WelcomeController@index');
// Route::get('/', 'HomeController@hotel');
Route::get('/', 'HomeController@test');

Route::resource('hotel', 'HotelController');


Route::get('/home/{hotel_id}', 'HomeController@index');

Route::get('/add_product_view', 'HomeController@add_product_view');
Route::post('/add_product', 'HomeController@add_product');

Route::get('/show_product_view/{product_id}', 'HomeController@show_product_view');

Route::resource('show_cart_view', 'Show_cart_viewController');

Route::get('conform_order', 'Show_cart_viewController@conform_order');

Route::get('/add_to_cart/{add_to_cart_id}/{add_to_cart_product_name}/{add_to_cart_product_price}', 'HomeController@add_to_cart');

// Route::get('/add_to_cart', function () {
// 	// Cart::instance('shopping')->destroy();
//     Cart::instance('shopping')->add('192ao1ss', 'Product new', 1, 10.00);
//     // return view('welcome');
// });

Route::resource('network', 'ProductController');

Route::resource('booth', 'ProductController');

Route::get('disable_booth_after_paypal', function () {
	$temp = "";	
	if(!empty($_GET['ids'])){
		$products_ids_to_disable = $_GET['ids'];
		$temp = explode(",,", $products_ids_to_disable);
		$temp = array_filter($temp);
		$temp = array_values($temp);
		if(!empty($_GET['sess_val'])){
			$session_values_of_user = $_GET['sess_val'];
			$temp2 = explode("--", $session_values_of_user);
			$temp2 = array_filter($temp2);
			$temp2 = array_values($temp2);
		}

		foreach ($temp as $key => $value) {
			Products::where('id', $value)->update(['status' => 0]);
			Order_history::create([
		            'first_name'            => $temp2[0],
		            'last_name'             => $temp2[1],
		            'email'                 => $temp2[2],
		            'phone_number'          => $temp2[3],
		            'address'               => $temp2[4],
		            'product_id'            => $value,
		        ]);
		}
	}

	// vv($temp2);
	// Cart::instance('shopping')->destroy();
    // Cart::instance('shopping')->add('192ao1ss', 'Product new', 1, 10.00);
    Cart::instance('shopping')->destroy();

    return redirect('/')->with('status', 'Order successful. Come again Thanks!');
});

Route::get('/test', 'HomeController@test');


Auth::routes();

Route::get('/home', function () {
    // return view('welcome');
    return redirect('/');
});

Route::get('/admin', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/order_history', 'HomeController@order_history');
Route::post('/order_history_post', 'HomeController@order_history_post');
Route::get('/order_history_show', 'HomeController@order_history_show');


Route::group(['middleware' => 'jobseeker_guest'], function() {

    Route::get('/jobseeker_register', 'JobseekerAuth\RegisterController@showRegistrationForm');
    Route::post('/jobseeker_register', 'JobseekerAuth\RegisterController@register');
    Route::get('jobseeker_login', 'JobseekerAuth\LoginController@showLoginForm');
    Route::post('jobseeker_login', 'JobseekerAuth\LoginController@login');
    Route::get("/view-job/{token}", 'Jobseeker\JobseekerController@viewJob');
});

Route::group(['middleware' => 'jobseeker_auth'], function() {
	Route::get('/paypal', 'HomeController@paypal');

    Route::get('/jobseeker_logout', 'JobseekerAuth\LoginController@logout');
});