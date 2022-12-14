<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Penny Juice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('admin/assets/images/icon/penny.jpg') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}">
    <!--user css-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('user/assets/css/generalstyles.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/products.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/cart.css') }}" />

    {{-- <script src="{{ asset('user/assets/js/script.js') }}" defer></script> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"> --}}


    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>

    <!-- modernizr css -->
    <script src="{{ asset('admin/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <div id="app"></div>
    <!-- user js -->


    <!-- vue js -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- jquery latest version -->
    <script src="{{ asset('admin/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('admin/assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('admin/assets/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('admin/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
</body>

</html>
