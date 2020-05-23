<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
        <img src="{{asset(config('template.sidebar.logo_url') ?? 'admin/img/logo1.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{!! config('template.sidebar.logo_title') ??  "<b>Style</b>Tech"!!}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview"
                role="menu" data-accordion="false">
                <li class="nav-item has-treeview @if(request()->is('admin/settings/*')) menu-open @endif">
                    <a href="#" class="nav-link @if(request()->is('admin/settings/*')) active @endif">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>
                            Configurações
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.roles.index')}}"
                               class="nav-link @if(request()->is('admin/settings/roles*')) active @endif">
                                <i class="fas fa-user-tag nav-icon"></i>
                                <p>Funções</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.permissions.index')}}"
                               class="nav-link @if(request()->is('admin/settings/permissions*')) active @endif">
                                <i class="fas fa-user-lock nav-icon"></i>
                                <p>Permissões</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.users.index')}}"
                               class="nav-link @if(request()->is('admin/settings/users*')) active @endif">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

