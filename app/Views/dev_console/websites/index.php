<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('console') ?>">Home</a></li>
      <li class="breadcrumb-item active">Websites</li>
    </ol>
  </nav>
  <div class="d-flex">
    <h2>Web<span class="text-primary">sites</span> </h2>
    <div class="d-flex m-1 ms-auto">
      <a href="<?= base_url('console/websites/new') ?>" class="btn btn-outline-primary">
        New Website
      </a>
      <a href="<?= base_url('console/file-management') ?>" class="btn btn-outline-primary ms-1">
        Open File Manager
      </a>
    </div>

  </div>
  <div>
    <p class="text-muted">Manage your <span class="text-primary">websites</span> here.</p>
  </div>
  <div class="row mt-7 gap-3">
    <?php foreach ($websites as $website) : ?>
      <div class="col-auto">
        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#websiteDetails<?= $website['md_ws_id'] ?>" aria-controls="staticBackdrop">
          <div class="card" style="width: 200px">
            <div class="text-center card-body">
              <div class="mb-4">
                <img src="<?= base_url('assets/uploads/' . $website['md_ws_logo']) ?>" alt="Logo" style="width: 100%;">
              </div>
              <h3 class="card-text"><?= $website['md_ws_name'] ?></h3>
            </div>
          </div>
        </a>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="websiteDetails<?= $website['md_ws_id'] ?>" aria-labelledby="staticBackdropLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel"><?= $website['md_ws_name'] ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="overflow-hidden rounded-2">
              <div class="text-center mt-4">
                <img src="<?= base_url('assets/uploads/' . $website['md_ws_logo']) ?>" width="100" data-bs-placement="top">
              </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4"><?= $website['md_ws_name'] ?></h6>
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="fw-light fs-2 mb-0">Author by <?= auth()->user()->firstname . ' ' . auth()->user()->lastname ?></h6>
                    <h6 class="fw-light fs-2 mb-0">Created on <?= date('d M Y', strtotime($website['md_ws_created_at'])) ?></h6>
                  </div>
                  <div class="list-unstyled d-flex align-items-center mb-0">
                    <a class="btn btn-primary rounded-pill" target="_blank" href="<?= env('serverUrl') . ':' . $website['md_ws_port_number'] ?>">Visit</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="m-4">
              <div class="card-header fs-3">
                Description
              </div>
              <div class="card-body">
                <p class="card-text fw-light fs-2"><?= $website['md_ws_description'] ?></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>