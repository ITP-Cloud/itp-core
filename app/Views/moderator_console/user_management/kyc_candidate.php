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
      <?php if ($user->avatar == '') : ?>
        <img src="<?= base_url() ?>/fassets/img/avatar-person.svg" alt="" width="90" height="90" class="rounded-circle mb-2">
      <?php else : ?>
        <img src="<?= base_url('assets/uploads/' . $user->avatar) ?>" alt="" width="90" height="90" class="rounded-circle mb-2">
      <?php endif ?>
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
    <h4 class="mb-4">KYC <span class="text-primary">Actions</span></h4>
    <div class="d-flex justify-content-center">
      <button class="btn btn-success w-25" type="button" data-bs-toggle="offcanvas" data-bs-target="#approveUser" aria-controls="approveUser">
        Approve
      </button>
      <button class="btn btn-secondary w-25 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#requestResubmitKyc" aria-controls="requestResubmitKyc">
        Request Resubmit
      </button>
      <button class="btn btn-danger w-25 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#rejectUser" aria-controls="rejectUser">
        Reject
      </button>
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
          <input type="hidden" name="csrf_token_name" value="<?= $csrf_token ?>">
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
        <code class="text-light" id="outputLog1">
        </code>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="rejectUser" aria-labelledby="rejectUserLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="rejectUserLabel"><span class="text-danger">Reject</span> User</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="rejectUserForm">
      <div class="mb-4">
        <p>You are about to reject <?= $user->firstname . ' ' . $user->lastname ?> from being a verified ITP Cloud user. We will notify him by email of this action.</p>
        <div>
          <label class="form-label" for="">Password</label>
          <input type="hidden" name="csrf_token_name" value="<?= $csrf_token ?>">
          <input type="hidden" name="user_id" value="<?= $user->id ?>">
          <input class="form-control fs-3" name="password" type="password" placeholder="Password..." required>
        </div>
      </div>
      <div class="mb-4">
        <button class="btn btn-danger w-100" id="rejectUserBtn">
          Reject
        </button>

        <button class="btn btn-success w-100 d-none" type="button" id="rejectUserLoadingBtn" disabled>
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
        <code class="text-light" id="outputLog2">
        </code>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="requestResubmitKyc" aria-labelledby="requestResubmitKycLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="requestResubmitKycLabel"><span class="text-secondary">Request</span> KYC Resubmission</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="requestResubmitKycForm">
      <div class="mb-4">
        <p>You are about to request <?= $user->firstname . ' ' . $user->lastname ?> to resubmit their KYC information. We will notify them by email of this action.</p>
        <div>
          <label class="form-label" for="">Password</label>
          <input type="hidden" name="csrf_token_name" value="<?= $csrf_token ?>">
          <input type="hidden" name="user_id" value="<?= $user->id ?>">
          <input class="form-control fs-3" name="password" type="password" placeholder="Password..." required>
        </div>
      </div>
      <div class="mb-4">
        <button class="btn btn-secondary w-100" id="requestResubmitKycBtn">
          Request Resubmission
        </button>

        <button class="btn btn-success w-100 d-none" type="button" id="requestResubmitKycLoadingBtn" disabled>
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
        <code class="text-light" id="outputLog3">
        </code>
      </div>
    </div>
  </div>
</div>

<!-- Approve User Action -->
<script>
  const approveUserForm = document.querySelector('#approveUserForm');
  const outputLog1 = document.querySelector('#outputLog1');
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

          let trail = outputLog1.innerHTML;

          outputLog1.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog1.innerHTML += data.message;
          outputLog1.innerHTML += '<br>';
          outputLog1.innerHTML += trail;
        } else {
          approveUserBtn.classList.remove('d-none');
          approveUserBtn.classList.add('disabled');
          approveUserBtn.innerHTML = 'Approved';
          approveUserLoadingBtn.classList.add('d-none');

          let trail = outputLog1.innerHTML;

          outputLog1.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog1.innerHTML += data.message;
          outputLog1.innerHTML += '<br>';
          outputLog1.innerHTML += "Redirecting to user's page in 4s...";
          outputLog1.innerHTML += trail;

          setTimeout(() => {
            window.location.href = '<?= base_url('moderator-console/user-management/user/' . $user->id) ?>';
          }, 4000);
        }
      })
      .catch(error => {
        approveUserBtn.classList.add('d-none');
        approveUserLoadingBtn.classList.remove('d-none');

        let trail = outputLog1.innerHTML;

        outputLog1.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
        outputLog1.innerHTML += 'Something went wrong, please try again later. If the issue persists, inform the system administrator';
        outputLog1.innerHTML += '<br>';
        outputLog1.innerHTML += trail;
      });
  });
