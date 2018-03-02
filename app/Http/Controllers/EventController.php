<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Products;
use App\Event;
use App\Hotel;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $perPage = 15;    
        $device = Event::with('one_hotel')->orderBy('id','DESC')->paginate($perPage);
        // vv($device);
        return view('event.index', compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $hotel = Hotel::pluck('name','id');
        // $user = Event::findOrFail($id);
        // vv($hotel);
        return view('event.create', compact('hotel'));
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
        $this->validate($request, [
            'time'              => 'required',
            'hotel_id'          => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',
        ]);

        Event::create([
            'time'              => $request->time,
            'hotel_id'          => $request->hotel_id,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
        ]);
       
        return redirect('event')->with('status', 'Event Added!');
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
        $user = Event::with('one_hotel')->findOrFail($id);
        return view('event.show', compact('user'));
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
        $user = Event::findOrFail($id);
        return view('event.edit', compact('user' , 'hotel'));
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
            'time'          => 'required',
            'hotel_id'            => 'required',
            'start_date'             => 'required',
            'end_date'       => 'required',
        ]);

        $requestData = $request->all();

        $user = Event::findOrFail($id);
        $user->update($requestData);

        return redirect('event')->with('status', 'Event Updated!');
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
        Event::destroy($id);
        return redirect('event')->with('status', 'Event deleted!');
    }

    public function reset_all_booth($hotel_id)
    {
        // vv($hotel_id);
        Products::where('hotel_id' , $hotel_id)->update(['status' => 1]);
        return redirect('event')->with('status', 'All Booth Activated From this hotel!');
    }
}
