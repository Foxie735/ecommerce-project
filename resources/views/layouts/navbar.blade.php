<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2f4156; margin-bottom: 1rem;">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-size:25px; font-weight:500;">Fushop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item {{ $active ==='home' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.index') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ $active ==='product' ? 'active' : ' '}}">
                    <a class="nav-link" href="#">All Product</a>
                </li>
                <li class="nav-item dropdown {{ $active ==='kategori' ? 'active' : ' '}}">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Meals</a>
                        <a class="dropdown-item" href="#">Drink</a>
                        <a class="dropdown-item" href="#">Fruit & Vegges</a>
                    </div>
                </li>
                <li class="nav-item {{ $active ==='contact' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.contact') }}">Contact</a>
                </li>
                <li class="nav-item {{ $active ==='about' ? 'active' : ' '}}">
                    <a class="nav-link" href="{{ route('home.about') }}">About Us</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                    <i class="bi bi-search"></i>
                </button>
                <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="Login">
                    <i>Login</i>
                </button>
            </form>
        </div>
    </div>
</nav>