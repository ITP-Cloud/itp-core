<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITP Cloud | Register</title>
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/favicon.png">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                <img src="<?= base_url() ?>/assets/images/logos/dark-logo.svg" width="180" alt="" />
              </a>
              <!-- <p class="text-center">Buid Your Imagination</p> -->
              <h4 class="text-center"><span class="text-primary">Register</span> an Account</h4>

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

              <?= form_open('register', 'class="mt-4 needs-validation" novalidate') ?>

              <div class="mb-3">
                <label for="" class="form-label">Full Names</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?= set_value('firstname') ?>" aria-label="First Name">
                  <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?= set_value('lastname') ?>" aria-label="Last Name">
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control" value="<?= set_value('phone') ?>" aria-describedby="phoneHelp">
              </div>

              <div class="mb-4">
                <label class="form-label">Password</label>

                <div class="input-group mb-4">
                  <input type="password" name="password" class="form-control">
                  <span class="input-group-text"><i class="bi bi-eye"></i></span>
                </div>
              </div>


              <div class="mb-4">
                <label class="form-label">Password</label>

                <div class="input-group mb-4">
                  <input type="password" name="password_confirm" class="form-control">
                  <span class="input-group-text"><i class="bi bi-eye"></i></span>
                </div>
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