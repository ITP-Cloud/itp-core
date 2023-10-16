<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('console/websites') ?>">Websites</a></li>
      <li class="breadcrumb-item active" aria-current="page">New Website</li>
    </ol>
  </nav>
  <div class="d-flex">
    <h2>New <span class="text-primary">Website</span></h2>
  </div>

  <div class="card">
    <div class="card-body">
      <form id="newWebsiteForm" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token_name" value="<?= csrf_hash() ?>">
        <div class="mb-3 text-center">
          <label for="logo" class="form-label">Logo</label><br>
          <img id="blah" src="<?= base_url() ?>/assets/images/website-logo.png" alt="avatar" width="100px" class="mb-4 rounded" />
          <input class="form-control" type="file" name="logo" id="logo" accept="image/*" required>
        </div>

        <div class="mb-3">
          <label for="website_name" class="form-label">Website Name</label>
          <input type="text" class="form-control" id="website_name" name="website_name" placeholder="Spotify" required>
        </div>

        <div class="mb-3">
          <label for="website_description" class="form-label">Website Description</label><br>
          <textarea name="website_description" id="website_description"></textarea>
        </div>

        <div class="mb-3">
          <label for="institution" class="form-label">Website Tech Stack</label>
          <select name="website_tech_stack" id="website_tech_stack" class="form-select" aria-label="Select stack" required>
            <option selected>Select stack</option>
            <option value="plain">Plain Website (HTML, CSS, JS)</option>
            <option value="standard_php">PHP 8</option>
            <option value="codeigniter4">CodeIgniter 4</option>
            <option value="laravel">Laravel 9</option>
          </select>
        </div>

        <div class="mb-4">
          <button class="btn btn-primary w-100" id="provisionWebsiteBtn">Provision Website</button>

          <button class="btn btn-success w-100 d-none" type="button" id="provisionWebsiteLoadingBtn" disabled>
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Provisioning...</span>
          </button>
        </div>
      </form>
    </div>
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

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#website_description'))
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });
</script>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        document.getElementById('blah').setAttribute('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  document.getElementById("logo").onchange = function() {
    readURL(this);
  };
</script>
<script>
  const newWebsiteForm = document.querySelector('#newWebsiteForm');
  const provisionWebsiteBtn = document.querySelector('#provisionWebsiteBtn');
  const provisionWebsiteLoadingBtn = document.querySelector('#provisionWebsiteLoadingBtn');
  const outputLog = document.querySelector('#outputLog');

  newWebsiteForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(newWebsiteForm);

    provisionWebsiteBtn.classList.add('d-none');
    provisionWebsiteLoadingBtn.classList.remove('d-none');

    fetch('<?= base_url('console/websites/new') ?>', {
        method: 'POST',
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.success == false) {
          provisionWebsiteBtn.classList.remove('d-none');
          provisionWebsiteLoadingBtn.classList.add('d-none');

          let trail = outputLog.innerHTML;

          outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog.innerHTML += data.message;
          outputLog.innerHTML += '<br>';
          outputLog.innerHTML += trail;
        } else {
          provisionWebsiteBtn.classList.remove('d-none');
          provisionWebsiteBtn.classList.add('disabled');
          provisionWebsiteBtn.innerHTML = 'Provisioned';
          provisionWebsiteLoadingBtn.classList.add('d-none');

          let trail = outputLog.innerHTML;

          outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
          outputLog.innerHTML += data.message;
          outputLog.innerHTML += '<br>';
          outputLog.innerHTML += "Redirecting to webistes page in 4s...";
          outputLog.innerHTML += trail;

          // setTimeout(() => {
          //   window.location.href = '<?= base_url('console/websites') ?>';
          // }, 4000);
        }
      })
      .catch(error => {
        provisionWebsiteBtn.classList.add('d-none');
        provisionWebsiteLoadingBtn.classList.remove('d-none');

        let trail = outputLog.innerHTML;

        outputLog.innerHTML = '$ ~ <span class="text-warning">Session Output:</span> <br>'
        outputLog.innerHTML += data.message;
        outputLog.innerHTML += '<br>';
        outputLog.innerHTML += trail;
      });
  });
</script>