<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Fitness & Wellness Dashboard
  </title>
  <!-- Favicon -->
  <link href="dashboard/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="dashboard/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="dashboard/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="dashboard/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
    @include('layouts.sidebar')
    @include('layouts.navbar')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-5">
      <div class="container-fluid">
        <div class="header-body">
            @yield('content')
            
        </div>
      </div>
    </div>
  </div>

  <script>
        const token = localStorage.getItem('token');

        if(!token){
            window.location.href = '/';
        }
           
    </script>

  <!--   Core   -->
  <script src="dashboard/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="dashboard/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="dashboard/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="dashboard/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="dashboard/assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>
</html>