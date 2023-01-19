<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM accounts WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $username = $row["username"];
                $password = $row["password"];
                $name = $row["name"];
                $site = $row["site"];
                $category = $row["category"];
                $description = $row["description"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                echo "Oops! URL doesn't exist.";
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
      echo "Something's wrong with the query: " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    echo "URL doesn't contain ID parameter.";
    exit();
}

include('../partials/header.php')

?>

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
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username/Email</label>
                  <p><?php echo $row["username"]; ?></p>
              </div>
              <div class="form-group">
                  <label for="example-password-input" class="form-control-label">Password</label>
                  <div class="mb-3 pw">
                  <p><?php echo $row["password"]; ?></p>
                  </div>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Account Name</label>
                <p><?php echo $row["name"]; ?></p>
              </div>
              <div class="form-group">
                <label for="example-url-input" class="form-control-label">Account URL</label>
                <p><?php echo $row["site"]; ?></p>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Account Category</label>
                <p><?php echo $row["category"]; ?></p>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description/Notes</label>
                <p><?php echo $row["description"]; ?></p>
              </div>

              <a href="dashboard.php" class="btn btn-primary">Back</a>
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