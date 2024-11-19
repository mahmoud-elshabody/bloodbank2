<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="ar {{ App::getLocale() == 'ar' ? 'active' : '' }}">عربى</a>
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="en {{ App::getLocale() == 'en' ? 'active' : '' }}">EN</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">
                        <a href="{{  $settings->facebook_url}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{  $settings->instagram_url}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{  $settings->twitter_url}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{  $settings->whatsapp}}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-lg-4">
                <div class="accounts">
                    <a href="create-account.html" class="create-new">create new account</a>
                    <a href="signin-account.html" class="signin">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
