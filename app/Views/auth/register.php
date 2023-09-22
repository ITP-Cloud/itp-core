<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITP Cloud | Register</title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/favicon.png">
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
              <img src="<?= base_url() ?>/assets/images/Sign up-pana.png" style="width: 90%;" alt="">
            </div>
          </div>

          <div class="col-md-6">

            <div class="m-4 w-75 mx-auto">
              <a href=" <?= base_url() ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="<?= base_url() ?>/assets/images/logos/logo.png" width="120" alt="">
                <h2 class="mt-3">ITP Cloud</h2>
              </a>
              <!-- <p class="text-center">Buid Your Imagination</p> -->
              <h3 class="text-center"><span class="text-primary">Register</span> an Account</h3>

              <?= form_open('register', 'class="mt-4 needs-validation" novalidate') ?>

              <div class="mb-3">
                <label for="">Full Names</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="First Name" aria-label="First Name">
                  <input type="text" class="form-control" placeholder="Last Name" aria-label="Last Name">
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>

              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>


              <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Create Account</button>
              <div class="d-flex align-items-center justify-content-center">
                <p class="text-center">Already have an account? <a href="<?= base_url('login') ?>">Login</a></p>
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