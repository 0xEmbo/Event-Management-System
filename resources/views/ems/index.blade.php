@extends('layouts.app')

@section('content')
    <div class="header-content">
        <div class="header-content-inner">
            @if(isset($category))
                {{ $category->name }}
            @else
                <h1>All education-related events<br>in one single plateform</h1><br><br><br><br>
            @endif
        </div>
    </div>
@endsection
