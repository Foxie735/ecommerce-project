<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2f4156; margin-bottom: 1rem;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}" style="font-size:25px; font-weight:500;">Fuushop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item {{ $active ==='home' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.index') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown {{ $active ==='kategori' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.category') }}">Category</a>
                </li>
                @if($active === 'cart' || (Auth::check() && auth()->user()->role === 'member'))
                    <li class="nav-item {{ $active === 'cart' ? 'active' : ' ' }}">
                        <a href="/cart" class="nav-link">Cart</a>
                    </li>
                @endif
                @if($active === 'transactionhistory' || (Auth::check() && auth()->user()->role === 'member'))
                    <li class="nav-item {{ $active === 'transactionhistory' ? 'active' : ' ' }}">
                        <a href="/usertransaction" class="nav-link">Transaction</a>
                    </li>
                @endif
                <li class="nav-item {{ $active ==='contact' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.contact') }}">Contact</a>
                </li>
                <li class="nav-item {{ $active ==='about' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.about') }}">About Us</a>
                </li>
                @if(Auth::check() && auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a href="/admin" class="nav-link">Dashboard</a>
                    </li>
                @endif
                @if(Auth::check())
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>