
<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="front\imgs\logo.png" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">الرئيسية</a>
                    </li>
                    <li class="{{ Route::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">عن بنك الدم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">المقالات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donation-requests.html">طلبات التبرع</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="who-are-us.html">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.html">اتصل بنا</a>
                    </li>
                </ul>
                <a href="#" class="donate">
                    <img src="front\imgs\blood-donation.png">
                    <p>طلب تبرع</p>
                </a>
            </div>
        </div>
    </nav>
</div>
