<!doctype html>
<html lang="{{  app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    @include('front.layouts.head')
    <body>
        <!--upper-bar-->
        @include('front.layouts.upper-bar')


        <!--nav-->
        @include('front.layouts.navbar')

        @yield('content')

        <!--footer-->
        @include('front.layouts.footer')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        @include('front.layouts.scripts')
    </body>
</html>
