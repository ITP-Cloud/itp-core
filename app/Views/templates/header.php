<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITP Cloud | Official Homepage</title>
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="ITP Cloud | Official Homepage" />
  <meta property="og:url" content="<?= base_url() ?>" />
  <meta property="og:site_name" content="ITP Cloud | Official Homepage" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/favicon.ico">
  <link rel="manifest" href="<?= base_url() ?>/manifest.json">
  <meta name="msapplication-TileImage" content="<?= base_url() ?>/mstile-150x150.png">

  <meta name="theme-color" content="#ffffff">
  <link href="<?= base_url() ?>/fassets/css/theme.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Ubuntu', sans-serif;
    }
  </style>
  <style>
    a {
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    .card:hover {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>/assets/images/logos/dark-logo.png" width="31" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link fs-1 <?= $page == 'home' ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>"><i class="bi bi-house"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link fs-1 <?= $page == 'websites' ? 'active' : '' ?>" aria-current="page" href="<?= base_url('websites') ?>"><i class="bi bi-globe-europe-africa"></i> Websites</a></li>
            <li class="nav-item"><a class="nav-link fs-1 <?= $page == 'docs' ? 'active' : '' ?>" aria-current="page" target="_blank" href="https://github.com/ITP-Cloud/docs"><i class="bi bi-files-alt"></i> Docs</a></li>
          </ul>
          <div class="d-flex ms-lg-4">
            <a class="btn btn-secondary-outline" href="<?= base_url('login') ?>"><i class="bi bi-box-arrow-in-right"></i> Sign In</a>
            <a class="btn btn-primary ms-3" href="<?= base_url('register') ?>"><i class="bi bi-box-arrow-in-up"></i> Sign Up</a>
          </div>
        </div>
      </div>
    </nav>