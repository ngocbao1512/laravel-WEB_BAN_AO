<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Male Shop </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="/admin-lte/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="/admin-lte/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="/admin-lte/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    @yield('css')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,600,700" rel="stylesheet">
    <link href="http://proj.test/css/app.css" rel="stylesheet" type="text/css">
    <link href="http://proj.test/css/toastr.min.css" rel="stylesheet" type="text/css">
    <link href="http://proj.test/css/bootstrap-datetimepicker.css" rel="stylesheet" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="{{route('admin.home-page')}}">
                    <h1 class="tm-site-title mb-0">Admin Male Shop </h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link dashboard" href="{{route('admin.home-page')}}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link product" href="{{ route('admin.products.index') }}">
                            <i class="fas fa-cubes"></i> Products
                            </a>
                        </li>   
                        
                        <li class="nav-item">
                            <a class="nav-link blog" href="{{ route('admin.blogs.index') }}">
                            <i class="fab fa-blogger-b"></i> Blogs
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-user"></i> {{ auth()->user()->name; }}
                        </a>
                    </li>
                    <li style=" line-height : 90px;">
                        <form method="POST" action="{{route('logout')}}">
                        @csrf 
                        <a style="color: white; font-size: 28px;" href="{{route('logout')}}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        </form>
                    </li>
                    </ul>
                </div>
            </div>

        </nav>
            {{ $slot }}
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="/admin-lte/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="/admin-lte/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="/admin-lte/js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="/admin-lte/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="/admin-lte/js/tooplate-scripts.js"></script>
    @yield('active')
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function() {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function() {
                updateLineChart();
                updateBarChart();
            });
        })  
    </script>
     @yield('script') 

</body>

</html>