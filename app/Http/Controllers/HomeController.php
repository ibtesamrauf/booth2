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
use App\Order_history;
use Illuminate\Support\Facades\Auth;

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

    public function test(Request $request)
    {
        if($request->country_select == "All Country"){
            $request->country_select = "";
        }

        if($request->hotel_select == "All Hotel"){
            $request->hotel_select = "";
        }

        if(!empty($request->search) && !empty($request->country_select) && !empty($request->hotel_select)){
            $hotel = Hotel::with('Events')
                            ->where('name' , 'like',  "%$request->search%")
                            ->orWhere('description', 'like',  "%$request->search%")
                            ->orWhere('country_id' , $request->country_select)
                            ->orWhere('id', $request->hotel_select)
                            ->paginate(12);
                            // v('1');
        }
        elseif(!empty($request->country_select) && (empty($request->search)))
        {
            $hotel = Hotel::with('Events')->orWhere('country_id' , $request->country_select)->paginate(12);
                            // v('2');
        }
        elseif (!empty($request->search) && (empty($request->country_select))) {
            $hotel = Hotel::with('Events')
                        ->where('name' , 'like',  "%$request->search%")
                        // ->orWhere('description', 'like',  "%$request->search%")
                        ->paginate(12);
                            // v('3');
        }
        elseif(!empty($request->hotel_select) && (empty($request->search)) && (empty($request->country_select))){
            // v("4");
            $hotel = Hotel::with('Events')->where('id', $request->hotel_select)->paginate(12);
        }
        else{
                            // v('5');
            $hotel = Hotel::with('Events')->paginate(12);
        }
        // vv($hotel);
        // return view('hotel' , compact('hotel'));
        $country = Country::get();
        $hotel_lists = Hotel::get();
        return view('test' , compact('hotel', 'country', 'hotel_lists'));
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

    public function order_history()
    {
        return view('order_history');
    }

    public function order_history_post(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        // Order_history::create([
        //     'first_name'            => $request->first_name,
        //     'last_name'             => $request->last_name,
        //     'email'                 => $request->email,
        //     'phone_number'          => $request->phone_number,
        //     'address'               => $request->address,
        // ]);
    
        session(['first_name'   => $request->first_name]);
        session(['last_name'    => $request->last_name]);
        session(['email'        => $request->email]);
        session(['phone_number' => $request->phone_number]);
        session(['address'      => $request->address]);
    
        return redirect('conform_order');
    }
    
    public function order_history_show()
    {   
        if (Auth::guest()){
            return redirect('login');
        }else{
            $this->middleware('auth');
            $perPage = 15;  
            $order_history = Order_history::with('products_details')->orderBy('created_at','DESC')->paginate($perPage);
            // vv($order_history->products_details->one_hotel());
            return view('order_history_show' , compact('order_history'));
        }
    }


}
