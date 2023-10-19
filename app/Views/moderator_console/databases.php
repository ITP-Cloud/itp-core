<div class="container-fluid">
  <div class="d-flex">
    <h2>Database <span class="text-primary">Management</span></h2>

    <a href="<?= env('serverUrl') ?>/phpmyadmin/" target="_blank" class="btn btn-outline-primary m-1 ms-auto">
      Open phpMyAdmin
    </a>
  </div>
  <div>
    <p class="text-muted">Manage all <span class="text-primary">databases</span> here.</p>
  </div>
  <div class="row mt-7 gap-3">
    <?php foreach ($databases as $database) : ?>
      <div class="col-auto">
        <div class="card" style="width: 200px">
          <div class="card-header">
            Managed Database
          </div>
          <div class="text-center card-body">
            <div class="mb-4">
              <i class="ti ti-database" style="font-size: 60px;"></i>
            </div>
            <p class="card-text"><?= $database['md_db_name'] ?></p>

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#getCredentialsCanvas<?= $database['md_db_id'] ?>" aria-controls="staticBackdrop">
              View Details
            </button>
          </div>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="getCredentialsCanvas<?= $database['md_db_id'] ?>" aria-labelledby="staticBackdropLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel"><span class="text-primary">Database</span> Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="<?= base_url() ?>/assets/images/backgrounds/website-bg.jpg" class="card-img-top rounded-0" alt="...">
                <div class="bg-primary border border-light border-2 rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3">
                  <i class="ti ti-database" style="font-size: 60px;"></i>
                </div>
              </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4"><?= $database['md_db_name'] ?></h6>
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="fw-light fs-2 mb-0">Owned by <?= $database['firstname'] . ' ' . $database['lastname'] ?></h6>
                    <h6 class="fw-light fs-2 mb-0">Created on <?= date('d M Y', strtotime($database['md_db_created_at'])) ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>