<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('police.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Request</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('police.view.insight')}}">
              <i class="bi bi-circle"></i><span>Insights</span>
            </a>
          </li>

      <li class="nav-item">
        <a class="nav-link " href="{{route('police.show_report')}}">
          <i class="bi bi-grid"></i>
          <span>Report</span>
        </a>
      </li><!-- End Dashboard Nav -->
        </ul>
      </li><!-- End Components Nav -->
      <!-- End Forms Nav -->
    </aside><!-- End Sidebar-->