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
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

use App\Notifications\VerifyEventRegisteration;
use App\Notifications\DeleteEvent;

use App\Notifications\FinishedEvent;
use Carbon\Carbon;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'destroy', 'profile', 'myevents', 'profile_update']);
        $this->middleware('CheckTime')->only(['store']);
    }

    public function index()
    {
        if(Event::onlyTrashed()->get()->count() == 0){
            return view('ems.index');
        }else{
            return view('ems.index')->with('finished_events', Event::onlyTrashed()->get());
        }
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $applicants = $event->applicants;
        $response = Gate::inspect('delete-event', $event);
        if($response->allowed()) {
            Storage::delete($event->image_path);
            $event->forceDelete();
            session()->flash('message', 'Event deleted successfully!');
            session()->flash('alert-class', 'alert-success');
            return redirect(route('home'));
            foreach ($applicants as $applicant){
                Notification::route('mail', $applicant->email)->notify(new DeleteEvent($event));
            }
        }
        else {
            echo $response->message();
            return redirect()->back();
        }
    }

    public function show_category(Category $category)
    {
        $search = request()->query('search');
        if($search){
            $events = $category->events()->where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
        }
        else{
            $events = $category->events;
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
        $applicant->room_id = $event->room_id;
        $applicant->fname = $request->applicant_fname;
        $applicant->lname = $request->applicant_lname;
        $applicant->email = $request->applicant_email;
        $applicant->phone = $request->applicant_phone;
        $applicant->address = $request->applicant_address;
        $applicant->save();
        $event->applicants_number = $event->applicants_number + 1;
        $event->save();
        Notification::route('mail', $request->applicant_email)->notify(new VerifyEventRegisteration($event));

        session()->flash('message', 'You have successfully registered to the event, Check your mail!');
        session()->flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function delete_applicant(Request $request, Event $event)
    {
        $applicant = Applicant::where('email', $request->applicant_email)->where('event_id', $event->id)->first();
        if(!$applicant == null){
            $applicant->delete();
            $event->applicants_number = $event->applicants_number - 1;
            $event->save();
            session()->flash('message', 'You have left the event successfully!');
            session()->flash('alert-class', 'alert-success');
        }else{
            session()->flash('message', 'Please enter a valid email!');
            session()->flash('alert-class', 'alert-danger');
        }
        return redirect()->back();
    }

    public function rate_room(Request $request, Room $room)
    {
        $applicant = Applicant::where('email', $request->applicant_email)->where('room_id', $request->room_id)->first();
        if($applicant){
            if($applicant->has_rated){
                session()->flash('message', 'Sorry, you have already rated before!');
                session()->flash('alert-class', 'alert-danger');
            }else{
                $room->rate = ($room->rate + $request->rate)/2;
                $room->save();
                $applicant->has_rated = 1;
                $applicant->save();
                session()->flash('message', 'Thanks for your rating!');
                session()->flash('alert-class', 'alert-success');
            }
        }else{
            session()->flash('message', 'You haven\'t attented this event!');
            session()->flash('alert-class', 'alert-danger');
        }
        return redirect()->back();

    }

    public function myevents(User $user)
    {
        $response = Gate::inspect('visit-profile', $user);
        if($response->allowed()) {
            return view('ems.myevents')->with('user', $user);
        }
        else {
            echo $response->message();
        }
    }

    public function profile(User $user)
    {
        $response = Gate::inspect('visit-profile', $user);
        if($response->allowed()) {
            return view('ems.profile')->with('user', $user);
        }
        else {
            echo $response->message();
        }
    }

    public function profile_update(Request $request, User $user)
    {
        $response = Gate::inspect('visit-profile', $user);
        if($response->allowed()) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->company = $request->company;
            $user->bio = $request->bio;
            $user->birthday = $request->birthday;
            $user->address = $request->address;
            $user->phone = $request->phone;
            if($request->old_password && $request->password && $request->password_confirmation){
                if(Hash::check($request->old_password, $user->password) && $request->password == $request->password_confirmation){
                    $user->password = Hash::make($request->password);
                }
            }
            $user->save();
            session()->flash('message', 'You have successfully updated your profile!');
            session()->flash('alert-class', 'alert-success');
        }
        else {
            echo $response->message();
        }
        return redirect(route('profile', $user->id));
    }

    public function aboutus()
    {
        return view('ems.aboutus');
    }
}
