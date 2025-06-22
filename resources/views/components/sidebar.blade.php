<aside class="sidebar {{ empty($company_settings['site_transparent']) || $company_settings['site_transparent'] == 'on' ? 'transprent-bg' : '' }}">
    <button type="button" class="sidebar-close-btn !mt-4">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>

    {{-- Sidebar Logo --}}
    <div>
        <a href="{{ route('home') }}" class="sidebar-logo">
            <img src="{{ get_file(sidebar_logo()) }}?{{ time() }}" alt="site logo" class="light-logo">
            <img src="{{ get_file(sidebar_logo()) }}?{{ time() }}" alt="site logo" class="dark-logo">
            <img src="{{ get_file(sidebar_logo()) }}?{{ time() }}" alt="site logo" class="logo-icon">
        </a>
    </div>

    @php
        $sidebarMenu = getMenu();
    @endphp

    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            @foreach($sidebarMenu as $category)
                <li class="sidebar-menu-group-title">
                    {{ $category['title'] }}
                </li>
                @foreach($category['children'] as $menu)
                    @if(count($menu['children']))
                        <li class="dropdown">
                            <a href="javascript:void(0)">
                                @if(!empty($menu['icon']))
                                    <iconify-icon icon="{{ $menu['icon'] }}" class="menu-icon"></iconify-icon>
                                @endif
                                <span>{{ $menu['title'] }}</span>
                            </a>
                            <ul class="sidebar-submenu">
                                @foreach($menu['children'] as $child)
                                    <li>
                                        <a href="{{ $child['route'] ? route($child['route']) : 'javascript:void(0)' }}">
                                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                            {{ $child['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ $menu['route'] ? route($menu['route']) : 'javascript:void(0)' }}">
                                @if(!empty($menu['icon']))
                                    <iconify-icon icon="{{ $menu['icon'] }}" class="menu-icon"></iconify-icon>
                                @endif
                                <span>{{ $menu['title'] }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </div>


</aside>
