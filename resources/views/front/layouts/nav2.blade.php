
<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                @if (app()->getLocale() == 'ar')
                <img src="{{  asset('front\imgs\logo.png')}}" class="d-inline-block align-top" alt="">
                @else
                <img src="  {{  asset('front\imgs\logo-ltr.png')}}">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="{{ Route::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('site.home') }}</a>
                    </li>
                    <li class="{{ Route::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">{{ __('site.aboutus') }}</a>
                    </li>
                    <li class="{{ Route::is('articles') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('articles') }}">{{ __('site.articles') }}</a>
                    </li>
                    <li class="{{ Route::is('donation_requests') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('donation_requests') }}"> {{ __('site.donationrequests') }}</a>
                    </li>
                    <li class="{{ Route::is('who are us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('who are us') }}">{{ __('site.whoareus') }} </a>
                    </li>
                    <li class="{{ Route::is('contact us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact us') }}"> {{ __('site.contactus') }}</a>
                    </li>
                </ul>
                <a href="#" class="donate">
                    @if (app()->getLocale() == 'ar')
                    <img src="  {{  asset('front\imgs\blood-donation.png')}}">
                    @else
                    <img src="  {{  asset('front\imgs\blood-donation.png')}}">
                    @endif
                    <p>{{ __('site.donationrequests') }}</p>
                </a>
            </div>
        </div>
    </nav>
</div>
