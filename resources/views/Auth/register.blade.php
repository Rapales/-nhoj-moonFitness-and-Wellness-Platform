<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Register - Fitness and Wellness Dashboard
  </title>
  <script>
    const token = localStorage.getItem('token');
    if (token) {
      window.location.href = '/home';
    }
  </script>
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

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.html">
          <img src="dashboard/assets/img/fitandwell.png" style="width: 150px; height: auto;"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbar-collapse-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="dashboard/assets/img/fitandwell.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Use these forms to sign up and start using our services.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign up with credentials</small>
              </div>
              <form id="registerFormElement" class="login-form" action="" method="POST">
            <div id="message" class="alert-message"></div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="role" id="role" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpInline" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="inputPassword5" class="form-label">Password Confirmation</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" aria-describedby="passwordHelpInline" placeholder="Password Confirmation">
                </div>

                <!-- Register Button -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create account</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="dashboard/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="dashboard/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
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
  <script>
    document.addEventListener('DOMContentLoaded', function(){
    var email;

    document.querySelector('#registerFormElement').addEventListener('submit', function(event){
        event.preventDefault();

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var role = document.getElementById('role').value = 'guest';
        var name = document.getElementById('name').value;
        var password_confirmation = document.getElementById('password_confirmation').value;


        const data = {
            role: role,
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        };

        fetch('/api/register', {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
        .then(res => res.json())
        .then(res => {
            console.log(res);
            if(res.status) {
                localStorage.setItem('token', res.access_token);
                window.location.href = '/home';
            } else {
                const messageElement = document.getElementById('message');
                messageElement.innerHTML = res.message;
                messageElement.style.display = 'block'; 
                messageElement.style.textAlign = 'left'; 
            }
        })
        .catch(error => {
            console.error('Error: ', error);
        });
    });
});
</script>
</body>

</html>
