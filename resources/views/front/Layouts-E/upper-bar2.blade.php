<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="en active">EN</a>
                    {{ $properties['native'] }}
                    @endforeach
                    {{-- <a href="index.html" class="ar inactive">عربى</a> --}}
                </div>
            </div>
            {{-- <ul>

                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="">

                        </a>
                    </li>

            </ul> --}}
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-lg-4">
                <div class="info" dir="ltr">
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>+966506954964</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p>name@name.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
