<!doctype html>
<html lang="en" dir="rtl">
    @include('front.layouts.head')
    <body>
        <!--upper-bar-->
        @include('front.layouts.upper-bar')


        <!--nav-->
        @include('front.layouts.nav2')
        {{-- form --}}

        @include('front.layouts.formregister')



        <!--footer-->
        @include('front.layouts.footer')

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        @include('front.layouts.scripts')
    </body>
</html>
