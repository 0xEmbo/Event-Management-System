@extends('layouts.app')

@section('content')
    <div class="limiter">
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
    </div>
@endsection
