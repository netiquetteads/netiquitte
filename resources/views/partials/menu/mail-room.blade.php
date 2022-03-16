                @can('mail_room_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/templates*") ? "menu-open" : "" }} {{ request()->is("admin/campaigns*") ? "menu-open" : "" }} {{ request()->is("admin/campaign-results*") ? "menu-open" : "" }} {{ request()->is("admin/results-trackings*") ? "menu-open" : "" }} {{ request()->is("admin/subscribers*") ? "menu-open" : "" }} {{ request()->is("admin/subscriptions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
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
                                        <i class="fa-fw nav-icon far fa-envelope">

                                        </i>
                                        <p>
                                            {{ trans('cruds.template.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('campaign_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.campaigns.index") }}" class="nav-link {{ request()->is("admin/campaigns") || request()->is("admin/campaigns/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon far fa-envelope">

                                    </i>
                                    <p>
                                        {{ trans('cruds.campaign.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('subscriber_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.unsubscribers.index") }}" class="nav-link {{ request()->is("admin/unsubscribers") || request()->is("admin/unsubscribers/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-user-check">

                                    </i>
                                    <p>
                                        {{ trans('cruds.unsubscribers.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                            {{-- @can('campaign_result_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.campaign-results.index") }}" class="nav-link {{ request()->is("admin/campaign-results") || request()->is("admin/campaign-results/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-history">

                                        </i>
                                        <p>
                                            {{ trans('cruds.campaignResult.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('results_tracking_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.results-trackings.index") }}" class="nav-link {{ request()->is("admin/results-trackings") || request()->is("admin/results-trackings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-exchange-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.resultsTracking.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('subscriber_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.subscribers.index") }}" class="nav-link {{ request()->is("admin/subscribers") || request()->is("admin/subscribers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.subscriber.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('subscription_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.subscriptions.index") }}" class="nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-check-double">

                                        </i>
                                        <p>
                                            {{ trans('cruds.subscription.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan --}}
                        </ul>
                    </li>
                @endcan

