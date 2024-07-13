  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="{{ menuNoChildren('dashboard', true) }}" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>{{ transWord('Dashboard') }}</span>
        </a>
      </li>

      {{-- Users And Roles --}}
        @can('show_users')
            <li class="nav-item">
                <a class="{{ parentMenuCollapse('users', true) }}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>{{ transWord('Users') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="{{ parentMenuActive('users', true) }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('users.all') }}" class="{{ childMenuActive('users/users', true) }}">
                            <i class="bi bi-circle"></i><span>{{ transWord('Users') }}</span>
                        </a>
                    </li>
                    @can('show_roles')
                        <li>
                            <a href="{{ route('roles.all') }}" class="{{ Request::is('en/users/roles/*') || Request::is('ar/users/roles/*') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>{{ transWord('Roles') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
      {{-- ./Users And Roles  --}}

      {{-- Translation --}}
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            @can('show_translates')
                <li class="nav-item">
                    <a class="{{ menuNoChildren('translation', true) }}" href="{{ route('translates-edit') }}">
                            <i class="bi bi-translate"></i>
                            <span>{{ transWord('Translation') }}</span>
                    </a>
                </li>
            @endcan
        @endif
      {{-- ./Translation --}}

      {{-- Departments --}}
        @can('show_departments')
            <li class="nav-item">
                <a class="{{ menuNoChildren('departments', true) }}" href="{{ route('departments.all') }}">
                        <i class="bi bi-collection-fill"></i>
                        <span>{{ transWord('Departments') }}</span>
                </a>
            </li>
        @endcan
      {{-- ./Departments --}}

      {{-- Employees --}}
        @can('show_employees')
            <li class="nav-item">
                <a class="{{ menuNoChildren('employees', true) }}" href="{{ route('employees.all') }}">
                        <i class="bi bi-person-square"></i>
                        <span>{{ transWord('Employees') }}</span>
                </a>
            </li>
        @endcan
      {{-- ./Employees --}}

      {{-- Tasks --}}
        @if (auth()->user()->id != 1)
          @can('show_tasks')
              <li class="nav-item">
                  <a class="{{ menuNoChildren('tasks', true) }}" href="{{ route('tasks.all') }}">
                          <i class="bi bi-list-task"></i>
                          <span>{{ transWord('Tasks') }}</span>
                  </a>
              </li>
          @endcan
        @endif
      {{-- ./Tasks --}}

      {{-- Settings --}}
        @can('update_settings')
            <li class="nav-item">
                <a class="{{ menuNoChildren('settings', true) }}" href="{{ route('settings-edit') }}">
                        <i class="bi bi-gear"></i>
                        <span>{{ transWord('Settings') }}</span>
                </a>
            </li>
        @endcan
      {{-- ./Settings --}}
    </ul>

  </aside><!-- End Sidebar-->
