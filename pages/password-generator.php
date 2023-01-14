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
                  <label for="example-text-input" class="form-control-label">Password</label>
                  <input class="form-control" type="text" value="" id="example-text-input" disabled >
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Number of Characters</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>8</option>
                  <option>10</option>
                  <option>12</option>
                  <option>14</option>
                </select>
              </div>
              <div class="row">
                <div class="col">
                    <button type="button" class="btn bg-gradient-primary w-100" onclick="">Generate Password</button>
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
  <?php include('../partials/footer.php') ?>
</body>

</html>