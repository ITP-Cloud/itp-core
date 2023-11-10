<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Activate Account | ITP Cloud</title>
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

        <div class="row justify-content-between w-100 mt-7">

          <div class="col-md-6 border-end d-none d-md-block">
            <div class="mt-4">
              <img src="<?= base_url() ?>/assets/images/Tablet login-pana (1).png" style="width: 90%;" alt="">
            </div>
          </div>

          <div class="col-md-6">

            <div class="m-4 w-75 mx-auto">
              <a href=" <?= base_url() ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="<?= base_url() ?>/assets/images/logos/dark-logo.svg" width="180" alt="" />
              </a>
              <!-- <p class="text-center">Buid Your Imagination</p> -->
              <h3 class="text-center mb-4"><span class="text-primary">Activate</span> Account</h3>

              <?php if (session('error')) : ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
              <?php endif ?>

              <p class="mb-4"><?= lang('Auth.emailActivateBody') ?></p>

              <form action="<?= site_url('auth/a/verify') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Code -->
                <div class="mb-2">
                  <input type="number" class="form-control form-control-lg w-75 mx-auto" name="token" placeholder="000000" inputmode="numeric" pattern="[0-9]*" autocomplete="one-time-code" value="<?= old('token') ?>" required />
                </div>

                <div class="d-grid col-8 mx-auto m-3">
                  <button type="submit" class="btn btn-primary btn-block">Activate</button>
                </div>

              </form>
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