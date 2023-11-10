<div class="container-fluid">
  <div class="d-flex">
    <h2>Database <span class="text-primary">Management</span></h2>
    <div class="m-1 ms-auto border border-primary p-2 rounded-2 bg-light">
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
        <i class="ti ti-database"></i> New Database
      </button>
      <a href="<?= base_url('console/databases/synchronize') ?>" class="btn btn-outline-primary">
        <i class="ti ti-rotate-dot"></i> Synchronize Databases
      </a>
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#databaseCredentialsOffcanvas" aria-controls="databaseCredentialsOffcanvas">
        <i class="ti ti-eye"></i> Check Credentials
      </button>
      <a href="<?= env('serverUrl') ?>/phpmyadmin/" target="_blank" class="btn btn-outline-primary">
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
              <span class="input-group-text" id="basic-addon1"><?= $userPayload['dbUsername'] ?></span>
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

    <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="databaseCredentialsOffcanvas" aria-labelledby="databaseCredentialsOffcanvasLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel"><span class="text-primary">Database</span> Credentials</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="card">
          <div class="card-body p-4">
            <h5 class="card-title">Overview</h5>
            <p class="card-text">
              Use the <span class="text-primary">Credentials</span> below to connect your App to your preferred Database.
            </p>
            <h5 class="card-title">Credentials</h5>
            <div>
              <div class="input-group mb-3 border rounded">
                <span class="input-group-text">Username</span>
                <input type="text" class="form-control" id="target-username" value="<?= $userPayload['dbUsername'] ?>" readonly>
                <div class="input-group-text">
                  <button class="btn btn-primary" id="clipboard-username" data-clipboard-target="#target-username">
                    <i class="ti ti-clipboard fs-6"></i>
                  </button>
                </div>
              </div>

              <div class="input-group mb-3 border rounded">
                <span class="input-group-text">Password</span>
                <input type="password" class="form-control" value="<?= $userPayload['dbPassword'] ?>" readonly>
                <input type="text" class="visually-hidden" id="target-password" value="<?= $userPayload['dbPassword'] ?>">
                <div class="input-group-text">
                  <button class="btn btn-primary" id="clipboard-password" data-clipboard-target="#target-password">
                    <i class="ti ti-clipboard fs-6"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div>
    <p class="text-muted">Manage your <span class="text-primary">databases</span> here.</p>
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
              Get Credentials
            </button>


          </div>
        </div>
      </div>
      <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="getCredentialsCanvas<?= $database['md_db_id'] ?>" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="staticBackdropLabel"><span class="text-primary">Database</span> Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="card">
            <div class="card-body p-4">
              <h5 class="card-title">Connection Details</h5>
              <p class="card-text">
                Use the <span class="text-primary">Credentials</span> below to connect your App to your preferred Database.
              </p>
              <div class="rounded-2">
                PHP
                <pre><code class="language-php">
&lt;?php 
$dbUsername = '<?= $userPayload['dbUsername'] ?>'; 
$dbPassword = '<?= $userPayload['dbPassword'] ?>'; 
$dbHost = 'localhost'; 
$dbName = '<?= $database['md_db_name'] ?>'';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
</code></pre>
              </div>

              <div class="rounded-2">
                JS
                <pre><code class="language-js">
const express = ...; 
const dbUsername = '<?= $userPayload['dbUsername'] ?>'; 
const dbPassword = '<?= $userPayload['dbPassword'] ?>'; 
const dbHost = 'localhost'; 
const dbName = '<?= $database['md_db_name'] ?>'';

var mysql = require('mysql');

var conn = mysql.createConnection({
  host: dbHost,
  user: dbUsername,
  password: dbPassword,
  database: dbName
});
</code></pre>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <h6 class="fw-light fs-2 mb-0">Owned by <?= auth()->user()->firstname . ' ' . auth()->user()->lastname ?></h6>
                  <h6 class="fw-light fs-2 mb-0">Created on <?= date('d M Y', strtotime($database['md_db_created_at'])) ?></h6>
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
          outputLog.innerHTML += "Refreshing page in 4s...";

          setTimeout(() => {
            window.location.href = '<?= base_url('console/databases') ?>';
          }, 4000);
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script>
  hljs.highlightAll();
</script>