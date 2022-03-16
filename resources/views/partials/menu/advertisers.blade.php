
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
                                            {{ trans('cruds.advertiser.active') }} ({{ $AdvertiserActiveCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/inactive") }}" class="nav-link {{ request()->is("admin/advertiser/inactive") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.inactive') }} ({{ $AdvertiserInactiveCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/pending") }}" class="nav-link {{ request()->is("admin/advertiser/pending") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.pending') }} ({{ $AdvertiserPendingCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/advertiser/suspended") }}" class="nav-link {{ request()->is("admin/advertiser/suspended") ? "active" : "" }}">
                                        
                                        <p>
                                            {{ trans('cruds.advertiser.suspended') }} ({{ $AdvertiserSuspendedCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                @endcan

