<body class="contact-us">
    <!--contact-us-->
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('site.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('site.connectwithus') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>{{ __('site.contactus') }}</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                @if (app()->getlocale()== "ar" )
                            <img src="{{ asset('front') }}/imgs/logo.png">
                            @else
                            <img src="{{ asset('front') }}/imgs/logo-ltr.png">
                            @endif
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>{{ __('site.phone') }}:</span> {{  $settings->phone}}</li>
                                    <li><span>{{ __('site.fax') }}:</span> 234234234</li>
                                    <li><span>{{ __('site.email') }}:</span> {{  $settings->email}}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>{{ __('site.connectwithus') }}</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/001-facebook.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/002-twitter.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/003-youtube.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/004-instagram.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/005-whatsapp.svg') }}"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#"><img src="{{ asset('front/imgs/006-google-plus.svg') }}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>{{ __('site.connectwithus') }}</h4>
                        </div>
                        <div class="fields">
                            <form>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('site.name') }}" name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('site.email') }}" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('site.phone') }}" name="phone">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('site.messagetitle') }}" name="title">
                                <textarea placeholder="{{ __('site.textmessage') }}" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                                <button type="submit">{{ __('site.send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
