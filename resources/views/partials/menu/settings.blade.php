                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/account-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/labels*") ? "menu-open" : "" }} {{ request()->is("admin/payment-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/payment-methods*") ? "menu-open" : "" }} {{ request()->is("admin/payment-method-type*") ? "menu-open" : "" }} {{ request()->is("admin/task-statuses*") ? "menu-open" : "" }} ">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                              @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                           Task {{ trans('cruds.taskStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
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
                            @can('payment_method_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payment-method-type.index") }}" class="nav-link {{ request()->is("admin/payment-method-type") || request()->is("admin/payment-method-type/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-cc-apple-pay">

                                        </i>
                                        <p>
                                            {{ trans('cruds.paymentMethodType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
