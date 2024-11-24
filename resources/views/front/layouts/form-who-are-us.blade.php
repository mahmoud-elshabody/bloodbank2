<body class="who-are-us">
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('site.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('site.whoareus') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="logo">
                    @if (app()->getLocale() == 'ar')
                    <img src="  {{  asset('front\imgs\logo.png')}}">
                    @else
                    <img src="  {{  asset('front\imgs\logo-ltr.png')}}">
                    @endif
                </div>
                <div class="text">
                    <p>
                        {{ __('site.whoareus2') }}
                    </p>
                    <p>
                        {{ __('site.whoareus2') }}
                    </p>
                    <p>
                        {{ __('site.whoareus2') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
