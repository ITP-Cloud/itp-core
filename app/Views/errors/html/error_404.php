<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 | Page Not Found</title>
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
    <main>
        <!-- section -->
        <section>
            <div class="container d-flex flex-column">
                <div class="row justify-content-center align-items-center">
                    <div class="offset-lg-1 col-lg-10  py-4 py-xl-0">

                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url() ?>/assets/images/logos/dark-logo.svg" width="300" alt="logo" />
                                    </a>
                                </div>

                                <div class=" mb-6 mb-lg-0">
                                    <h1>Something's wrong here...</h1>
                                    <p class="mb-8">
                                        We can't find the page you're looking for.<br>
                                        Check out our help center or head back to home.
                                    </p>
                                    <a href="<?= base_url() ?>" class="btn btn-primary ms-2">Return home</a>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <lottie-player autoplay loop mode="normal" src="<?= base_url() ?>/fassets/img/lottie/404.json" style="width: 100%">
                                </lottie-player>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- section -->

    <!-- Javascript-->
    <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/theme.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script>
</body>

</html>