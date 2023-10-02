<div class="container-fluid">
  <div class="d-flex">
    <h2>Database <span class="text-primary">Management</span></h2>
    <button type="button" class="btn btn-outline-primary m-1 ms-auto" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
      <i class="ti ti-database"></i> New Database
    </button>
    <a href="http://192.168.239.129/phpmyadmin/" class="btn btn-outline-primary">
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
    <p class="text-muted">Manage your <span class="text-primary">databases</span> here.</p>
  </div>
  <div class="row mt-7 justify-content-center">
    <?php $list = [1, 2, 3, 4, 5, 6]; ?>
    <?php foreach ($list as $li) : ?>
      <div class="col-auto">
        <div class="card" style="width: 270px">
          <div class="card-header">
            MDB <?= $li ?>
          </div>
          <div class="text-center card-body">
            <div class="mb-4">
              <i class="ti ti-database" style="font-size: 60px;"></i>
            </div>
            <p class="card-text">Database Name • mydb</p>

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#getCredentialsCanvas<?= $li ?>" aria-controls="staticBackdrop">
              Get Credentials
            </button>

            <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="getCredentialsCanvas<?= $li ?>" aria-labelledby="staticBackdropLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel"> MDB <?= $li ?> • <span class="text-primary">Credentials</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <div>
                  I will not close if you click outside of me.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>