@php use App\Models\Cell;use App\Models\District;use App\Models\Sector; @endphp
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Crime Report</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- third party css -->
    <link href="{{asset('libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <style type="text/css">
        @media print {
            .print-hidden {
                display: none !important;
            }

            @page {
                margin: 0;
                margin-top: 30mm;
            }

            body {
                margin: 0;
            }

            .sheet {
                margin: 0;
                overflow: hidden;
                position: relative;
                box-sizing: border-box;
                page-break-after: always;
            }

            .break-inside {
                break-inside: avoid;
            }

            #report-container {
                margin-top: -20mm;
            }

            body {
                width: 210mm;
                font-size: 18px;
            }

            body .sheet {
                width: 210mm;
                /* height: 296mm;
                zoom: 2.3;*/
                height: 100%;
                overflow: visible;
                -moz-transform: scale(2.3);
                -moz-transform-origin: 0 0;
            }

            .sheet.padding-10mm {
                padding: 1mm;
            }

            .sheet.padding-15mm {
                padding: 15mm;
            }

            .sheet.padding-20mm {
                padding: 20mm;
            }

            .sheet.padding-25mm {
                padding: 25mm;
            }

            button,
            input,
            select,
            textarea,
            .pagination,
            .toggle-wrap.nk-block-tools-toggle,
            .dropdown,
            .nk-menu-trigger,
            .d-print-none,
            .nk-footer,
            .nk-header {
                display: none !important;
            }

            .nk-sidebar + .nk-wrap,
            .nk-sidebar-overlay + .nk-wrap {
                padding-left: 0 !important;
            }

            .nk-header-fixed + .nk-content {
                /* margin-top: 0 !important; */
                padding: 0 !important;
            }
        }

        span[title="Resolved"] {
            color: green;
        }

        span[title="Pending"] {
            color: #0d6efd;
        }

        /* jQuery UI Datepicker Styles */
        /* states and images */
        .ui-icon {
            display: block;
            text-indent: -99999px;
            overflow: hidden;
            background-repeat: no-repeat;
        }

        /* Overlays */
        .ui-widget-overlay {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .ui-datepicker {
            position: relative;
            width: 170px;
            height: auto;
            padding: 0;
            display: none;
            margin: 20px 0 0 23px;


        }

        .ui-datepicker .ui-datepicker-header {
            position: relative;
            padding: .2em 0;
            background: #f8f8f8;

        }

        .ui-datepicker .ui-datepicker-prev,
        .ui-datepicker .ui-datepicker-next {
            position: absolute;
            top: 5px;
            width: 1.1em;
            height: .90em;
        }

        .ui-datepicker .ui-datepicker-prev {
            left: 2px;
            top: 7px;
            background: url(../img/datepickerArrow.png) top no-repeat;
        }

        .ui-datepicker .ui-datepicker-next {
            right: 2px;
            background: url(../img/datepickerArrow.png) bottom no-repeat;
        }

        .ui-datepicker .ui-datepicker-prev span,
        .ui-datepicker .ui-datepicker-next span {
            display: block;
            position: absolute;
            left: 50%;
            margin-left: -8px;
            top: 50%;
            margin-top: -8px;
        }

        .ui-datepicker .ui-datepicker-title {
            margin: 0 2.3em;
            line-height: 1.8em;
            text-align: center;
            font-size: 0.70em;
        }

        .ui-datepicker .ui-datepicker-title select {
            font-size: 1em;
            margin: 1px 0;
        }

        .ui-datepicker select.ui-datepicker-month,
        .ui-datepicker select.ui-datepicker-year {
            width: 45%;

        }

        .ui-datepicker table {
            width: 100%;
            font-size: .6em;
            border-collapse: collapse;
            margin: 0 0 .4em;
        }

        .ui-datepicker th {
            padding: .7em .3em;
            text-align: center;

            border: 0;
        }

        .ui-datepicker td {
            border: 0;
            padding: 1px;
        }

        .ui-datepicker td span,
        .ui-datepicker td a {
            display: block;
            padding: .2em;
            text-align: center;
            text-decoration: none;
        }

        .ui-datepicker .ui-datepicker-buttonpane {
            background-image: none;
            margin: .7em 0 0 0;
            padding: 0 .2em;
            border-left: 0;
            border-right: 0;
            border-bottom: 0;
        }

        .ui-datepicker .ui-datepicker-buttonpane button {
            float: right;
            margin: .5em .2em .4em;
            cursor: pointer;
            padding: .2em .6em .3em .6em;
            width: auto;
            overflow: visible;
        }

        .ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
            float: left;
        }

        /* Component containers
        ----------------------------------*/
        .ui-widget {

            font-size: 1.1em;

        }

        .ui-widget .ui-widget {
            font-size: 5em;
        }

        .ui-widget input,
        .ui-widget select,
        .ui-widget textarea,
        .ui-widget button {
            font-size: 1em;
        }

        .ui-widget-content {
            border: 1px solid #dddddd;
            color: #999999; /* Days Letter Color */
        }

        .ui-widget-content a {
            color: yellow;
        }

        .ui-widget-header {
            border-bottom: 1px solid #c5c5c5;
            color: #212020;
            font-weight: bold;
        }

        .ui-widget-header a {
            color: #ffffff;
        }

        /* Interaction states
        ----------------------------------*/
        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default {
            border: 1px solid #cccccc;
            background: #f6f6f6;
            color: #300808;
        }

        .ui-state-default a,
        .ui-state-default a:link,
        .ui-state-default a:visited {
            color: #999999;
            text-decoration: none;
        }

        .ui-state-hover,
        .ui-widget-content .ui-state-hover,
        .ui-widget-header .ui-state-hover,
        .ui-state-focus,
        .ui-widget-content .ui-state-focus,
        .ui-widget-header .ui-state-focus {

            background: #1ca3f4;
            color: #fff;
            text-align: center;
        }

        .ui-state-hover a,
        .ui-state-hover a:hover,
        .ui-state-hover a:link,
        .ui-state-hover a:visited,
        .ui-state-focus a,
        .ui-state-focus a:hover,
        .ui-state-focus a:link,
        .ui-state-focus a:visited {
            color: #c77405;
            text-decoration: none;
        }

        .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active {
            border: 1px solid #fbd850;
            color: white;
        }

        .ui-state-active a,
        .ui-state-active a:link,
        .ui-state-active a:visited {
            color: #eb8f00;
            text-decoration: none;
        }

        .ui-datepicker .ui-datepicker-prev:hover {
            background: transparent url(../img/datepickerArrow.png) top no-repeat;
        }

        .ui-datepicker .ui-datepicker-next {
            background: transparent url(../img/datepickerArrow.png) bottom no-repeat;
        }


        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>


