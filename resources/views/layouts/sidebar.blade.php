<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" href="#">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" aria-expanded="{{ request()->routeIs('courses.index') ? 'true' : 'false' }}" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->routeIs('courses.index') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li>
              <a class='nav-link {{ request()->routeIs('courses.index') ? 'active' : '' }}' href="{{ route('courses.index') }}">
                <i class="bi bi-circle"></i><span>List</span>
              </a>
            </li>
            <li>
              <a class='nav-link {{ request()->routeIs('courses.create') ? 'active' : '' }}' href="{{ route('courses.create') }}">
                <i class="bi bi-circle"></i><span>Add</span>
              </a>
            </li>
          </ul>
      </li><!-- End Forms Nav tenary condition-->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
            data-bs-target="#tables-nav" href="{{ route('categories.index') }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Category</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-heading">Settings</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#nav-roles" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Authorization</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="nav-roles" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('roles.index') }}">
              <i class="bi bi-circle"></i><span>Roles</span>
            </a>
          </li>
          <li>
            <a href="{{ route('permissions.index') }}">
              <i class="bi bi-circle"></i><span>Permission</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs(['users.index', 'users.create', 'users.edit']) ? 'active' : '' }}" href="{{ route('users.index') }}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside>
