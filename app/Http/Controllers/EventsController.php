<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Request;

use App\Event;
use App\Category;
use App\Http\Requests\UpdateEventRequest;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update']);
        $this->middleware('verifyEditEvent')->only('update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ems.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $event = new Event();
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->room_id = $request->room_id;
        $event->starts_at = $request->starts_at;
        $event->ends_at = $request->ends_at;
        $event->user_id = auth()->user()->id;
        $event->save();
        session()->flash('message', 'Event created successfully!');
        session()->flash('alert-class', 'alert-success');
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('ems.view')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('ems.create')->with('event', $event)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->room_id = $request->room_id;
        $event->starts_at = $request->starts_at;
        $event->ends_at = $request->ends_at;
        $event->save();
        session()->flash('message', 'Event updated successfully!');
        session()->flash('alert-class', 'alert-success');
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
