<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Create Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.account.police')}}">
              <i class="bi bi-circle"></i><span>Police</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.account.community')}}">
              <i class="bi bi-circle"></i><span>CPC</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Manage Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.manage.police')}}">
              <i class="bi bi-circle"></i><span>Police</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.manage.community')}}">
              <i class="bi bi-circle"></i><span>CPC</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.show_report')}}">
          <i class="bi bi-grid"></i>
          <span>Report</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <!-- End Forms Nav -->
    </aside><!-- End Sidebar-->