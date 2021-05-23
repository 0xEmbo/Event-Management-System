@extends('layouts.app')

@section('content')
<div class="container-login100">
    <div class="wrap-login100-create p-t-90 p-b-30">
        <form class="login100-form validate-form" method="post" action="{{ route('event.store') }}" enctype="multipart/form-data">
            @csrf
            <span class="login100-form-title p-b-10">Create Event</span>
            <div class="wrap-input100 m-b-16">
                <label for="category">Category:</label>
                <select name="category_id" id="category" class="input100" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value='{{ $category->id }}'>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="title">Title:</label>
                <input class="input100" id="title" type="text" name="title" required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="5" rows="5", class='input100' required></textarea>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="price">Price:</label>
                <input class="input100" id="price" type="number" min="0" step="any" name="price" value=0 required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="room">Room:</label>
                <select name="room_id" id="room" class="input100" required>
                    <option value="" disabled selected>Select a room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">
                            Room {{ $room->id }} &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Capacity({{ $room->capacity }}) &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Price/Hour({{ $room->price_per_hour }}$)
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="starts_at">Start date:</label>
                <input class="input100" id="starts_at" type="datetime-local" name="starts_at" required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="ends_at">End date:</label>
                <input class="input100" id="ends_at" type="datetime-local" name="ends_at" required>
            </div>
            <div class="wrap-input100 m-b-16">
                <label for="image">Image:</label>
                <input class="input100" id="image" type="file" name="image" required>
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">Create</button>
            </div>
        </form>
    </div>
</div>

@endsection
