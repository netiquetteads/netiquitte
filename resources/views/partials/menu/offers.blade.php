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
                                        {{ trans('cruds.offer.all') }} ({{ $OfferAllCountSidebar ?? 0 }})
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/active") }}" class="nav-link {{ request()->is("admin/offer/active") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.active') }} ({{ $OfferActiveCountSidebar ?? 0 }})
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/paused") }}" class="nav-link {{ request()->is("admin/offer/paused") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.paused') }} ({{ $OfferPausedCountSidebar ?? 0 }})
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/pending") }}" class="nav-link {{ request()->is("admin/offer/pending") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.pending') }} ({{ $OfferPendingCountSidebar ?? 0 }})
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url("admin/offer/deleted") }}" class="nav-link {{ request()->is("admin/offer/deleted") ? "active" : "" }}">
                                    
                                    <p>
                                        {{ trans('cruds.offer.deleted') }} ({{ $OfferDeletedCountSidebar ?? 0 }})
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan