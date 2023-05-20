<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK Metode WP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="bg-body-secondary">
    <nav class="py-2 mb-4 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <span class="fs-4 fw-medium">SPK WP</span>
              </a>
          <ul class="nav me-auto">
            <li class="nav-item"><a href="{{ route('alternative.index') }}" class="nav-link link-dark px-2">Alternatif</a></li>
            <li class="nav-item"><a href="{{ route('criteria.index') }}" class="nav-link link-dark px-2">Kriteria</a></li>
            <li class="nav-item"><a href="{{ route('calculate.index') }}" class="nav-link link-dark px-2">Penentuan nilai</a></li>
          </ul>
          <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Login</a></li>
          </ul>
        </div>
      </nav>

      @yield('header')

      @yield('content')

      <footer class="fixed-bottom bg-light text-center py-3">
        <div class="container">
          <!-- Default to the left -->
          <span class="text-secondary fw-medium">Copyright &copy; 2023 <a href="https://ilham06.github.io" class="text-decoration-none">Ilham Muhamad</a>.</span>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
