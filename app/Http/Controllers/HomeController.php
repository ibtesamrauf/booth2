<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use \Input as Input;
use Illuminate\Support\Facades\Input;
use App\Products;
use App\Hotel;
use Cart;
// use Session;
use App\Country; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(['auth','isVerified']);
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hotel_id)
    {
        $products = Products::where('hotel_id' , $hotel_id)
                                // ->where('status' , 1)
                                ->orderBy('title','ASC')
                                ->paginate(15);


        return view('home' , compact('products' ));
    }
    
    public function hotel()
    {
        if(isset($_GET['pass'])){
            $_GET['pass'];
        }
        $hotel = Hotel::paginate(15);
        return view('hotel' , compact('hotel'));
    }

    public function test()
    {
        $hotel = Hotel::paginate(15);
        // return view('hotel' , compact('hotel'));
        $country = Country::get();

        return view('test' , compact('hotel', 'country'));
    }

    public function add_product_view()
    {
        return view('add_product_view');
    }

    public function add_product(Request $request)
    {
        $image_name = "";
        Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
        ])->validate();

        if(Input::hasFile('file')){
            echo 'Uploaded';
            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());
            echo '';
            $image_name = $file->getClientOriginalName();
        }
        
        Products::create([
            // 'user_id'       => \Auth::user()->id, 
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'image'         => $image_name,
        ]);

        return redirect('home')->with('status', 'Booth Added!');
    }

    public function show_product_view($product_id){
        $products = Products::where('id' , $product_id)->get();
        return view('show_product_view' , compact('products'));
    }

    public function show_cart_view(){
        return view('show_cart_view');
    }

    public function add_to_cart($add_to_cart_id,$add_to_cart_product_name,$add_to_cart_product_price){
        if(Cart::instance('shopping')->content()->isEmpty()){
            Cart::instance('shopping')->add($add_to_cart_id, $add_to_cart_product_name, 1, $add_to_cart_product_price);
        }
        foreach (Cart::instance('shopping')->content() as $key => $value) {
            if($value->id == $add_to_cart_id){
                return back()->with('status', 'Booth already in Cart!');
            }
        }
        Cart::instance('shopping')->add($add_to_cart_id, $add_to_cart_product_name, 1, $add_to_cart_product_price);
        return back()->with('status', 'Booth Added To Cart!');
    }

    public function paypal()
    {
        return view('paypal');
    }

}
