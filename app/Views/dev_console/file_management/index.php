<div class="container-fluid">
  <h2>File <span class="text-primary">Management</span></h2>
  <div>
    <p class="text-muted">Manage your databases here.</p>
  </div>
  <div class="row mt-4">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body p-4">
          <h5 class="card-title mb-9 fw-semibold">FTP <span class="text-primary">Credentials</span></h5>
          <h5 class="card-title">Overview</h5>
          <p class="card-text">
            Use an FTP Client to access your file remotely.
            Get started by installing an FTP Client, we recommend using <a href="https://download.filezilla-project.org/client/FileZilla_3.65.0_win64_sponsored2-setup.exe">FileZilla Client (Click to download)</a>.
          </p>
          <h5 class="card-title">Credentials</h5>
          <div>
            <div class="input-group mb-3 border rounded">
              <span class="input-group-text">Server Address</span>
              <input type="text" class="form-control" id="target-server-address" value="192.168.235.120" readonly>
              <div class="input-group-text">
                <button class="btn btn-primary" id="clipboard-server-address" data-clipboard-target="#target-server-address">
                  <i class="ti ti-clipboard fs-6"></i>
                </button>
              </div>
            </div>

            <div class="input-group mb-3 border rounded">
              <span class="input-group-text">Username</span>
              <input type="text" class="form-control" id="target-username" value="sammy" readonly>
              <div class="input-group-text">
                <button class="btn btn-primary" id="clipboard-username" data-clipboard-target="#target-username">
                  <i class="ti ti-clipboard fs-6"></i>
                </button>
              </div>
            </div>

            <div class="input-group mb-3 border rounded">
              <span class="input-group-text">Password</span>
              <input type="password" class="form-control" id="target-password" value="123456789" readonly>
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
    <div class="col-md-6">

      <div class="card" style="height: 250px">

        <div class="card-body">
          <h5 class="card-title mb-9 fw-semibold">Web <span class="text-primary">File</span> Browser</h5>
          <h5 class="card-title">Overview</h5>
          <p class="card-text">File Browser is a web based file explorer and manager. Get started by clicking open below.</p>
          <a href="<?= base_url('console/file-management/file-browser') ?>" class="btn btn-primary">Open File Browser</a>
        </div>
      </div>
    </div>
  </div>
</div>