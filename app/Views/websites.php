<div class="container">
  <?php if (count($websites) == 0) : ?>
    <div class="mb-10">
      <h3 class="text-center">No <span class="text-primary">Websites</span> Found 🤦‍♂️</h3>
    </div>
  <?php endif ?>

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
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <img src="<?= base_url() ?>/assets/images/backgrounds/website-bg.jpg" class="card-img-top rounded-0" alt="...">
                <div class="bg-primary border border-light border-2 rounded p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3">
                  <img src="<?= base_url('assets/uploads/' . $website['md_ws_logo']) ?>" width="100" data-bs-placement="top">
                </div>
              </div>
              <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4"><?= $website['md_ws_name'] ?></h6>
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <h6 class="fw-light fs-2 mb-0">Author by <?= $website['firstname'] . ' ' . $website['lastname'] ?></h6>
                    <h6 class="fw-light fs-2 mb-0">Created on <?= date('d M Y', strtotime($website['md_ws_created_at'])) ?></h6>
                  </div>
                  <div class="list-unstyled d-flex align-items-center mb-0">
                    <a class="btn btn-primary rounded-pill" target="_blank" href="<?= env('serverUrl') . ':' . $website['md_ws_port_number'] ?>">Visit</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                Description
              </div>
              <div class="card-body">
                <?= $website['md_ws_description'] ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>