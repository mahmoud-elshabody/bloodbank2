<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    @else
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    @endif
    <!-- Bootstrap CSS -->

    <!--google fonts css-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" href="{{  asset('front')}}/imgs/Icon.png">

    <!--owl-carousel css-->
    <link rel="stylesheet" href="{{ asset('front') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('front') }}/css/style.css">
    @if (app()->getLocale() != 'ar')
    <link rel="stylesheet" href="{{ asset('front') }}/css/style-ltr.css">
    @endif
    <!--style css-->


    <title>Blood Bank</title>
</head>
