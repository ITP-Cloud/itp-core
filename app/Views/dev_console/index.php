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
              <span class="text-primary"><?= auth()->user()->firstname ?>.</span>
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
                Deploy New Website
              </button>
              <button type="button" class="btn btn-secondary m-1">
                <i class="ti ti-database"></i>
                Provision a Database
              </button>
              <button type="button" class="btn btn-info m-1">
                <i class="ti ti-files"></i>
                Manage Files
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

  <!-- <div class="row">
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-4">Boat Headphone</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-4 mb-0">$50 <span class="ms-2 fw-normal text-muted fs-3"><del>$65</del></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-4 mb-0">$650 <span class="ms-2 fw-normal text-muted fs-3"><del>$900</del></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/s7.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-4 mb-0">$150 <span class="ms-2 fw-normal text-muted fs-3"><del>$200</del></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card overflow-hidden rounded-2">
        <div class="position-relative">
          <a href="javascript:void(0)"><img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
          <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
        </div>
        <div class="card-body pt-3 p-4">
          <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
          <div class="d-flex align-items-center justify-content-between">
            <h6 class="fw-semibold fs-4 mb-0">$285 <span class="ms-2 fw-normal text-muted fs-3"><del>$345</del></span></h6>
            <ul class="list-unstyled d-flex align-items-center mb-0">
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
              <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> -->