</head>

<body>

<!-- ======= Header ======= -->
@include('includes.admin.header')
<!-- ======= Sidebar ======= -->
@include('includes.admin.aside')

<main id="main" class="main sheet">
    <div class="pagetitle">
        <h2 align="center">Crimes Report</h2>
    </div><!-- End Page Title -->
    </br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-end">
                            <div class="col-lg-12">
                                <form action="" method="GET">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="district">District</label>
                                            <select class="form-control" name="district" id="district">
                                                <option value="">Select District</option>
                                                @foreach( District::all() as $districtss)
                                                    <option
                                                        value="{{$districtss->district_name}}">{{$districtss->district_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="sector">Sector</label>
                                            <select class="form-control" name="sector" id="sector">
                                                <option value="">Select sector</option>
                                                @foreach( Sector::all() as $sectors)
                                                    <option
                                                        value="{{$sectors->sector_name}}">{{$sectors->sector_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cell">Cell</label>
                                            <select class="form-control" name="cell" id="cell">
                                                <option value="">Select Cell</option>
                                                @foreach( Cell::all() as $cells)
                                                    <option
                                                        value="{{$cells->cell_name}}">{{$cells->cell_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="type">Category</label>
                                            <select class="form-control " name="type" id="type">
                                                <option value="">Select Category</option>
                                                <option value="">Select Type</option>
                                                <option>Women Violent</option>
                                                <option>Sex Violent</option>
                                                <option>Accident</option>
                                                <option>Drugs</option>
                                                <option>Thieves</option>
                                                <option>Security Issues</option>
                                                <option>Kidnap</option>
                                                <option>Alcoholism</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="status">Status</label>
                                            <select class="form-control " name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option>Pending</option>
                                                <option>Resolved</option>
                                                <option>FollowUp</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="date">From</label>
                                            <input class="form-control" id="date" name="date" type="date"/>&nbsp;&nbsp;
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="datepicker">To</label>
                                            <input  class="form-control js--datePicke"
                                                    id="datepicker" name="to_date" type=""/>&nbsp
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="datepicker"> </label>
                                            <input type="submit" class="btn btn-success" value="Search" />


                                        </div>

                                    </div>
                                </form>
                            </br>
                            <h4 class="page-title selected-date text-center">
                                @if (request()->has('date') || request()->has('to_date'))
                                    <span style="">
                                                        {{$fromDate}} &nbsp; @isset($toDate)
                                            - &nbsp;  {{$toDate}}
                                        @endisset
                                                    </span>
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">


                    </br>
                    <!-- Table with stripped rows -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Report Type</th>
                            <th scope="col">Descriptions</th>
                            <th scope="col">Delivery To</th>
                            <th scope="col">Status</th>
                            <th scope="col">Comment</th>
                            <th scope="col">District</th>
                            <th scope="col">Sector</th>
                            <th scope="col">Cell</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{$report->report_title}}</td>
                                <td>{{\Illuminate\Support\Str::limit($report->descriptions, 65)}}</td>
                                <td>{{$report->delivery_to}}</td>
                                <td><span title="{{$report->report_status}}">{{$report->report_status}}</span></td>
                                <td>{{$report->comment_status ?? 'No Comment'}}</td>
                                <td>{{$report->district}}</td>
                                <td>{{$report->sector}}</td>
                                <td>{{$report->cell}}</td>
                                <td>{{$report->created_at}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                        <div CLASS="card-footer">
                            <button type="button" class="btn btn-info" onClick="window.print()">Print</button>


                        </div>
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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script>
    $(document).ready(function () {
        $("#datepicker").datepicker({maxDate: new Date()});
    });
</script>

<script src="{{asset('libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('libs/datatables/datatables.min.js')}}"></script>

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
