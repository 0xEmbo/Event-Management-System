@extends('layouts.app')

@section('content')
    <div class="header-content">
        <div class="header-content-inner">
            @if(!isset($category))
                <h1>All education-related events<br>in one single plateform</h1>
            @else
                <div class="row">
                    <div class="column">
                      <img src="{{ url('/images/header.jpg') }}" alt="Snow" style="width:100%">
                    </div>
                    <div class="column">
                      <img src="{{ url('/images/header.jpg') }}" alt="Forest" style="width:100%">
                    </div>
                    <div class="column">
                      <img src="{{ url('/images/header.jpg') }}" alt="Mountains" style="width:100%">
                    </div>
                  </div>

            @endif
        </div>
    </div>
@endsection
