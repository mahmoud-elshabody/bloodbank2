<!doctype html>
<html lang="{{  app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    @include('front.layouts.head')
    <body>
        <!--upper-bar-->
        @include('front.layouts.upper-bar2')


        <!--nav-->
        @include('front.layouts.nav2')
        {{-- form --}}

        @include('front.layouts.form-register')



        <!--footer-->
        @include('front.layouts.footer')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        @include('front.layouts.scripts')
    </body>
</html>
