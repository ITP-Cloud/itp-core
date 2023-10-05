<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <!-- Yearly Breakup -->
    <div class="card w-100">
      <div class="card-body p-4">
        <div class="row">
          <div class="col-6">
            <h1 class="mb-9 fw-semibold">
              <span id="greeting"></span>
              <script type="text/javascript">
                var d = new Date();
                var hr = d.getHours();
                // console.log(hr);

                if (hr >= 12 && hr < 18) {
                  document.getElementById('greeting').innerHTML = "Good Afternoon,"
                }
                if (hr < 12 && hr > 2) {
                  document.getElementById('greeting').innerHTML = "Good Morning,"
                }
                if (hr >= 18 || hr < 2) {
                  document.getElementById('greeting').innerHTML = "Good Evening,"
                }
              </script>
              <span class="text-primary"><?= 'Aaron' ?>.</span>
            </h1>

            <div class="d-flex align-items-center mb-3">
              <p class="page-header-text">Remember, imagination is just the beginning!</p>
            </div>

            <div>
              <h4 class="fw-semibold mb-3">What would you like to achieve today 😜</h4>
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" class="btn btn-primary m-1">
                <i class="ti ti-brand-html5"></i>
                Regulate Websites
              </button>
              <button type="button" class="btn btn-secondary m-1">
                <i class="ti ti-database"></i>
                Manage Databases
              </button>
              <button type="button" class="btn btn-info m-1">
                <i class="ti ti-files"></i>
                KYC Approvals
              </button>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex justify-content-end">
              <img src="<?= base_url('assets/images/console_banner.jpg') ?>" alt="banner" width="340">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>