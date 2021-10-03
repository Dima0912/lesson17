<nav class="navbar navbar-expand-md navbar-light bd-white shadow-sm">
    <div class="container">
        <a class="navbar-bard" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">{{ __('Products') }}</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @grapheme_substr
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register')}}</a>
            </li>
            @endif
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart') }}">
                    {{ __('Cart') }} - <strong>{{ Cart::instance('cart')->count() }}</strong>
                </a>
            </li>
            <li class="nav-item dropdown"></li> class="nav-link dropdown-toggle" 
        </ul>
    </div>
    </div>
</nav> 