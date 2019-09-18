<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Validator;

class SubscriberController extends Controller
{
    public function __construct(){

        $this->middleware('permission:view-subscriber',['only' => ['index']]);
        $this->middleware('permission:delete-subscriber',['only' => ['destroy']]);
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriber = Subscriber::paginate(10);
        return view('backend.subscriber.index',compact('subscriber'));
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
        $result = Validator::make($request->all(),[
            'email' => 'required|email|unique:subscribers,email',
        ]);

        if($result->fails())
        {
            return response()->json(['error' => $result->errors()->all()]);
        }
        else
        {
            $response = Subscriber::create(['email' => $request->email,'created_at' => now()]);
            if($response)

            {
                return response()->json(['success'=>'Registered']);
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        if($subscriber->delete())
        {
            return back()->with('success','Subscriber has been Deleted Successfully');
        }
    }

}
