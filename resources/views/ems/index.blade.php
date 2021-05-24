@extends('layouts.app')

@section('content')
    <div class="header-content">
        @if(!isset($category))
            <h1>All education-related events<br>in one single plateform</h1>
        @else
            @section('search')
                <form action="{{ route('category', $category->id) }}" method="get">
                    <input type="text" name="search" value="{{ request()->query('search') }}" id="search-input">
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
                                            <img src='{{ asset($event->image_path) }}' width="112px" height="63px">
                                        </td>
                                        <td class="table-border">
                                            <a href="{{ route('event.show', $event->id) }}">{{$event->title}}</a>
                                        </td>
                                        <td class="table-border">
                                            {{ $event->price }}$
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @empty
                    <h1>No events found</h1>
                @endforelse
            </div>
        @endif
    </div>
@endsection
