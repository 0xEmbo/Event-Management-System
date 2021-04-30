@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100-create p-t-90 p-b-30">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="login100-form validate-form" method="post" action="{{ isset($event) ? route('events.update') : route('events.store') }}">
                @csrf
                <span class="login100-form-title p-b-40 nav-links">
                    {{ isset($event) ? _('Edit Event') : __('Create Event') }}
                </span>
                <div class="wrap-input100 validate-input m-b-16">
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
                <div class="wrap-input100 validate-input m-b-16">
                    <label for="title">Title:</label>
                    <input class="input100" id="title" type="text" name="title" required>
                </div>
                <div class="wrap-input100 validate-input m-b-16">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="5" rows="20", class='form-control input100' required></textarea>
                </div>
                <div class="wrap-input100 validate-input m-b-16">
                    <label for="price">Price:</label>
                    <input class="input100" id="price" type="number" min="0" step="any" name="price" value=0 required>
                </div>
                <div class="wrap-input100 validate-input m-b-16">
                    <label for="room">Room:</label>
                    <select name="room_id" id="room" class="input100">
                        <option value="" disabled selected>Select a room</option>
                        <option value="1">Room1</option>
                        <option value="2">Room2</option>
                        <option value="3">Room3</option>
                    </select>
                </div>
                <div class="wrap-input100 validate-input m-b-16">
                    <label for="starts_at">Start date:</label>
                    <input class="input100" id="start_date" type="datetime-local" name="starts_at" required>
                </div>
                <div class="wrap-input100 validate-input m-b-16">
                    <label for="ends_at">End date:</label>
                    <input class="input100" id="end_date" type="datetime-local" name="ends_at" required>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn nav-links">
                        {{ isset($event) ? 'Edit' : 'Create' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
