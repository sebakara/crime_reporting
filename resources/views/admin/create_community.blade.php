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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
              <form action="{{route('admin.store.community')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <input type="text" name="name" placeholder="Enter Full Name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="text" name="phone_number" placeholder="Enter Phone Number" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="text" name="email" placeholder="Enter Email Address" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="file" name="profile_image" placeholder="Choose Profile" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
              <div class="col-sm-10">
                <select class="form-select" name="district_id" data-placeholder="Select District">
                  <option label="Choose District"></option>
                  @foreach($districts as $district)
                  <option value="{{$district->id}}">{{$district->district_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
             
             <div class="col-sm-10">
               <select class="form-select" name="sector_id" data-placeholder="Select Sector name">

               </select>
             </div>
           </div>

           <div class="row mb-3">
             
             <div class="col-sm-10">
               <select class="form-select" name="cell_id" data-placeholder="Select Cell name">

               </select>
             </div>
           </div>

                <div class="row mb-3">
                 
                  <div class="col-sm-10">
                    <input type="text" name="username" placeholder="Enter Username" class="form-control">
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
                    <button type="submit" class="btn btn-primary">Create Account</button>
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
  <!-- Vendor JS Files -->
  <script type="text/javascript">
      
      $(document).ready(function(){
     $('select[name="district_id"]').on('change',function(){
          var district_id = $(this).val();
          //console.log(district_id);
          if (district_id) {
            
            $.ajax({
              url: "{{ url('/admin/get/sectorname/') }}/"+district_id,
              type:"GET",
              dataType:"json",
              success:function(data) {
              var d =$('select[name="sector_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="sector_id"]').append('<option value="'+ value.id + '">' + value.sector_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>

 <script type="text/javascript">
      
      $(document).ready(function(){
     $('select[name="sector_id"]').on('change',function(){
          var sector_id = $(this).val();
          if (sector_id) {
            
            $.ajax({
              url: "{{ url('/admin/get/cellname/') }}/"+sector_id,
              type:"GET",
              dataType:"json",
              success:function(data) {
              var d =$('select[name="cell_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="cell_id"]').append('<option value="'+ value.id + '">' + value.cell_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>

</body>

</html>