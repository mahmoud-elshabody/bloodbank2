<!--upper-bar-->
<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="language">
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="ar {{ App::getLocale() == 'ar' ? 'active' : '' }}">عربى</a>
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="en {{ App::getLocale() == 'en' ? 'active' : '' }}">EN</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="social">
                    <div class="icons">
                        <a href="{{  $settings->facebook_url}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{  $settings->instagram_url}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{  $settings->twitter_url}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{  $settings->whatsapp}}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="accounts" dir="ltr">
                    <a action="{{ route('login') }}" class="signin">الدخول</a>
                    <a action="{{ route('register') }}" class="create-new">إنشاء حساب جديد</a>
                </div>
            </div>
        </div>
    </div>
</div>
