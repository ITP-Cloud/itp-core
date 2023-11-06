<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | ITP Cloud</title>
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
              <img src="<?= base_url() ?>/assets/images/Tablet login-pana (1).png" style="width: 90%;" alt="">
            </div>
          </div>

          <div class="col-md-6">

            <div class="mt-7 w-75 mx-auto pt-4">
              <a href=" <?= base_url() ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="<?= base_url() ?>/assets/images/logos/dark-logo.svg" width="180" alt="" />
              </a>
              <!-- <p class="text-center">Buid Your Imagination</p> -->
              <h3 class="text-center">Log In</h3>

              <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
              <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                  <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                      <?= $error ?>
                      <br>
                    <?php endforeach ?>
                  <?php else : ?>
                    <?= session('errors') ?>
                  <?php endif ?>
                </div>
              <?php endif ?>

              <?= form_open('login') ?>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                  <input class="form-check-input primary" type="checkbox" name="remember" value="" id="flexCheckChecked" checked>
                  <label class="form-check-label text-dark" for="flexCheckChecked">
                    Remeber this Device
                  </label>
                </div>
                <span class="d-block text-end">Forgot your password? <a href="<?= base_url('login/magic-link') ?>">Use a Login Link</a></span>
              </div>
              <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Log In</button>
              <div class="d-flex align-items-center justify-content-center">
                <p class="text-center">Need an account? <a href="<?= base_url('register') ?>">Register</a></p>
              </div>
              <?= form_close() ?>
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