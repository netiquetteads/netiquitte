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
                                            {{ trans('cruds.affiliate.all') }} ({{ $AffiliateAllCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/active") }}" class="nav-link {{ request()->is("admin/affiliate/active") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.active') }} ({{ $AffiliateActiveCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/inactive") }}" class="nav-link {{ request()->is("admin/affiliate/inactive") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.inactive') }} ({{ $AffiliateInactiveCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/pending") }}" class="nav-link {{ request()->is("admin/affiliate/pending") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.pending') }} ({{ $AffiliatePendingCountSidebar ?? 0 }})
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url("admin/affiliate/suspended") }}" class="nav-link {{ request()->is("admin/affiliate/suspended") ? "active" : "" }}">

                                        <p>
                                            {{ trans('cruds.affiliate.suspended') }} ({{ $AffiliateSuspendedCountSidebar ?? 0 }})
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

