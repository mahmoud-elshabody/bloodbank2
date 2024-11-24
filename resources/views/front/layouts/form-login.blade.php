<body class="signin-account">
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{ __('site.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('site.signin') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form>
                    <div class="logo">
                        @if (app()->getlocale()== "ar" )
                            <img src="{{ asset('front') }}/imgs/logo.png">
                            @else
                            <img src="{{ asset('front') }}/imgs/logo-ltr.png">
                            @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('site.phone') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="{{ __('site.password') }}">
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">{{ __('site.rememberme') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{  asset("front/imgs/complain.png")}}">
                            <a href="#">{{ __('site.forgotpassword') }}</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <a href="#">{{ __('site.signin') }}</a>
                        </div>
                        <div class="col-md-6 left">
                            <a action="{{  route("home")}}">{{ __('site.signup') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
