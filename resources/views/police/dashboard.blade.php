
  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin | Crime Reporting</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
<!-- ======= Header ======= -->
@include('includes.police.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

@include('includes.police.aside')
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('police.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Solved Crime</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                      @php
                      $solved       = DB::table('reports')
                                               ->where('delivery_to',Auth::user()->username)
                                               ->where('report_status','Resolved')
                                               ->get();

                      $solved_count = $solved->count();
                      @endphp
                      <h6>{{$solved_count}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Pending Crime</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                    @php
                      $pending       = DB::table('reports')
                                               ->where('delivery_to',Auth::user()->username)
                                               ->where('report_status','Pending')
                                               ->get();

                      $pending_count = $pending->count();
                      @endphp
                      <h6>{{$pending_count}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">FollowUp Crime</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                    @php
                      $follow       = DB::table('reports')
                                               ->where('delivery_to',Auth::user()->username)
                                               ->where('report_status','FollowUp')
                                               ->get();

                      $follow_count = $follow->count();
                      @endphp
                      <h6>{{$follow_count}}</h6>
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">


                <!-- here -->

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
        
            <!-- Top Selling -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->

      </div>
    </section>

    </main><!-- End #main -->

@include('includes.police.footer')