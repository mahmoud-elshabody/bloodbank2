        <!--nav-->
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('front') }}/imgs/logo.png" class="d-inline-block align-top" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="{{ Route::is('home') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                            </li>
                            <li class="{{ Route::is('about') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('about') }}">عن بنك الدم</a>
                            </li>
                            <li class="{{ Route::is('articles') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('articles') }}">المقالات</a>
                            </li>
                            <li class="{{ Route::is('donation_requests') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('donation_requests') }}">طلبات التبرع</a>
                            </li>
                            <li class="{{ Route::is('who are us') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('who are us') }}">من نحن</a>
                            </li>
                            <li class="{{ Route::is('contact us') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact us') }}">اتصل بنا</a>
                            </li>
                        </ul>

                        <!--not a member-->
                        <div class="accounts">
                            <a href="create-account.html" class="create">إنشاء حساب جديد</a>
                            <a href="signin-account.html" class="signin">الدخول</a>
                        </div>

                        <!--I'm a member

                        <a href="#" class="donate">
                            <img src="{{ asset('front') }}/imgs/transfusion.svg">
                            <p>طلب تبرع</p>
                        </a>

                        -->

                    </div>
                </div>
            </nav>
        </div>
