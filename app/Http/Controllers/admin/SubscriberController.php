<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\subscriber;
class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = subscriber::latest()->get();
        return view('admin.subscriber.index',compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required'
        ]);
        $subscriber = new subscriber();
        $subscriber->email = $request->email;
       
        $subscriber->save();
        Toastr::success('subscriber Successfully Saved :)' ,'Success');
        return redirect()->route('admin.subscriber.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriber = subscriber::find($id);
        return view('admin.subscriber.edit',compact('subscribers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $subscriber = subscriber::findOrFail($request->subscriber_id);
        $subscriber->email = $request->email;
      
        $subscriber->save();
        Toastr::success('Email Successfully Updated :)','Success');
        return redirect()->route('admin.subscriber.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $subscriber = subscriber::findOrFail($request->subscriber_id);
        $subscriber->delete();
        Toastr::success('subscriber Successfully Deleted :)','Success');
        return back();
    }
}
