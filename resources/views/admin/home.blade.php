<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->
@include('admin.layouts.head')


<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--nav-->
        @include('admin.layouts.navbar')
        <!--slider-->
        @include('admin.layouts.slider')
        <!--main-->
        <main class="app-main"> <!--begin::App Content Header-->
        @yield('content')
        </main>

        <!--scripts-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @include('admin.layouts.scripts')

</body><!--end::Body-->


<!--begin::Footer-->
<!--footer-->
@include('admin.layouts.footer')

<!--end::Footer-->
</html>
