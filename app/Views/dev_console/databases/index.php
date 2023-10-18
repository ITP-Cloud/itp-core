<div class="container-fluid">
  <div class="d-flex">
    <h2>Database <span class="text-primary">Management</span></h2>
    <div class="m-1 ms-auto">
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
        <i class="ti ti-database"></i> New Database
      </button>
      <a href="<?= env('serverUrl') ?>/phpmyadmin/" class="btn btn-outline-primary">
        Open phpMyAdmin
      </a>
    </div>

    <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">New <span class="text-primary">Database</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="mb-4">
          <form id="newDatabaseForm">
            <input type="hidden" name="csrf_token_name" value="<?= csrf_hash() ?>">
            <div class="input-group mb-3 border rounded">
              <span class="input-group-text" id="basic-addon1">user1234</span>
              <input type="text" class="form-control" name="database_name" value="" placeholder="Database name" required>
            </div>

            <button class="btn btn-primary w-100" id="provisionDatabaseBtn">Provision Database</button>

            <button class="btn btn-success w-100 d-none" type="button" id="provisionDatabaseLoadingBtn" disabled>
              <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
              <span role="status">Provisioning...</span>
            </button>
          </form>
        </div>

        <div class="card">
          <div class="card-header">
            Output Log
          </div>
          <div class="card-body bg-dark">
            <code class="text-light" id="outputLog">
            </code>
          </div>
        </div>


      </div>
    </div>
  </div>
  <div>
    <p class="text-muted">Manage your <span class="text-primary">databases</span> here.</p>
  </div>
  <div class="row mt-7 justify-content-center gap-3">
    <?php $list = [1, 2, 3, 4, 5, 6]; ?>
    <?php foreach ($list as $li) : ?>
      <div class="col-auto">
        <div class="card" style="width: 200px">
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

<script>
  const newDatabaseForm = document.querySelector('#newDatabaseForm');
  const provisionDatabaseBtn = document.querySelector('#provisionDatabaseBtn');
  const provisionDatabaseLoadingBtn = document.querySelector('#provisionDatabaseLoadingBtn');
  const outputLog = document.querySelector('#outputLog');

  newDatabaseForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(newDatabaseForm);

    provisionDatabaseBtn.classList.add('d-none');
    provisionDatabaseLoadingBtn.classList.remove('d-none');

    fetch('<?= base_url('console/databases/new') ?>', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success == false) {
          provisionDatabaseBtn.classList.remove('d-none');
          provisionDatabaseLoadingBtn.classList.add('d-none');

          let trail = outputLog.innerHTML;

          outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog.innerHTML += data.message;
          outputLog.innerHTML += '<br>';
          outputLog.innerHTML += trail;
        } else {
          provisionDatabaseBtn.classList.remove('d-none');
          provisionDatabaseBtn.classList.add('disabled');
          provisionDatabaseBtn.innerHTML = 'Provisioned';
          provisionDatabaseLoadingBtn.classList.add('d-none');

          let trail = outputLog.innerHTML;

          outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog.innerHTML += data.message;
          outputLog.innerHTML += '<br>';
          outputLog.innerHTML += trail;

        }
      })
      .catch(error => {
        provisionDatabaseBtn.classList.add('d-none');
        provisionDatabaseLoadingBtn.classList.remove('d-none');

        let trail = outputLog.innerHTML;

        outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
        outputLog.innerHTML += data.message;
        outputLog.innerHTML += '<br>';
        outputLog.innerHTML += trail;
      });
  });
</script>