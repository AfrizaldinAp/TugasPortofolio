<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="cp/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="cp/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <!-- My CSS -->
    <style>
      .jumbotron {
        padding-top: 6rem;
        background-color: #e2edff;
      }
      #projects {
        background-color: #e2edff;
      }
      .card-body {
        background-color: #e2edff;
      }
      section {
        padding-top: 5rem;
      }
    </style>
  </head>
  <body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Afrizaldin Ananda Phraqazza</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/project">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('isi')

    <footer class="bg-primary text-center text-white pb-5">
      Created With <i class="bi bi-suit-heart-fill text-danger"></i> By <a href="https://www.instagram.com/ardi_1606_/" target="blank_" class="text-white fw-bold">Afrizaldin Ananda Phraqazza</a>
    </footer>