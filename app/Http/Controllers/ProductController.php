<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Products;
use App\Hotel;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');
    }

    public function index(Request $request)
    {
        $perPage = 15;    
        $device = Products::with('one_hotel')->orderBy('id','DESC')->paginate($perPage);
        // vv($device);
        return view('Product.index', compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $hotel = Hotel::pluck('name','id');
        // vv($hotel);
        return view('Product.create', compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $image_name = "";
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'select_hotel'  => 'required',
        ]);

        // if(Input::hasFile('file')){
        //     echo 'Uploaded';
        //     $file = Input::file('file');
        //     $file->move('uploads', $file->getClientOriginalName());
        //     echo '';
        //     $image_name = $file->getClientOriginalName();
        // }

        Products::create([
            // 'user_id'       => \Auth::user()->id,
            'hotel_id'      => $request->select_hotel,
            'status'        => 1,
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'image'         => $image_name,
        ]);
       
        return redirect('network')->with('status', 'Product Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = Products::with('one_hotel')->findOrFail($id);
        return view('Product.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $hotel = Hotel::pluck('name','id');
        $user = Products::with('one_hotel')->findOrFail($id);
        return view('Product.edit', compact('user' , 'hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {   
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'select_hotel'  => 'required',
        ]);
        $requestData = $request->all();
        unset($requestData['select_hotel']);
        $requestData['hotel_id'] = $request->select_hotel;

        $user = Products::findOrFail($id);
        $user->update($requestData);

        return redirect('network')->with('status', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('network')->with('status', 'Product deleted!');
    }
}
