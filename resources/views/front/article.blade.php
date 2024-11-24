<!doctype html>
<html lang="{{  app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    @include('front.layouts.head')
<body class="article-details">
    <!--upper-bar-->
    @include('front.layouts.upper-bar')


    <!--nav-->
    @include('front.layouts.nav2')


    <!--inside-article-->
    @include('front.layouts.form-article')
    <!--footer-->
    @include('front.layouts.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('front.layouts.scripts')
</body>
</html>
