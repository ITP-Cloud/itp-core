<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITP Cloud | Official Homepage</title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/favicon.ico">
  <link rel="manifest" href="<?= base_url() ?>/manifest.json">
  <meta name="msapplication-TileImage" content="<?= base_url() ?>/mstile-150x150.png">

  <meta name="theme-color" content="#ffffff">
  <link href="<?= base_url() ?>/fassets/css/theme.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Ubuntu', sans-serif;
    }
  </style>

</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="index.html">
          <img src="<?= base_url() ?>/assets/images/logos/dark-logo.svg" height="31" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link active fs-1" aria-current="page" href="#feature">Home</a></li>
            <li class="nav-item"><a class="nav-link fs-1" aria-current="page" href="#feature">Websties</a></li>
            <li class="nav-item"><a class="nav-link fs-1" aria-current="page" href="#marketing">Docs</a></li>
          </ul>
          <div class="d-flex ms-lg-4">
            <a class="btn btn-secondary-outline" href="<?= base_url('login') ?>">Sign In</a>
            <a class="btn btn-primary ms-3" href="<?= base_url('register') ?>">Sign Up</a>
          </div>
        </div>
      </div>
    </nav>
    <section class="pt-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-md-start text-center py-6">
            <h1 class="mb-4 fs-9 fw-bold">Build Your <span class="text-primary">Imagination</span></h1>
            <p class="mb-6 lead text-secondary">Tools, engineering and innovation, all<br class="d-none d-xl-block" />in one place! The most intuitive way to build<br class="d-none d-xl-block" />your imagination.</p>
            <div class="text-center text-md-start">
              <a class="btn btn-primary me-3 btn-lg" href="<?= base_url('login') ?>" role="button">Get started</a>
              <a class="btn btn-link text-primary fw-medium" href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo">
                <span class="fas fa-play me-2"></span> Watch the video
              </a>
            </div>
          </div>
          <div class="col-md-6 text-end">
            <lottie-player autoplay loop mode="normal" src="<?= base_url() ?>/fassets/img/lottie/Build Your Imagination.json" style="width: 100%">
            </lottie-player>
          </div>
        </div>
      </div>
    </section>



    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="text-center py-0">

      <div class="container">
        <div class="container border-top py-3">
          <div class="row justify-content-between">
            <div class="col-12 col-md-auto mb-1 mb-md-0">
              <p class="mb-0">&copy; <?= date('Y') ?> ITP Cloud Platform </p>
            </div>
            <div class="col-12 col-md-auto">
              <p class="mb-0">
                Designed and Engineered by <a class="text-decoration-none ms-1" href="https://www.linkedin.com/in/aaron-mkandawire-384126212/" target="_blank">Aaron Mkandawire</a></p>
            </div>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <iframe class="rounded" style="width:100%;height:500px;" src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="<?= base_url() ?>/fassets/vendors/@popperjs/popper.min.js"></script>
  <script src="<?= base_url() ?>/fassets/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/fassets/vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="<?= base_url() ?>/fassets/vendors/fontawesome/all.min.js"></script>
  <script src="<?= base_url() ?>/fassets/js/theme.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>
</body>

</html>