</script>

<!-- Reject User Action -->
<script>
  const rejectUserForm = document.querySelector('#rejectUserForm');
  const outputLog2 = document.querySelector('#outputLog2');
  const rejectUserBtn = rejectUserForm.querySelector('#rejectUserBtn');
  const rejectUserLoadingBtn = rejectUserForm.querySelector('#rejectUserLoadingBtn');

  rejectUserForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(rejectUserForm);

    rejectUserBtn.classList.add('d-none');
    rejectUserLoadingBtn.classList.remove('d-none');

    fetch('<?= base_url('moderator-console/user-management/reject') ?>', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success == false) {
          rejectUserBtn.classList.remove('d-none');
          rejectUserLoadingBtn.classList.add('d-none');

          let trail = outputLog2.innerHTML;

          outputLog2.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog2.innerHTML += data.message;
          outputLog2.innerHTML += '<br>';
          outputLog2.innerHTML += trail;
        } else {
          rejectUserBtn.classList.remove('d-none');
          rejectUserBtn.classList.add('disabled');
          rejectUserBtn.innerHTML = 'Rejected';
          rejectUserLoadingBtn.classList.add('d-none');

          let trail = outputLog2.innerHTML;

          outputLog2.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog2.innerHTML += data.message;
          outputLog2.innerHTML += '<br>';
          outputLog2.innerHTML += "Redirecting to user's page in 4s...";
          outputLog2.innerHTML += trail;

          setTimeout(() => {
            window.location.href = '<?= base_url('moderator-console/user-management/kyc') ?>';
          }, 4000);
        }
      })
      .catch(error => {
        console.log(error);
        rejectUserBtn.classList.add('d-none');
        rejectUserLoadingBtn.classList.remove('d-none');

        let trail = outputLog2.innerHTML;

        outputLog2.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
        outputLog2.innerHTML += 'Something went wrong, please try again later. If the issue persists, inform the system administrator';
        outputLog2.innerHTML += '<br>';
        outputLog2.innerHTML += trail;
      });
  });
</script>

<!-- Request Resubmission of KYC Information -->
<script>
  const requestResubmitKycForm = document.querySelector('#requestResubmitKycForm');
  const outputLog3 = document.querySelector('#outputLog3');
  const requestResubmitKycBtn = requestResubmitKycForm.querySelector('#requestResubmitKycBtn');
  const requestResubmitKycLoadingBtn = requestResubmitKycForm.querySelector('#requestResubmitKycLoadingBtn');

  requestResubmitKycForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(requestResubmitKycForm);

    requestResubmitKycBtn.classList.add('d-none');
    requestResubmitKycLoadingBtn.classList.remove('d-none');

    fetch('<?= base_url('moderator-console/user-management/resubmit') ?>', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success == false) {
          requestResubmitKycBtn.classList.remove('d-none');
          requestResubmitKycLoadingBtn.classList.add('d-none');

          let trail = outputLog3.innerHTML;

          outputLog3.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog3.innerHTML += data.message;
          outputLog3.innerHTML += '<br>';
          outputLog3.innerHTML += trail;
        } else {
          requestResubmitKycBtn.classList.remove('d-none');
          requestResubmitKycBtn.classList.add('disabled');
          requestResubmitKycBtn.innerHTML = 'Rejected';
          requestResubmitKycLoadingBtn.classList.add('d-none');

          let trail = outputLog3.innerHTML;

          outputLog3.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog3.innerHTML += data.message;
          outputLog3.innerHTML += '<br>';
          outputLog3.innerHTML += "Redirecting to user's page in 4s...";
          outputLog3.innerHTML += trail;

          setTimeout(() => {
            window.location.href = '<?= base_url('moderator-console/user-management/kyc') ?>';
          }, 4000);
        }
      })
      .catch(error => {
        console.log(error);
        requestResubmitKycBtn.classList.add('d-none');
        requestResubmitKycLoadingBtn.classList.remove('d-none');

        let trail = outputLog3.innerHTML;

        outputLog3.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
        outputLog3.innerHTML += 'Something went wrong, please try again later. If the issue persists, inform the system administrator';
        outputLog3.innerHTML += '<br>';
        outputLog3.innerHTML += trail;
      });
  });
</script>