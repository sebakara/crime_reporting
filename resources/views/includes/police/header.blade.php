@php
$pending       = DB::table('reports')
                          ->where('delivery_to',Auth::user()->name)
                          ->where('report_status','Pending')
                          ->get();

$pending_count = $pending->count();
@endphp

@php
$user_address = DB::table('users')
                      ->join('addresses','users.id','addresses.user_id')
                      ->select('users.*','addresses.*')
                      ->where('users.id',Auth::user()->id)
                      ->first();
@endphp
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">Herald</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">{{$pending_count}}</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

          @foreach($pending as $report)
            <li class="message-item">
                <div>
                  <p class="btn btn-info"><font style="color:white;font-size:13px">{{$report->report_title}}</font></p>
                  <p>{{\Illuminate\Support\Str::limit($report->descriptions, 40)}}</p>
                </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @endforeach
            <li class="dropdown-footer">
            <a href="{{route('police.view.message')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View More</span></a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="../../../assets/img/user_icon.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ucfirst(Auth::user()->username)}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6>{{ucfirst(Auth::user()->name)}}</h6>
              </br>
              <span>
              <i>{{$user_address->district}}  {{$user_address->sector}} {{$user_address->cell}} </i>
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('police.change.password')}}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <i class="fa fa-user-times"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->