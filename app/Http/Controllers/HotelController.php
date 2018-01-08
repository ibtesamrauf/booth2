<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// use App\Products;
use App\Hotel;

use App\Application;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        // $this->middleware('auth');
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');
    }

    public function index(Request $request)
    {
        $perPage = 15;    
        $device = Hotel::orderBy('id','DESC')->paginate($perPage);
      
        return view('hotel.index', compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hotel.create');
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
            'name'                  => 'required',
            'description'           => 'required',
        ]);

        if(Input::hasFile('file')){
            echo 'Uploaded';
            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());
            echo '';
            $image_name = $file->getClientOriginalName();
        }

        Hotel::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $image_name,
        ]);
       
        return redirect('hotel')->with('status', 'Hotel Added!');
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
        $user = Hotel::findOrFail($id);
        return view('hotel.show', compact('user'));
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
        $user = Hotel::findOrFail($id);
        return view('hotel.edit', compact('user'));
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
        $image_name = "";
        $this->validate($request, [
            'name'         => 'required',
        ]);
        $requestData = $request->all();
        
        if(Input::hasFile('image')){
            echo 'Uploaded';
            $file = Input::file('image');
            $file->move('uploads', $file->getClientOriginalName());
            echo '';
            $image_name = $file->getClientOriginalName();
            $requestData['image'] = $image_name; 
        }
        // vv($requestData);
        $user = Hotel::findOrFail($id);
        $user->update($requestData);

        return redirect('hotel')->with('status', 'Hotel Updated!');
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
        Hotel::destroy($id);
        return redirect('hotel')->with('status', 'Hotel deleted!');
    }
}
