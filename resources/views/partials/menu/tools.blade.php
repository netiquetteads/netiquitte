                {{-- @can('tool_access') --}}
                <li class="nav-item has-treeview {{ request()->is("admin/tools*") ? "menu-open" : "" }} {{ request()->is("admin/calendar") ? "menu-open" : "" }} {{ request()->is("admin/messenger") ? "menu-open" : "" }}   {{ request()->is("admin/tasks*") ? "menu-open" : "" }} {{ request()->is("admin/tasks-calendars*") ? "menu-open" : "" }}">

                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-cogs">

                        </i>
                        <p>
                            {{ trans('cruds.tool.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @include('partials.menu.tasks')

                        <li class="nav-item">
                            <a href="{{ route("admin.calendar") }}" class="nav-link {{ request()->is("admin/calendar") || request()->is("admin/calendar/*") ? "active" : "" }}">
                                <i class="fas fa-fw fa-calendar nav-icon"> </i>
                                <p>
                                    {{ trans('global.calendar') }}
                                </p>
                            </a>
                        </li>
                        @php($unread = \App\Models\QaTopic::unreadCount())
                            <li class="nav-item">
                                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                                    <i class="fa-fw fa fa-envelope nav-icon"> </i>
                                    <p>{{ trans('global.messages') }}</p>
                                    @if($unread > 0)
                                        <strong>( {{ $unread }} )</strong>
                                    @endif
        
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                                <li class="nav-item">
                                    <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }} nav-link" href="{{ route("admin.team-members.index") }}">
                                        <i class="fa-fw fa fa-users nav-icon"> </i>
                                        <p>
                                            {{ trans("global.team-members") }}
                                        </p>
                                    </a>
                                </li>
                            @endif
                    </ul>
                </li>
                {{-- @endcan --}}
