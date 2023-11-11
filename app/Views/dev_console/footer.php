<div class="py-6 px-6 text-center">
  <p class="mb-0 fs-4">Copyright &copy; 2023 ITP Cloud. All rights reserved.</p>
</div>
</div>
</div>
</div>
<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/js/sidebarmenu.js"></script>
<script src="<?= base_url() ?>/assets/js/app.min.js"></script>
<script src="<?= base_url() ?>/assets/js/simplebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
<script>
  const serverClipboard = new ClipboardJS('#clipboard-server-address');
  const copyServerAddrBtn = document.getElementById('clipboard-server-address');

  serverClipboard.on('success', function(e) {
    console.log(e)
    copyServerAddrBtn.innerHTML = '<i class="ti ti-clipboard-check fs-6"></i>';
    setTimeout(() => {
      copyServerAddrBtn.innerHTML = '<i class="ti ti-clipboard fs-6"></i>';
    }, 1500);
  });


  const usernameClipboard = new ClipboardJS('#clipboard-username');
  const copyUsernameBtn = document.getElementById('clipboard-username');

  usernameClipboard.on('success', function(e) {
    console.log(e)
    copyUsernameBtn.innerHTML = '<i class="ti ti-clipboard-check fs-6"></i>';
    setTimeout(() => {
      copyUsernameBtn.innerHTML = '<i class="ti ti-clipboard fs-6"></i>';
    }, 1500);
  });


  const passwordClipboard = new ClipboardJS('#clipboard-password');
  const copyPasswordBtn = document.getElementById('clipboard-password');

  passwordClipboard.on('success', function(e) {
    console.log(e)
    copyPasswordBtn.innerHTML = '<i class="ti ti-clipboard-check fs-6"></i>';
    setTimeout(() => {
      copyPasswordBtn.innerHTML = '<i class="ti ti-clipboard fs-6"></i>';
    }, 1500);
  });
</script>
</body>

</html>