<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ohaiii</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('dashboard/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('dashboard/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @yield('script')
    <script>
        $('#carousel-example').on('slide.bs.carousel', function (e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 4;
            var totalItems = $('.carousel-item').length;
            
            if (idx >= totalItems-(itemsPerSlide-1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i=0; i<it; i++) {
                    if (e.direction=="left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });
    </script>
    
</body>

</html>