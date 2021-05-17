@extends('layouts.app')

@section('content')
<div class="header-content">
    <div class="row">
        @foreach ($user->events as $event)
            <div class="column">
                <div class="event-div">
                    <table class="table">
                        <thead>
                            <th>Image</th>
                            <th class="table-border">Title</th>
                            <th class="table-border">Organizer</th>
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
</div>
@endsection
