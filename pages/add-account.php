<?php
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $password = $name = $site = $category = $description = "";
$username_err = $password_err = $name_err = $site_err = $category_err = $description_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username/email
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username/email.";
    } else{
        $username = $input_username;
    }

    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter a password.";
    } else{
        $password = $input_password;
    }

    // Validate account name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter the account name.";
    } else{
        $name = $input_name;
    }

    // Validate website URL
    $input_site = trim($_POST["site"]);
    if(empty($input_site)){
        $site_err = "Please enter the website's URL.";
    } else{
        $site = $input_site;
    }

    // Validate account category
    $input_category = trim($_POST["category"]);
    if(empty($input_site)){
        $category_err = "Please enter the account category.";
    } else{
        $category = $input_category;
    }

    // Validate account description
    $input_description = trim($_POST["description"]);
    $description = $input_description;
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($name_err) && empty($site_err) && empty($category_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO accounts (username, password, name, site, category, description)
          VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            if(!$stmt) {
              echo 'mysqli error';
            }

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_name,
              $param_site, $param_category, $param_description);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            $param_name = $name;
            $param_site = $site;
            $param_category = $category;
            $param_description = $description;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: dashboard.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

          // Close statement
          mysqli_stmt_close($stmt);
        }
        else {
          echo "Something's wrong with the query: " . mysqli_error($link);
      }
    }
    
    // Close connection
    mysqli_close($link);
}

include('../partials/header.php');
include('../partials/sidebar.php');

?>

<body class="g-sidenav-show  bg-gray-100">

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../partials/navbar.php') ?>
    <!-- End Navbar -->
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card p-4">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username/Email</label>
                  <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                  <span class="invalid-feedback"><?php echo $username_err;?></span>
              </div>
              <div class="form-group">
                  <label for="example-password-input" class="form-control-label">Password</label>
                  <div class="mb-3 pw">
                    <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <!-- <button class="input-group-button btn btn-light border password_show" id="password_show" type="button" onclick="toggle_password()"><i class="fa fa-eye-slash"></i></button> -->
                    <span class="invalid-feedback"><?php echo $password_err;?></span>
                  </div>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Account Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err;?></span>
              </div>
              <div class="form-group">
                <label for="example-url-input" class="form-control-label">Account URL</label>
                <input type="text" name="site" class="form-control <?php echo (!empty($site_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $site; ?>">
                <span class="invalid-feedback"><?php echo $site_err;?></span>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Account Category</label>
                <select class="form-control" name="category" value="<?php echo $category; ?>">
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
                <textarea name="description" class="form-control" value=""><?php echo $description; ?></textarea>
              </div>
              <div class="row mt-6">
                <div class="col">
                  <div class="text-center">
                    <!-- <button type="button" class="btn bg-gradient-success w-100" onclick="">Save Changes</button> -->
                    <input type="submit" class="btn bg-gradient-success w-100" value="Save Changes">
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
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
  <!-- Custom JS -->
  <script src="../script.js"></script>
</body>

</html>