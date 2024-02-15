<div>
    @auth
        @if (Auth::user()->likesFox($fox))
            <form action="{{ route('foxx.unlike', $fox->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $fox->likes()->count() }} </button>
            </form>
        @else
            <form action="{{ route('foxx.like', $fox->id) }}" method="POST">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $fox->likes()->count() }} </button>
            </form>
        @endif
    @endauth
    @guest
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $fox->likes()->count() }} </a>
    @endguest
</div>
