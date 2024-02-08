@extends('layout.layout')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.submit-fox')
        <hr>
        @foreach ($foxx as $fox)
        <div class="mt-3">
            @include('shared.fox-card')
        </div>
        @endforeach
        <div class="mt-3">
            {{ $foxx->links() }}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection


