<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Accueil')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

   
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoApp.ico') }}">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">
   
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    @yield('custom-css')

    <style>
        #loader {
            position: fixed;
            z-index: 9999;
            background-color: black;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loader img {
            width: 30%;
        }

        #app-content {
            display: none;
        }
    </style>
</head>

<body>
<div id="loader">
            <img src="{{ asset('img/loiding.gif') }}" alt="Chargement...">
        </div>
    {{-- Navbar --}}
    @include('client.layouts.partials.navbar')

    {{-- Alert --}}
    @include('client.components.alert')
<!--  -->
    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('client.layouts.partials.footer')



    <!-- Back to Top -->
    <a href="#" class="btn btn--primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

   

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        window.addEventListener('load', function () {
            setTimeout(function () {
                document.getElementById('loader').style.display = 'none';
                document.getElementById('app-content').style.display = 'block';
            }, 2000); // 2 secondes
        });
    </script>

    
</body>

</html>