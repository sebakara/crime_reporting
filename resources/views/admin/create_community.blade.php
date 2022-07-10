<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../../assets/img/favicon.png" rel="icon">
  <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../../assets/css/style.css" rel="stylesheet">
</head>
<body>

  <!-- ======= Header ======= -->
  @include('includes.admin.header')
  <!-- ======= Sidebar ======= -->
  @include('includes.admin.aside')
  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item">Create</li>
            <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">CPC</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6" style="margin-left: 280px;">
          <div class="card" >
            <div class="card-body" style="margin-left:70px">
              <h5 class="card-title text-center">Create Account Form</h5>
              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Full Name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Phone Number" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Email Address" class="form-control">
                  </div>
                </div>

                

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="file" placeholder="Choose Profile" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Select District</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Select Sector</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

                 <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Select Cell</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Username" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="password" placeholder="Enter Password" class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3 p-2" style="margin-left: 30px;">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                    <button type="submit" class="btn btn-danger float-end">Cancel</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
             
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>

</body>

</html>