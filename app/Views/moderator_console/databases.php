<div class="container-fluid">
  <div class="d-flex">
    <h2>Database <span class="text-primary">Management</span></h2>

    <a href="<?= env('serverUrl') ?>/phpmyadmin/" target="_blank" class="btn btn-outline-primary m-1 ms-auto">
      Open phpMyAdmin
    </a>

    <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">New <span class="text-primary">Database</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <div class="input-group mb-3 border rounded">
            <span class="input-group-text" id="basic-addon1">user1234</span>
            <input type="text" class="form-control" value="" placeholder="Database name" aria-label="Database name" aria-describedby="Database name">
          </div>

          <button type="button" class="btn btn-primary w-100">Create Database</button>
        </div>

        <div class="mt-5">
          <div class="text-center">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <p> Provisioning Database...</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <p class="text-muted">Manage all <span class="text-primary">databases</span> here.</p>
  </div>
  <div class="row mt-7 justify-content-center gap-3">
    <?php $list = [1, 2, 3, 4, 5, 6]; ?>
    <?php foreach ($databases as $database) : ?>
      <div class="col-auto">
        <div class="card" style="width: 200px">
          <div class="card-header">
            <?= $$database['md_db_name'] ?>
          </div>
          <div class="text-center card-body">
            <div class="mb-4">
              <i class="ti ti-database" style="font-size: 60px;"></i>
            </div>
            <p class="card-text">Database Name • <?= $$database['md_db_name'] ?></p>

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#getCredentialsCanvas<?= $li ?>" aria-controls="staticBackdrop">
              View Details
            </button>
          </div>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="getCredentialsCanvas<?= $li ?>" aria-labelledby="staticBackdropLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel"><span class="text-primary">Database</span> Details</h5>
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