<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="/assets/new/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/assets/new/assets/css/portal.css">

</head>

<body class="app app-404-page">

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
                <div class="app-card p-5 text-center shadow-sm">
                    @yield('content')
                </div>
            </div>
            <!--//col-->
        </div>
        <!--//row-->
    </div>
    <!--//container-->

    <!-- Javascript -->
    <script src="/assets/new/assets/plugins/popper.min.js"></script>
    <script src="/assets/new/assets/plugins/bootstrap/js/bootstrap.min.js"></script>





    <!-- Charts JS -->
    <script src="/assets/new/assets/plugins/chart.js/chart.min.js"></script>
    <script src="/assets/new/assets/js/charts-custom.js"></script>

    <!-- Page Specific JS -->
    <script src="/assets/new/assets/js/app.js"></script>

</body>

</html>