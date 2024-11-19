    <!--nav-->
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('front/imgs/logo-ltr.png')}}" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="{{ Route::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">home</a>
                        </li>
                        <li class="{{ Route::is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">about us</a>
                        </li>
                        <li class="{{ Route::is('articles') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('articles') }}">articles</a>
                        </li>
                        <li class="{{ Route::is('donation_requests') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('donation_requests') }}">donation requests</a>
                        </li>
                        <li class="{{ Route::is('who are us') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('who are us') }}">who are us</a>
                        </li>
                        <li class="{{ Route::is('contact us') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact us') }}">contact us</a>
                        </li>
                    </ul>
                    <a href="#" class="donate">
                        <img src="{{asset('front/imgs/transfusion.svg')}}">
                        <p>Ask donation</p>
                    </a>
                </div>
            </div>
        </nav>
    </div>
