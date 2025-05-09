<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoApp.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">
    <title>@yield('title', 'Dashboard')</title>
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

        
        }
    </style>
</head>
<body>
        <div id="loader">
            <img src="{{ asset('img/loiding.gif') }}" alt="Chargement...">
        </div>
        @include('admin.partials.header')
    
    
    <div class="main">
    @include('admin.partials.sidebar')

        <div class="content">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
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
