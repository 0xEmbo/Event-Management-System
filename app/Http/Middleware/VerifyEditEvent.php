<?php

namespace App\Http\Middleware;

use App\Event;
use Closure;

class VerifyEditEvent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $event_owner_id = Event::find($request->id)->user_id;
        if($event_owner_id != auth()->user()->id){
            session()->flash('message', 'You are not authorized to edit this event!');
            session()->flash('alert-class', 'alert-danger');

            return back();
        }
        return $next($request);
    }
}
