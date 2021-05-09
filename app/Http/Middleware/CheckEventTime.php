<?php

namespace App\Http\Middleware;

use App\Event;
use Carbon\Carbon;
use Closure;

class CheckEventTime
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
        $timeExists = Event::where('room_id', $request->room_id)
        ->where(function($query) use($request){
            $query->whereBetween('starts_at', [$request->starts_at, $request->ends_at])
            ->orWhereBetween('ends_at', [$request->starts_at, $request->ends_at])
            ->orWhere(function($query) use($request){
                $query->where('starts_at', '<=', $request->starts_at)
                ->where('ends_at', '>=', $request->ends_at);
            });
        })->first();

        if($request->starts_at <= Carbon::now() || $request->ends_at <= Carbon::now() || $request->ends_at <= $request->starts_at){
            session()->flash('message', 'Please choose a valid date!');
            session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        elseif($timeExists){
            session()->flash('message', 'Sorry, There\'s an event in this period!');
            session()->flash('alert-class', 'alert-danger');
            return redirect()->back();
        }


        return $next($request);
    }
}
