@extends('layouts.app')

@section('content')
    {{-- <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100-create p-t-90 p-b-30">
                <img src="{{ asset($event->image_path) }}" width="50%" height="50%">
                <h1>
                    {{ $event->title }}
                </h1>
                {{ $event->description }} <br>
                {{ $event->category->name }} <br>
                {{ $event->starts_at }} <br>
                {{ $event->ends_at }} <br>
                {{ $event->price }} <br>
                {{ $event->room_id }} <br>
                {{ $event->user->name }} <br>
                {{ $event->applicants->count()}} <br>
                @auth
                    @if ($event->user_id == auth()->user()->id)
                        <a href='{{ route('events.edit', $event->id) }}' class="btn btn-primary edit-del-btn">Edit</a>
                        <form action='{{ route('events.destroy', $event->id) }}' method='post' styl>
                            @csrf
                            @method('delete')
                            <button type='submit' class="btn btn-danger edit-del-btn">Delete</button>
                        </form>
                    @else
                        <a href="{{ route('events.register', $event->id) }}" class="btn btn-success btn-lg">Register</a>
                    @endif
                @else
                    <a href="{{ route('events.register', $event->id) }}" class="btn btn-success btn-lg">Register</a>
                @endauth
            </div>
        </div>
    </div> --}}
<div class="split left">
    <img src="{{ asset($event->image_path) }}" width="100%" height="100%">
</div>

<div class="split right">
    <div class="centered">
        <h1>{{ $event->title }}</h1><br><br>
        <h2>Description:</h2>
        <p>{{ $event->description }}</p>
        <h2>Start Date:</h2>
        <p>{{ $event->starts_at }}</p>
        <h2>End Date:</h2>
        <p>{{ $event->ends_at }}</p>
        <h2>Price: <i>{{ $event->price }}$</i></h2>
        <h2>Event location: <i>Room {{ $event->room_id }}</i></h2>
        <h2>Created By: <i>{{ $event->user->name }}</i></h2>
        @auth
            @if ($event->user_id == auth()->user()->id)
                <a href='{{ route('events.edit', $event->id) }}' class="btn btn-primary edit-del-btn">Edit</a>
                <form action='{{ route('events.destroy', $event->id) }}' method='post' styl>
                    @csrf
                    @method('delete')
                    <button type='submit' class="btn btn-danger edit-del-btn">Delete</button>
                </form>
            @else
                <a href="{{ route('events.register', $event->id) }}" class="btn btn-success btn-lg">Register</a>
            @endif
        @else
            <a href="{{ route('events.register', $event->id) }}" class="btn btn-success btn-lg">Register</a>
        @endauth
    </div>
</div>
@endsection
