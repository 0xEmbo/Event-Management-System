<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use Illuminate\Http\Request;

use App\User;
use App\Event;
use App\Category;
use App\Room;
use App\Applicant;

use App\Http\Requests\EventRegisterationRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateEventRequest;
use App\Notifications\VerifyEventRegisteration;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('CheckTime')->only(['store', 'update']);
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
        return view('ems.create')->with('categories', Category::all())->with('rooms', Room::all());
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
        $event->image_path = '/storage/'.$request->image->store('event_imgs');
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
        $response = Gate::inspect('del-edit-event', $event);
        if($response->allowed()) {
            return view('ems.create')->with('event', $event)->with('categories', Category::all())->with('rooms', Room::all());
        }
        else {
            echo $response->message();
        }
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
        $response = Gate::inspect('del-edit-event', $event);
        if($response->allowed()) {
            $event->category_id = $request->category_id;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->price = $request->price;
            $event->room_id = $request->room_id;
            $event->starts_at = $request->starts_at;
            $event->ends_at = $request->ends_at;
            Storage::delete($event->image_path);
            if($request->image)
                $event->image_path = '/storage/'.$request->image->store('event_imgs');
            $event->save();
            session()->flash('message', 'Event updated successfully!');
            session()->flash('alert-class', 'alert-success');
            return redirect(route('home'));
        }
        else {
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $response = Gate::inspect('del-edit-event', $event);
        if($response->allowed()) {
            Storage::delete($event->image_path);
            $event->delete();
            session()->flash('message', 'Event deleted successfully!');
            session()->flash('alert-class', 'alert-success');
            return redirect(route('home'));
        }
        else {
            echo $response->message();
        }
    }

    public function show_category(Category $category)
    {
        $search = request()->query('search');
        if($search){
            $events = $category->events()->where('title', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%')->simplePaginate(3);
        }
        else{
            $events = $category->events()->simplePaginate(3);
        }
        return view('ems.index')->with('category', $category)->with('events', $events);

    }

    public function register(Event $event)
    {
        return view('ems.register')->with('event', $event);
    }

    public function join(EventRegisterationRequest $request, Event $event)
    {

        $applicant = new Applicant();
        $applicant->event_id = $event->id;
        $applicant->fname = $request->applicant_fname;
        $applicant->lname = $request->applicant_lname;
        $applicant->email = $request->applicant_email;
        $applicant->phone = $request->applicant_phone;
        $applicant->address = $request->applicant_address;
        $applicant->save();

        // Applicant::where('email', '=', $request->applicant_email)->first()
        // ->notify(new VerifyEventRegisteration($event));
        Notification::route('mail', $request->applicant_email)->notify(new VerifyEventRegisteration($event));

        session()->flash('message', 'You have successfully registered to the event, Check your mail!');
        session()->flash('alert-class', 'alert-success');
        return redirect(route('home'));
    }

    public function myevents(User $user)
    {
        return view('ems.myevents')->with('user', $user);
    }
}
