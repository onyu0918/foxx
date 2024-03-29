@extends('layout.layout')
@section('title', 'UserShow')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <div class="mt-3">
                @include('users.shared.user-card')
            </div>
            <hr>

            @forelse ($foxx as $fox)
                <div class="mt-3">
                    @include('foxx.shared.fox-card')
                </div>
            @empty
                <p class="text-center mt-4">No results Found.</p>
            @endforelse

            <div class="mt-3">
                {{ $foxx->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
