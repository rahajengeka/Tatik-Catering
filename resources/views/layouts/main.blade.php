<!DOCTYPE html>
<html lang="id">

<!-- Google Font: Playfair Display -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Tatik Catering')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <!-- Navbar -->
<nav class="navbar navbar-expand-lg py-4" style="background-color: #0d233a; border-bottom: 3px solid #C8A25D;">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="/"
      style="color: #C8A25D; font-weight: 700; font-size: 2rem; letter-spacing: 1px; font-family: 'Playfair Display', serif;">
      Tatik Catering
    </a>

    <!-- Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="filter: invert(1); width: 2rem; height: 2rem;"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav"
        style="gap: 1.5rem; font-size: 1.2rem; font-weight: 600; font-family: 'Playfair Display', serif;">

        <!-- HOME -->
        <li class="nav-item">
          <a class="nav-link" href="/"
            style="color: #C8A25D; transition: 0.3s;"
            onmouseover="this.style.color='#ffffff'"
            onmouseout="this.style.color='#C8A25D'">
            Home
          </a>
        </li>

        <li class="nav-item">
    <a class="nav-link" href="/tentang"
       style="color: #C8A25D; transition: 0.3s;"
       onmouseover="this.style.color='#ffffff'"
       onmouseout="this.style.color='#C8A25D'">
       Tentang Kami
    </a>
</li>


        <li class="nav-item">
          <a class="nav-link" href="/menu"
            style="color: #C8A25D; transition: 0.3s;"
            onmouseover="this.style.color='#ffffff'"
            onmouseout="this.style.color='#C8A25D'">
            Menu
          </a>
        </li>

        

        <li class="nav-item">
          <a class="nav-link" href="/faq"
            style="color: #C8A25D; transition: 0.3s;"
            onmouseover="this.style.color='#ffffff'"
            onmouseout="this.style.color='#C8A25D'">
            FAQ
          </a>
        </li>

        <li class="nav-item">
  <a class="nav-link" href="{{ route('contact') }}"

            style="color: #C8A25D; transition: 0.3s;"
            onmouseover="this.style.color='#ffffff'"
            onmouseout="this.style.color='#C8A25D'">
            Contact
          </a>
        </li>

      </ul>
    </div>

  </div>
</nav>


  @yield('content')
@include('partials.footer')
</body>

</html>
