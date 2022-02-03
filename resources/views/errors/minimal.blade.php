<!DOCTYPE html>
<html lang="en">{{-- resolve with multilanguage --}}

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Indinizer CRM Documentation">
  <meta name="author" content="Yamii Business IT">

  <title>{{ config('app.name', 'RefBook') }} | Error</title>

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Page Content -->
    <div class="container">
      <header class="my-4 text-center">
        <h1 class="display-1 font-weight-bold text-muted">@yield('code')</h1>
        <p class="lead">@yield('message')!</p>
      </header>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>

  </body>

</html>
