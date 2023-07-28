<html>
  <head>
    <meta charset="utf-8">
    <title>Crime Report</title>

  <!-- Google Fonts -->
  <link href="../../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">


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
  <h3 align="center" style="font-size:20px;">Report</h3>
  <table class="table datatable">
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
                  <tr>
                    <td>{{$report->report_title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($report->descriptions, 65)}}</td>
                    <td>{{$report->delivery_to}}</td>
                    <td class="btn btn-info">{{$report->report_status}}</td>
                    <td>{{$report->created_at}}</td>
                  </tr>
                 
                </tbody>
              </table>
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