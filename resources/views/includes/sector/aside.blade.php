<aside id="sidebar" class="sidebar print-hidden">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('sector.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            @if(Auth::user()->role_id == 4)
            <a href="{{route('sector.view.report')}}">
              <i class="bi bi-circle"></i><span>View More</span>
            </a>
            @elseif(Auth::user()->role_id == 2)

            <a href="{{route('community.view.report')}}">
              <i class="bi bi-circle"></i><span>View More</span>
            </a>
            @endif
          </li>
          <li>
            <a href="{{route('sector.show.report')}}">
              <i class="bi bi-circle"></i><span>Find Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <!-- End Forms Nav -->
    </aside><!-- End Sidebar-->