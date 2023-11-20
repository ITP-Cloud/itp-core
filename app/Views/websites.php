<div class="container mt-3">
  <h3 class="text-center mb-4">ITP <span class="text-primary">Search</span> 🧐</h3>

  <div class="d-flex w-75 mx-auto border position-relative" style="border-radius: 20px;">
    <input class="form-control" type="search" style="border-radius: 20px;" placeholder="Search for websites or type port number" value="<?= $query ?>" name="s_query" <?= $query == '' ? 'autofocus' : '' ?>>
    <?php if ($query) : ?>
      <button class="btn btn-primary position-absolute top-0 end-0" style="border-radius: 20px;margin-top: 5px; margin-right:90px" id="clear-search-btn">
        <i class="bi bi-x-circle-fill"></i>
      </button>
    <?php endif ?>
    <button class="btn btn-primary position-absolute top-0 end-0 me-1" style="border-radius: 20px;margin-top: 5px" id="search-btn">Search</button>
  </div>

  <div class="mt-4">
    <?php if ($query) : ?>
      <span class="mb-4">Search Results for <span class="text-primary"><?= $query ?></span>...</span>
    <?php else : ?>
      <span>Recently Deployed</span>
    <?php endif ?>
    <?php if (count($websites) == 0) : ?>
      <div class="mb-10 mt-10">
        <h3 class="text-center">No <span class="text-primary">Websites</span> Found 🤦‍♂️</h3>
      </div>
    <?php endif ?>
    <div class="row mt-3 mb-4 gap-3">
      <?php foreach ($websites as $website) : ?>
        <div class="col-auto">
          <a href="<?= env('serverUrl') . ':' . $website['md_ws_port_number'] ?>">
            <div class="card" style="width: 200px">
              <div class="text-center card-body">
                <div class="mb-4">
                  <img src="<?= base_url('assets/uploads/' . $website['md_ws_logo']) ?>" alt="Logo" style="width: 100%;">
                </div>
                <h3 class="card-text fw-light"><?= $website['md_ws_name'] ?></h3>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<script>
  // Search on click
  const searchBtn = document.querySelector('#search-btn');
  const searchQuery = document.querySelector('input[name="s_query"]');
  searchBtn.addEventListener('click', () => {
    if (searchQuery.value == '') {
      return;
    }
    window.location.href = `<?= base_url('websites?query=') ?>${searchQuery.value}`;
  });

  // Search on enter
  searchQuery.addEventListener('keyup', (e) => {
    if (e.key == 'Enter') {
      if (searchQuery.value == '') {
        return;
      }
      window.location.href = `<?= base_url('websites?query=') ?>${searchQuery.value}`;
    }
  });

  // Clear search
  const clearSearchBtn = document.querySelector('#clear-search-btn');
  clearSearchBtn.addEventListener('click', () => {
    window.location.href = `<?= base_url('websites') ?>`;
  });
</script>