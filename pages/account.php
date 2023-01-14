<?php include('../partials/header.php') ?>

<body class="g-sidenav-show  bg-gray-100">
  <?php include('../partials/sidebar.php') ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../partials/navbar.php') ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card p-4">
            <form>
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username/Email</label>
                  <input class="form-control" type="text" value="" id="example-text-input">
              </div>
              <div class="form-group">
                  <label for="example-password-input" class="form-control-label">Password</label>
                  <div class="mb-3 pw">
                    <input type="password" class="form-control password" id="password" aria-label="Password" aria-describedby="password-addon">
                    <button class="input-group-button btn btn-light border password_show" id="password_show" type="button" onclick="toggle_password()"><i class="fa fa-eye-slash"></i></button>
                  </div>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Account Name</label>
                <input class="form-control" type="text" value="" id="example-text-input">
              </div>
              <div class="form-group">
                <label for="example-url-input" class="form-control-label">Account URL</label>
                <input class="form-control" type="url" value="" id="example-url-input">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Account Category</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Social</option>
                  <option>School</option>
                  <option>Work</option>
                  <option>Productivity</option>
                  <option>Finance</option>
                  <option>Shopping</option>
                  <option>Others</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description/Notes</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="row mt-6">
                <div class="col">
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-success w-100" onclick="">Save Changes</button>
                  </div>
                </div>
                <div class="col">
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-danger w-100" onclick="">Delete Account</button>
                  </div>
                </div>
              </div>
          </form>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                Copyright
                © <script>
                  document.write(new Date().getFullYear())
                </script> Ryanne Gail Kim
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <?php include('../partials/footer.php') ?>
</body>

</html>