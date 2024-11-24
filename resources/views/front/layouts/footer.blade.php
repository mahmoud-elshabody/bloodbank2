        <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            @if (app()->getlocale()== "ar" )
                            <img src="{{ asset('front') }}/imgs/logo.png">
                            @else
                            <img src="{{ asset('front') }}/imgs/logo-ltr.png">
                            @endif
                            <h4>{{ __('site.bloodbank') }}</h4>
                            <p>
                                {{ __('site.footer1') }}
                            </p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" href="index.html" role="tab" aria-controls="home">{{ __('site.home') }}</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile"> {{ __('site.aboutus') }}</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">{{ __('site.articles') }}</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="donation-requests.html" role="tab" aria-controls="settings">{{ __('site.donationrequests') }}</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="who-are-us.html" role="tab" aria-controls="settings">{{ __('site.whoareus') }}</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="contact-us.html" role="tab" aria-controls="settings">{{ __('site.contactus') }}</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>{{ __('site.available') }}</p>
                                <a href="#">
                                    <img src="{{ asset('front') }}/imgs/google1.png">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('front') }}/imgs/ios1.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>
                                {{ __('site.rights') }}
                                <span>{{ __('site.bloodbank') }}</span>
                                 &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
