<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fresh Foods Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/icheck/skins/all.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script type="text/javascript" src="../../js/cat.js"></script>
</head>

<body onload="down();">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="../../index.php">
          <img src="../../images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html">
          <img src="../../images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
       
        <ul class="navbar-nav navbar-nav-right">
         

          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, Richard V.Welsh !</span>
              <img class="img-xs rounded-circle" src="../../images/faces/face1.jpg" alt="Profile image">
            </a>
           
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

     <!-- sidebar -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <!-- add admin profile -->
                  <img src="../../images/faces/face1.jpg" alt="profile image">
                </div>
               
                <div class="text-wrapper">
                  <p class="profile-name">Karin Nartey</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>

          <!-- sidebar -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Add</span>
              <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#">New Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newadmin.php">New Admin</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../tables/customer_table.php">
              <span class="menu-title">Customer Table</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../tables/order.php">
              <span class="menu-title">Order Table </span>
            </a>
          </li>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="../charts/chartjs.php">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          
          <li class="nav-item">
          
          </li>
          
        </ul>
      </nav>

      <!-- sidebar end -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

        <!-- product form -->
            
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">PRODUCT FORM</h4>
                    <p>
                        <?php
                        include('../tables/insert.php');
                        ?> 
                    </p>
                  <p class="card-description">
                  Add New Product
                  </p>
                  <!-- product title -->
                  <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Product title</label>
                      <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <!-- product category -->
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Category</label>
                    <select name="category" class="form-control" id="category">
                      

                    </select>
                  </div>
                  <!-- product price -->
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Price</label>
                    <div class="input-group">
                      <div class="input-group-prepend bg-primary border-primary">
                        <span class="input-group-text bg-transparent text-white">GHC</span>
                      </div>
                      <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)">
                      <div class="input-group-append bg-primary border-primary">
                      <span class="input-group-text bg-transparent text-white">.00</span>
                      </div>
                    </div>
                  </div>

                  <!-- File picure upload -->
                  <div class="form-group">
                      <label>Image upload</label>
                      <br>
                      <input name="picture" type="file" class="file-upload-defaultc">
                    <!--  <div class="input-group col-xs-12">
                     <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                         <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                      </span>
                     </div>-->
                    </div>
                   <!-- comments for Admin -->
                    <div class="form-group">
                      <label for="exampleTextarea1">Comments</label>
                      <textarea class="form-control" id="exampleTextarea1" name="comment" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Keywords</label>
                      <input name="keyword" type="text" class="form-control" id="exampleInputName1" placeholder="Keywords">
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            


        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
      </div>
    </div>
    
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>