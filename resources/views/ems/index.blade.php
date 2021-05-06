@extends('layouts.app')

@section('content')
    <div class="header-content">
        @if(!isset($category))
            <h1>All education-related events<br>in one single plateform</h1>
        @else
            <h1 class="h1-custom">{{ $category->name }}</h1>
            <div class="row">
                @foreach ($category->events as $event)
                    <div class="column">
                        <div class="event-div">
                            <table class="table">
                                <thead>
                                    <th>Image</th>
                                    <th class="table-border">Title</th>
                                    <th class="table-border">Created By</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src='{{ asset($event->image_path) }}' width="112px" height="63px">
                                        </td>
                                        <td class="table-border">
                                            <a href="{{ route('events.show', $event->id) }}">{{$event->title}}</a>
                                        </td>
                                        <td class="table-border">
                                            {{ $event->user->name }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
