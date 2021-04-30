@extends('layouts.app')

@section('content')
    <div class="header-content">
        <div class="header-content-inner">
            @if(!isset($category))
                <h1>All education-related events<br>in one single plateform</h1>
            @else
                <h1 class="h1-custom">{{ $category->name }}</h1>
                <div class="row">
                    @foreach ($category->events as $event)
                        <div class="column">
                            <div class="event-div">
                                <a href="{{ route('events.show', $event->id) }}">{{$event->title}}</a>
                            </div>
                        </div>
                    @endforeach
                  </div>

            @endif
        </div>
    </div>
@endsection
