<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png')}}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
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
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Manage</li>
      <li class="breadcrumb-item active">Police</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">User Email</th>
                <th scope="col">District</th>
                <th scope="col">Create At</th>
              </tr>
            </thead>
            <tbody>
              @foreach($polices as $police)
              <tr>
                <th scope="row">1</th>
                <td>{{$police->name}}</td>
                <td>{{$police->username}}</td>
                <td>{{$police->email}}</td>
                <td>{{$police->district}}</td>
              
                <td>{{$police->created_at}}</td>
                <td>
                      @if($police->user_status==1)
                      <span class="badge badge-success">Active</span>
                      @else
                      <span class="badge badge-danger">Inactive</span>
                      @endif
                </td>
                
                <td>
                
                @if($police->user_status ==1)
                      <a href="{{URL::to('admin/full_address/'.$police->id)}}" class="btn btn-sm btn-warning" title="view Address" ><i class="fa fa-eye"></i></a>
                      <a href="{{URL::to('admin/police/account/inactive/'.$police->id)}}" class="btn btn-sm btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                      @else
                      <a href="{{URL::to('admin/police/account/active/'.$police->id)}}" class="btn btn-sm btn-info" title="Active"><i class="fa fa-thumbs-up"></i></a>
                      <a href="{{URL::to('admin/full_address/'.$police->id)}}" class="btn btn-sm btn-warning" title="view Address" ><i class="fa fa-eye"></i></a>

                @endif
               </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

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
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="">Patrick</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>

</html>