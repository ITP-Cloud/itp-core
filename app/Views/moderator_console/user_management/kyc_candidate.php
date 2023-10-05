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
      <button type="button" class="btn btn-success w-50">Approve</button>
      <button type="button" class="btn btn-danger w-50 ms-2">Reject</button>
    </div>
  </div>
</div>