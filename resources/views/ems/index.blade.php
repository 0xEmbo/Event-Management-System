@extends('layouts.app')

@section('content')
    <div class="header-content">
        @if(!isset($category))
            <h1 style="margin: 90% 0px 40% 0px; font-size: 50px">All education-related events<br>in one single plateform</h1>
            @if(isset($finished_events))
                <h1>Previous Events</h1><br>
                @foreach ($finished_events as $finished_event)
                    <div class="column">
                        <div class="event-div">
                            <table class="table">
                                <thead>
                                    <th>Image</th>
                                    <th class="table-border">Title</th>
                                    <th class="table-border">Price</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src='{{ asset($finished_event->image_path) }}' width="180px" height="80px">
                                        </td>
                                        <td class="table-border">
                                            {{$finished_event->title}}
                                        </td>
                                        <td class="table-border">
                                            {{ $finished_event->price }}$
                                        </td>
                                    </tr>
                                    <tr>
                                        <form action="{{ route('room.rate', $finished_event->room_id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="number" name="room_id" value="{{ $finished_event->room_id }}" hidden required>
                                            <td>
                                                <input type="email" name="applicant_email" placeholder="Email Address" required>
                                            </td>
                                            <td>
                                                <input type="number" min="1" max="5" name="rate" placeholder="0" style="color: black; text-align: center" required>
                                            </td>
                                            <td>
                                                <button class='btn search-btn btn-sm' type="submit">Rate Room</button>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            @endif
        @else
            @section('search')
                <form action="{{ route('category', $category->id) }}" method="get">
                    <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="search" id="search-input">
                    <button type="submit" class="btn search-btn btn-sm">Search</button>
                </form>
            @endsection
            <h1 class="h1-custom">{{ $category->name }}</h1>
            <div class="row">
                @forelse ($events as $event)
                    <div class="column">
                        <div class="event-div">
                            <table class="table">
                                <thead>
                                    <th>Image</th>
                                    <th class="table-border">Title</th>
                                    <th class="table-border">Price</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src='{{ asset($event->image_path) }}' width="180px" height="80px">
                                        </td>
                                        <td class="table-border">
                                            {{$event->title}}
                                        </td>
                                        <td class="table-border">
                                            {{ $event->price }}$
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a class="btn search-btn" href="{{ route('event.show', $event->id) }}" style="width: 100%">More Info</a>
                        </div>
                    </div>
                @empty
                    <h1>No events found</h1>
                @endforelse
            </div>
        @endif
    </div>
@endsection
