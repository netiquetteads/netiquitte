@can('task_management_access')
    @can('task_access')
        <li class="nav-item">
            <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                <i class="fa-fw nav-icon far fa-check-square"></i>
                <p>
                    {{ trans('cruds.task.title') }}
                </p>
            </a>
        </li>
    @endcan
    @can('tasks_calendar_access')
        <li class="nav-item">
            <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                <i class="fa-fw nav-icon fas fa-calendar">
                </i>
                <p>
                   Tasks {{ trans('cruds.tasksCalendar.title') }}
                </p>
            </a>
        </li>
    @endcan
@endcan
