<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
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

          <div class="col-md-6 d-none d-md-block h-100">
            <div class="mt-4 my-auto">
              <img src="<?= base_url() ?>/fassets/img/kyc.jpg" style="width: 90%;" alt="">
            </div>
          </div>

          <div class="col-md-6 border-start">

            <div class="m-4 w-75 mx-auto">
              <a href=" <?= base_url() ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="<?= base_url() ?>/assets/images/logos/dark-logo.svg" width="180" alt="" />
              </a>
              <p>You're almost set to start using ITP Cloud, we just need to verify that you're actually a student 😏</p>

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


              <?= form_open_multipart('kyc/submit') ?>

              <div class="mb-3 text-center">
                <label for="portrait" class="form-label">Portrait</label><br>
                <img id="blah" src="<?= base_url() ?>/fassets/img/avatar-person.svg" alt="avatar" width="100px" class="mb-4 rounded" />
                <input class="form-control" type="file" name="portrait" id="portrait" accept="image/*" required>
              </div>

              <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="<?= set_value('student_id') ?>" placeholder="ICT-123456" required>
              </div>

              <div class="mb-3">
                <label for="institution" class="form-label">Institution (as it appears on your student ID)</label>
                <input type="text" class="form-control" id="institution" name="institution" value="<?= set_value('institution') ?>" placeholder="Zambia University College of Technology" required>
              </div>

              <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select name="country" id="country" class="form-select" aria-label="Select Country" required>
                  <option selected>Select country</option>
                  <?php foreach ($countries as $country) : ?>
                    <option <?= set_value('country', 'Zambia') == $country ? 'selected' : '' ?> value="<?= $country ?>"><?= $country ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="studentIdDoc" class="form-label">Student ID Photo</label>
                <input class="form-control" name="student_id_doc" type="file" id="studentIdDoc" accept="image/*" required>
              </div>

              <div class="mb-4">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
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
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('blah').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    document.getElementById("portrait").onchange = function() {
      readURL(this);
    };
  </script>
</body>

</html>