

<?php
// Include config file
require_once "../config.php";

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
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>My Accounts</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Account</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Site URL</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM accounts";
                    if ($result = mysqli_query($link, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                          while($row = mysqli_fetch_array($result)){
                            echo "<tr>";

                            // name column
                            echo "<td class='align-middle'>" . "<div class='d-flex px-2'>"."<div class='my-auto'>";
                            echo "<h6 class='text-sm'>".$row['name']."</h6>"."</div>"."</div>"."</td>";

                            // site column
                            echo "<td class='align-middle'>"."<p class='text-sm font-weight-bold'>".$row['site']."</p>"."</td>";
                            
                            // username column
                            echo "<td class='align-middle'>"."<p class='text-sm font-weight-bold'>".$row['username']."</p>"."</td>";
                            
                            // password column
                            echo "<td class='align-middle'>"."<p class='text-sm font-weight-bold'>".$row['password']."</p>"."</td>";
                            
                            // category column
                            echo "<td class='align-middle'>"."<p class='text-sm font-weight-bold'>".$row['category']."</p>"."</td>";

                            // view button
                            echo "<td class='align-middle'>";
                            echo "<a href='./account.php' class='text-sm font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>";
                            echo "View"."</a>"."</td>";

                            // edit/delete button
                            echo "<td class='align-middle'>";
                            echo "<a href='./account.php' class='text-sm font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>";
                            echo "Edit"."</a>"."</td>";
                
                            echo "</tr>";
                          }
                          mysqli_free_result($result);
                        }
                        else {
                          echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                      echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
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