<!DOCTYPE html>
<html lang="en">{{-- resolve with multilanguage --}}

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Indinizer CRM Documentation">
  <meta name="author" content="Yamii Business IT">

  <title>Indinizer CRM Documentation</title>

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    {{-- <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> --}}

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="my-4 text-center">
        <img src="https://doc.indinizer.com/wp-content/uploads/2019/03/indinizer-logo-l.png" title="indinizer-logo-l" alt="indinizer-logo-l" class="w-75 py-5">
        {{-- error msg --}}
        <h1 class="display-1 font-weight-bold text-muted">@yield('code')</h1>
        <p class="lead">@yield('message')!</p>
        <div class="input-group input-group-lg my-4">
            <input type="text" class="form-control" placeholder="Dokumentation durchsuchen..." aria-label="Dokumentation durchsuchen..." aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
            </div>
        </div>
      </header>

      <!-- /.row -->

    </div>
    <!-- /.container -->

    {{-- <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
      </div>
      <!-- /.container -->
    </footer> --}}

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

  </body>

</html>
