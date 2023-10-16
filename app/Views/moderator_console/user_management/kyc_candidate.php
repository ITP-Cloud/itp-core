<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('moderator-console/user-management/kyc') ?>">KYC Approvals</a></li>
      <li class="breadcrumb-item active" aria-current="page">KYC Candidate</li>
    </ol>
  </nav>
  <div class="d-flex">
    <h2>KYC <span class="text-primary">Candidate</span></h2>
  </div>
  <div class="card">
    <div class="card-header text-center">
      <img src="<?= base_url('assets/uploads/' . $user->avatar) ?>" alt="" width="90" height="90" class="rounded-circle mb-2">
      <h3><span class="text-primary"><?= $user->firstname ?> </span> <?= $user->lastname ?></h3>
      <div>
        Account Status • <span class="badge bg-success rounded-3 fw-semibold"><?= ucwords(str_replace('_', ' ', $user->account_status)) ?></span>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <dl>
            <dt class="fw-semibold">Full Name</dt>
            <dd><?= $user->firstname . ' ' . $user->lastname ?></dd>
            <dt class="fw-semibold">Student ID</dt>
            <dd><?= $user->student_id ?></dd>
            <dt class="fw-semibold">Institution</dt>
            <dd><?= $user->institution ?></dd>
          </dl>
        </div>
        <div class="col-md-6">
          <dl>
            <dt class="fw-semibold">Country</dt>
            <dd><?= $user->country ?></dd>
            <dt class="fw-semibold">Email</dt>
            <dd><?= $user->email ?></dd>
            <dt class="fw-semibold">Phone</dt>
            <dd><?= $user->phone ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4>Student ID Document (Student ID • <?= $user->student_id ?>)</h4>
    </div>
    <div class="card-body">
      <img src="<?= base_url('assets/uploads/' . $user->student_id_document) ?>" alt="" style="width: 100%;">
    </div>
  </div>

  <div class="card card-body w-75 mx-auto text-center">
    <h4 class="mb-4">Approve or Reject KYC</h4>
    <div class="d-flex">
      <button class="btn btn-success w-50" type="button" data-bs-toggle="offcanvas" data-bs-target="#approveUser" aria-controls="approveUser">
        Approve
      </button>
      <button type="button" class="btn btn-danger w-50 ms-2">Reject</button>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="approveUser" aria-labelledby="approveUserLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="approveUserLabel"><span class="text-success">Approve</span> User</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="approveUserForm">
      <div class="mb-4">
        <p>You are about to approve <?= $user->firstname . ' ' . $user->lastname ?> to be a verified ITP Cloud user. This will trigger the ITP Engine to allocate a system account, database account and an ftp account.</p>
        <div>
          <label class="form-label" for="">Password</label>
          <input type="hidden" name="csrf_token_name" value="<?= csrf_hash() ?>">
          <input type="hidden" name="user_id" value="<?= $user->id ?>">
          <input class="form-control fs-3" name="password" type="password" placeholder="Password..." required>
        </div>
      </div>
      <div class="mb-4">
        <button class="btn btn-success w-100" id="approveUserBtn">
          Approve
        </button>

        <button class="btn btn-success w-100 d-none" type="button" id="approveUserLoadingBtn" disabled>
          <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
          <span role="status">Loading...</span>
        </button>
      </div>
    </form>

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

<script>
  const approveUserForm = document.querySelector('#approveUserForm');
  const outputLog = document.querySelector('#outputLog');
  const approveUserBtn = approveUserForm.querySelector('#approveUserBtn');
  const approveUserLoadingBtn = approveUserForm.querySelector('#approveUserLoadingBtn');

  approveUserForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(approveUserForm);

    approveUserBtn.classList.add('d-none');
    approveUserLoadingBtn.classList.remove('d-none');

    fetch('<?= base_url('moderator-console/user-management/approve') ?>', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success == false) {
          approveUserBtn.classList.remove('d-none');
          approveUserLoadingBtn.classList.add('d-none');

          let trail = outputLog.innerHTML;

          outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog.innerHTML += data.message;
          outputLog.innerHTML += '<br>';
          outputLog.innerHTML += trail;
        } else {
          approveUserBtn.classList.remove('d-none');
          approveUserBtn.classList.add('disabled');
          approveUserBtn.innerHTML = 'Approved';
          approveUserLoadingBtn.classList.add('d-none');

          let trail = outputLog.innerHTML;

          outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog.innerHTML += data.message;
          outputLog.innerHTML += '<br>';
          outputLog.innerHTML += "Redirecting to user's page in 4s...";
          outputLog.innerHTML += trail;

          setTimeout(() => {
            window.location.href = '<?= base_url('moderator-console/user-management/user/' . $user->id) ?>';
          }, 4000);
        }
      })
      .catch(error => {
        approveUserBtn.classList.add('d-none');
        approveUserLoadingBtn.classList.remove('d-none');

        let trail = outputLog.innerHTML;

        outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
        outputLog.innerHTML += data.message;
        outputLog.innerHTML += '<br>';
        outputLog.innerHTML += trail;
      });
  });
</script>