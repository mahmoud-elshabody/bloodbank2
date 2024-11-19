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
                        <li class="{{ Route::is('home2') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home2') }}">home</a>
                        </li>
                        <li class="{{ Route::is('about2') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about2') }}">about us</a>
                        </li>
                        <li class="{{ Route::is('articles2') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('articles2') }}">articles</a>
                        </li>
                        <li class="{{ Route::is('donation_requests2') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('donation_requests2') }}">donation requests</a>
                        </li>
                        <li class="{{ Route::is('who are us2') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('who are us2') }}">who are us</a>
                        </li>
                        <li class="{{ Route::is('contact us2') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact us2') }}">contact us</a>
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
