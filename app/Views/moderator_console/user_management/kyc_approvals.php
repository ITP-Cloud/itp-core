<div class="container-fluid">
  <div class="d-flex">
    <h2>KYC <span class="text-primary">Approvals</span></h2>
  </div>
  <div>
    <p class="text-muted">Manage all <span class="text-primary">KYC</span> approvals here.</p>
  </div>
  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Recent <span class="text-primary">Registrations</span></h5>
      <div class="table-responsive">
        <table class="table text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Profile</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Name/Id</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Institution/Country</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Email/Phone</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Action</h6>
              </th>

            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
              <tr>
                <td class="border-bottom-0">
                  <img src="<?= base_url('assets/uploads/' . $user->avatar) ?>" alt="" width="35" height="35" class="rounded-circle">
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?= $user->firstname . ' ' . $user->lastname ?></h6>
                  <span class="fw-normal"><?= $user->student_id ?></span>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $user->institution ?></h6>
                  <span class="fw-normal"><?= $user->country ?></span>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1"><?= $user->email ?></h6>
                  <span class="fw-normal"><?= $user->phone ?></span>
                </td>
                <td class="border-bottom-0">
                  <a href="<?= base_url('moderator-console/user-management/kyc/' . $user->id) ?>" class="btn btn-primary">
                    <i class="ti ti-eye"></i> View
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>