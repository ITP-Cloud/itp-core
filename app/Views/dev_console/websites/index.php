<div class="container-fluid">
  <div class="d-flex">
    <h2>Websites</h2>
    <div class="d-flex m-1 ms-auto">
      <a href="<? base_url('console/websites/new') ?>" class="btn btn-outline-primary">
        <i class="ti ti-html"></i> New Website
      </a>
      <a href="<?= base_url('console/file-amangement') ?>" class="btn btn-outline-primary ms-1">
        Open File Manager
      </a>
    </div>

  </div>
  <div>
    <p class="text-muted">Manage your <span class="text-primary">websites</span> here.</p>
  </div>
  <div class="row mt-7 justify-content-center gap-3">
    <?php $list = [1, 2, 3, 4, 5, 6]; ?>
    <?php foreach ($websites as $website) : ?>
      <div class="col-auto">
        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#websiteDetails<?= $website['md_ws_id'] ?>" aria-controls="staticBackdrop">
          <div class="card" style="width: 270px">
            <div class="text-center card-body">
              <div class="mb-4">
                <img src="<?= base_url('assets/uploads/' . $website['md_ws_logo']) ?>" alt="Logo" style="width: 100%;">
              </div>
              <h3 class="card-text"><?= $website['md_ws_name'] ?></h3>
            </div>
          </div>
        </a>
        <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="websiteDetails<?= $website['md_ws_id'] ?>" aria-labelledby="staticBackdropLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel"><span class="text-primary">Managed</span> Website • Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div>
              I will not close if you click outside of me.
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>