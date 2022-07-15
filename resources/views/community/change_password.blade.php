<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crime Report </title>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>
<body>

  <!-- ======= Header ======= -->
  
  @include('includes.community.header')
  <!-- ======= Sidebar ======= -->
  @include('includes.community.aside')
<main id="main" class="main">

<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('community.dashboard')}}">Home</a></li>
      <li class="breadcrumb-item">Change</li>
        <li class="breadcrumb-item">Password</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-6" style="margin-left: 280px;">
      <div class="card" >
        <div class="card-body" style="margin-left:70px">
          <h5 class="card-title text-center">Change Password</h5>
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
          <!-- General Form Elements -->
          <form action="{{route('community.update.password')}}" method="POST">
          
          <div class="row mb-3">
              <div class="col-sm-10">
                <input type="password" name="current_password" placeholder="Enter Old Password" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10">
                <input type="password" name="new_password" placeholder="Enter New Password" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
             
              <div class="col-sm-10">
                <input type="password" name="new_confirm_password" placeholder="Enter Confirm Password" class="form-control">
              </div>
            </div>
         
           <div class="row mb-3">
             
             <div class="col-sm-10">
             @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
             @endif
             </div>
           </div>
          
            <div class="row mb-3 p-2" style="margin-left: 30px;">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update Password</button>
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
      &copy; Copyright <strong><span>Patrick</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
     
      Designed by <a href="">Patrick</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   
  <!-- Vendor JS Files -->
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
 
</body>

</html>