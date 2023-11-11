<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Await Verification | ITP Cloud</title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/favicon.ico">
  <link rel="manifest" href="<?= base_url() ?>/manifest.json">
  <meta name="msapplication-TileImage" content="<?= base_url() ?>/mstile-150x150.png">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.min.css" />
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
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">

        <div class="row justify-content-between w-100">

          <div class="col-md-6 border-end d-none d-md-block">
            <div class="mt-4">
              <img src="<?= base_url() ?>/fassets/img/kyc_await.png" style="width: 90%;" alt="">
            </div>
          </div>

          <div class="col-md-6">

            <div class="m-4 w-75 mx-auto align-items-center text-center">
              <a href=" <?= base_url() ?>" class="text-nowrap logo-img text-center d-block pt-5 w-100">
                <img src="<?= base_url() ?>/assets/images/logos/dark-logo.png" width="180" alt="" />
              </a>
              <!-- <p class="text-center">Buid Your Imagination</p> -->
              <h3 class="py-5 ">Awaiting <span class="text-primary">Verification</span></h3>

              <p class="lead">We've received your details and are currently reviewing them. You'll be notified by email when we are done 🙂</p>

              <a class="btn btn-primary mt-4" href="<?= base_url('logout') ?>">Logout for now</a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>