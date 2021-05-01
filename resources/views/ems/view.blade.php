@extends('layouts.app')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100-create p-t-90 p-b-30">
                <h1>
                    {{ $event->title }}
                </h1>
                {{ $event->description }} <br>
                {{ $event->category->name }} <br>
                {{ $event->starts_at }} <br>
                {{ $event->ends_at }} <br>
                {{ $event->price }} <br>
                {{ $event->room_id }} <br>
                {{ $event->user->name }}
                <a href='{{ route('events.edit', $event->id) }}' class="login100-form-btn">Edit</a>
                <a href='{{ route('events.destroy', $event->id) }}' class="login100-form-btn">Delete</a>
            </div>
        </div>
    </div>
@endsection
