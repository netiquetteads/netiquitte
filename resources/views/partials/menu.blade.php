<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/teams*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('affiliate_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/affiliates*") ? "menu-open" : "" }} {{ request()->is("admin/affiliate*") ? "menu-open" : "" }}  {{ request()->is("admin/balances*") ? "menu-open" : "" }}">
                        <a href="{{ route("admin.affiliates.index") }}" class="nav-link nav-dropdown-toggle {{ request()->is("admin/affiliates") || request()->is("admin/affiliate*") ? "active" : "" }} || {{ request()->is("admin/balances*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-circle">

                            </i>
                            <p>
                                {{ trans('cruds.affiliate.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route("admin.affiliates.index") }}" class="nav-link {{ request()->is("admin/affiliates") || request()->is("admin/affiliates") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.affiliate.all') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/active") }}" class="nav-link {{ request()->is("admin/affiliate/active") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.active') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/inactive") }}" class="nav-link {{ request()->is("admin/affiliate/inactive") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.inactive') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/suspended") }}" class="nav-link {{ request()->is("admin/affiliate/suspended") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.suspended') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.balances.index") }}" class="nav-link {{ request()->is("admin/balances") || request()->is("admin/balances/*") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.balance.title') }}
                                        </p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                @endcan
                @can('advertiser_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/advertiser*") ? "menu-open" : "" }}">
                        <a href="{{ route("admin.advertisers.index") }}" class="nav-link nav-dropdown-toggle {{ request()->is("admin/advertisers") || request()->is("admin/advertisers/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-circle">

                            </i>
                            <p>
                                {{ trans('cruds.advertiser.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/active") }}" class="nav-link {{ request()->is("admin/advertiser/active") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.active') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/inactive") }}" class="nav-link {{ request()->is("admin/advertiser/inactive") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.inactive') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/pending") }}" class="nav-link {{ request()->is("admin/advertiser/pending") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.pending') }}
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/suspended") }}" class="nav-link {{ request()->is("admin/advertiser/suspended") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.suspended') }}
                                        </p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                @endcan
                @can('offer_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/offers*") ? "menu-open" : "" }} {{ request()->is("admin/offer*") ? "menu-open" : "" }}">
                        <a href="{{ route("admin.offers.index") }}" class="nav-link nav-dropdown-toggle {{ request()->is("admin/offers") || request()->is("admin/offers/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-laptop">

                            </i>
                            <p>
                                {{ trans('cruds.offer.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url("admin/offers") }}" class="nav-link {{ request()->is("admin/offers") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.all') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/active") }}" class="nav-link {{ request()->is("admin/offer/active") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.active') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/paused") }}" class="nav-link {{ request()->is("admin/offer/paused") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.paused') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/pending") }}" class="nav-link {{ request()->is("admin/offer/pending") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.pending') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/deleted") }}" class="nav-link {{ request()->is("admin/offer/deleted") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.deleted') }}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                {{-- @can('balance_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.balances.index") }}" class="nav-link {{ request()->is("admin/balances") || request()->is("admin/balances/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-dollar-sign">

                            </i>
                            <p>
                                {{ trans('cruds.balance.title') }}
                            </p>
                        </a>
                    </li>
                @endcan --}}
                @can('mail_room_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/mail-rooms*") ? "menu-open" : "" }} {{ request()->is("admin/templates*") ? "menu-open" : "" }}">
                        <a href="{{ route("admin.mail-rooms.index") }}" class="nav-link nav-dropdown-toggle {{ request()->is("admin/mail-rooms") || request()->is("admin/mail-rooms/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-at">

                            </i>
                            <p>
                                {{ trans('cruds.mailRoom.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('template_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.templates.index") }}" class="nav-link {{ request()->is("admin/templates") || request()->is("admin/templates/*") ? "active" : "" }}">
                                    {{-- <i class="fa-fw nav-icon far fa-envelope">
        
                                    </i> --}}
                                    <p>
                                        {{ trans('cruds.template.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        </ul>
                    </li>
                @endcan
                
                @can('tool_access')
                <li class="nav-item has-treeview {{ request()->is("admin/tools*") ? "menu-open" : "" }} {{ request()->is("admin/system-calendar") ? "menu-open" : "" }} {{ request()->is("admin/messenger") ? "menu-open" : "" }}">
                    <a href="{{ route("admin.mail-rooms.index") }}" class="nav-link nav-dropdown-toggle {{ request()->is("admin/mail-rooms") || request()->is("admin/mail-rooms/*") ? "active" : "" }}">
                        <i class="fa-fw nav-icon fas fa-cogs">

                        </i>
                        <p>
                            {{ trans('cruds.tool.title') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                                {{-- <i class="fas fa-fw fa-calendar nav-icon">
        
                                </i> --}}
                                <p>
                                    {{ trans('global.systemCalendar') }}
                                </p>
                            </a>
                        </li>
                        @php($unread = \App\Models\QaTopic::unreadCount())
                            <li class="nav-item">
                                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                                    {{-- <i class="fa-fw fa fa-envelope nav-icon">
        
                                    </i> --}}
                                    <p>{{ trans('global.messages') }}</p>
                                    @if($unread > 0)
                                        <strong>( {{ $unread }} )</strong>
                                    @endif
        
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                                <li class="nav-item">
                                    <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }} nav-link" href="{{ route("admin.team-members.index") }}">
                                        <i class="fa-fw fa fa-users nav-icon">
                                        </i>
                                        <p>
                                            {{ trans("global.team-members") }}
                                        </p>
                                    </a>
                                </li>
                            @endif
                    </ul>
                </li>
                @endcan
                
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/account-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/labels*") ? "menu-open" : "" }} {{ request()->is("admin/payment-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/payment-methods*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('account_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.account-statuses.index") }}" class="nav-link {{ request()->is("admin/account-statuses") || request()->is("admin/account-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.accountStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('label_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.labels.index") }}" class="nav-link {{ request()->is("admin/labels") || request()->is("admin/labels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.label.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payment-statuses.index") }}" class="nav-link {{ request()->is("admin/payment-statuses") || request()->is("admin/payment-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.paymentStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_method_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payment-methods.index") }}" class="nav-link {{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-cc-apple-pay">

                                        </i>
                                        <p>
                                            {{ trans('cruds.paymentMethod.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>