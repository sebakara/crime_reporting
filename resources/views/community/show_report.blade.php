<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Crime Report</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../../assets/img/favicon.png" rel="icon">
  <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="../../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

  <!-- third party css -->
  <link href="../../../assets/libs/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
  <link href="../../../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
  <!-- third party css end -->

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
  @include('includes.community.header')
  <!-- ======= Sidebar ======= -->
  @include('includes.community.aside')

  <main id="main" class="main">
    <div class="pagetitle">
      <h3 align="center">Crimes Report Range Period</h3>
    </div><!-- End Page Title -->
</br>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
            <div class="col-lg-6" style="margin-left:320px">
            <form class="form-inline date-range-form" method="GET">
            <div class="input-group">
            <p style="padding-top:20px"><b>From &nbsp; </b></p> 
            <input style="max-width:25%;" class="form-control" id="dash-daterange" name="date" type="date" />&nbsp;&nbsp;
            <p style="padding-top:20px"><b>To &nbsp</b></p>
            <input style="max-width:25%;height:" class="form-control" id="dash-daterange2"  name="to_date" type="date" />&nbsp;&nbsp;
            <button type="" style="width:30%;" class="btn btn-primary ml-2">Search</button>
        </div>
</form>
</br>
<h4 class="page-title selected-date text-center" >
                                                @if (request()->has('date') || request()->has('to_date'))
                                                    <span style="">
                                                        {{$fromDate}} &nbsp; @isset($toDate) - &nbsp;  {{$toDate}}@endisset
                                                    </span>
                                                @endif
                                            </h4>
        </div>
</br>
              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Report Title</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Delivery To</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                  <tr>
                    <td>{{$report->report_title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($report->descriptions, 65)}}</td>
                    <td>{{$report->delivery_to}}</td>
                    <td class="btn btn-info">{{$report->report_status}}</td>
                    <td>{{$report->created_at}}</td>
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
      Designed by <a href="">Patrick</a>
    </div>
  </footer><!-- End Footer -->
 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
            $('#dash-daterange').flatpickr({
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                defaultDate: 'today'
            });
            $('#dash-daterange2').flatpickr({
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                defaultDate: 'today'
            });
            </script>

<script src="../../../assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="../../../assets/libs/datatables/datatables.min.js"></script>

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