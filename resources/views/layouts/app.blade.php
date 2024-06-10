<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ $pageTitle ?? 'Home' }} | {{ config('app.name') }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        @include('includes.styles')
    </head>

    <body>
        <!-- Spinner Start -->
        @include('includes.spinner')
        <!-- Spinner End -->


        <!-- Navbar start -->
       @include('includes.navbar')
        <!-- Navbar End -->

        <!-- Modal Search Start -->
        @include('includes.search_modal')
        <!-- Modal Search End -->

        @yield('content')

        <!-- Footer Start -->
        @include('includes.footer')
        <!-- Footer End -->

        <!-- Copyright Start -->
        @include('includes.copyright')
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a> 
        
        @include('includes.scripts')
    </body>
</html>