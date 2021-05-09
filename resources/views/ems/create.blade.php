@extends('layouts.app')

@section('content')
<div class="container-login100">
    <div class="wrap-login100-create p-t-90 p-b-30">
        <form class="login100-form validate-form" method="post" action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" enctype="multipart/form-data">
            @csrf
            @if (isset($event))
                @method('put')
                <input type='hidden' name='id' value='{{ $event->id }}'>
            @endif
            <span class="login100-form-title p-b-40">
                {{ isset($event) ? _('Edit Event') : __('Create Event') }}
            </span>
            <div class="wrap-input100 m-b-16">
                <label for="category">Category:</label>
                <select name="category_id" id="category" class="input100" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value='{{ $category->id }}'
                            @if(isset($event))
                                @if ($category->id == $event->category_id)
                                    selected
                                @endif
                            @endif
                            >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="title">Title:</label>
                <input class="input100" id="title" type="text" name="title" value='{{ isset($event) ? $event->title : "" }}' required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="5" rows="20", class='form-control input100' required>{{ isset($event) ? $event->description : "" }}</textarea>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="price">Price:</label>
                <input class="input100" id="price" type="number" min="0" step="any" name="price" value='{{ isset($event) ? $event->price : 0 }}' required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="room">Room:</label>
                <select name="room_id" id="room" class="input100" required>
                    <option value="" disabled selected>Select a room</option>
                    @foreach ($rooms as $room)
                        <option value='{{ $room->id }}'
                            @if(isset($event))
                                @if ($room->id == $event->room_id)
                                    selected
                                @endif
                            @endif
                            >
                            Room {{ $room->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="starts_at">Start date:</label>
                <input class="input100" id="starts_at" type="datetime-local" name="starts_at" value="{{ isset($event) ? date('Y-m-d\TH:i', strtotime($event->starts_at)) : '' }}" required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="ends_at">End date:</label>
                <input class="input100" id="ends_at" type="datetime-local" name="ends_at" value="{{ isset($event) ? date('Y-m-d\TH:i', strtotime($event->ends_at)) : '' }}" required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="image">Image:</label>
                <input class="input100" id="image" type="file" name="image">
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    {{ isset($event) ? 'Edit' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
