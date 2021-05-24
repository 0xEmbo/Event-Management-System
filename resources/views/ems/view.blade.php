@extends('layouts.app')
@section('content')

<section>
<div class="container">
    <div class="col-md-12">
        <div class="media-container-row">
            <div class="mbr-figure" style="width: 50%;">
                <img id="img-view" src="{{ asset($event->image_path) }}">
            </div>
            <div class=" align-left">
                <h2 class="mbr-title pt-2 mbr-fonts-style display-1">
                    {{ $event->title }}</h2>
                <div class="mbr-section-text">
                    <p class="mbr-text mb-5 pt-3 mbr-light mbr-fonts-style display-5">
                        {{ $event->description }}
                    </p>
                </div>
                <div class="block-content">
                    <div class="card p-3 pr-3">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="card-title mbr-fonts-style display-7"><strong>Event Time</strong></h4>
                            </div>
                        </div>

                        <div class="card-box">
                            <p class="block-text mbr-fonts-style display-7">
                                {{ $event->starts_at }} - {{ $event->ends_at }}
                            </p>
                        </div>
                    </div>
                    <div class="card p-3 pr-3">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="card-title mbr-fonts-style display-7"><strong>Organizer: {{ $event->user->name }}</strong></h4>
                                <br>
                                <h4 class="card-title mbr-fonts-style display-7"><strong>Event Price: {{ $event->price }}$</strong></h4>
                            </div>
                        </div>
                    </div>
                        @auth
                            @if (auth()->user()->id == $event->user_id || auth()->user()->is_admin == 1)
                                <form action='{{ route('event.destroy', $event->id) }}' method='post'>
                                    @csrf
                                    @method('delete')
                                    <button type='submit' class="btn btn-danger delete-btn">Delete</button>
                                </form>
                            @else
                                <div class="container-login100-form-btn" id="rgst-btn-div">
                                    <a href="{{ route('event.register', $event->id) }}" class="btn login100-form-btn">Register</a>
                                </div>
                                <form action="{{ route('room.rate', $event->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="email" name="applicant_email" placeholder="Email Address" required>
                                    <input id="rate-input" name="rate" type="number" min="0" max="5" required>
                                    <button class="btn btn-primary view-page-btn" type="submit">Rate Room</button>
                                </form>
                                <form action="{{ route('applicant.delete', $event->id) }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <input type="email" name="applicant_email" placeholder="Email Address" required>
                                    <button class="btn btn-danger view-page-btn" type="submit">Leave Event</button>
                                </form>
                            @endif
                        @else
                            <div class="container-login100-form-btn" id="rgst-btn-div">
                                <a href="{{ route('event.register', $event->id) }}" class="btn login100-form-btn">Register</a>
                            </div>
                            <form action="{{ route('room.rate', $event->id) }}" method='post'>
                                @csrf
                                @method('put')
                                <input type="email" name="applicant_email" placeholder="Email Address" required>
                                <input id="rate-input" name="rate" type="number" min="0" max="5" required>
                                <button class="btn btn-primary view-page-btn" type="submit">Rate Room</button>
                            </form>
                            <form action="{{ route('applicant.delete', $event->id) }}" method='post'>
                                @csrf
                                @method('delete')
                                <input type="email" name="applicant_email" placeholder="Email Address" required>
                                <button class="btn btn-danger" type="submit">Leave Event</button>
                            </form>
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
