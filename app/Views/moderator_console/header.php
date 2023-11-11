<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/favicon.ico">
  <link rel="manifest" href="<?= base_url() ?>/manifest.json">
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
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?= base_url() ?>" class="text-nowrap logo-img">
            <img src="<?= base_url() ?>/assets/images/logos/dark-logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link <?= $page == 'moderator_console' ? 'border-bottom border-primary border-2' : '' ?>" href="<?= base_url('console') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-home-dot"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Resource Management</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?= $page == 'websites' ? 'border-bottom border-primary border-2' : '' ?>" href="<?= base_url('moderator-console/websites') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-brand-html5"></i>
                </span>
                <span class="hide-menu">Websites</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?= $page == 'databases' ? 'border-bottom border-primary border-2' : '' ?>" href="<?= base_url('moderator-console/databases') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-database"></i>
                </span>
                <span class="hide-menu">Databases</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">User Management</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?= $page == 'kyc' ? 'border-bottom border-primary border-2' : '' ?>" href="<?= base_url('moderator-console/user-management/kyc') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-search"></i>
                </span>
                <span class="hide-menu">KYC</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link <?= $page == 'users' ? 'border-bottom border-primary border-2' : '' ?>" href="<?= base_url('moderator-console/user-management') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Users</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">

            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php if (auth()->user()->avatar == '') : ?>
                    <img src="<?= base_url() ?>/fassets/img/avatar-person.svg" alt="" width="35" height="35" class="rounded-circle">
                  <?php else : ?>
                    <img src="<?= base_url('assets/uploads/' . auth()->user()->avatar) ?>" alt="" width="35" height="35" class="rounded-circle">
                  <?php endif ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body p-2">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-help fs-6"></i>
                      <p class="mb-0 fs-3">Documentation</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-brand-youtube fs-6"></i>
                      <p class="mb-0 fs-3">Tutorials</p>
                    </a>
                    <a href="<?= base_url('my-account') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-primary mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->