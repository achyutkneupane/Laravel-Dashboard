<div class="offcanvas-md offcanvas-start p-3 text-white fixed-top vh-100 overflow-y-scroll"
     data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" aria-labelledby="sidebarLabel" id="sidebar"
     style="background: #ffffff url('{{ asset('images/sidebg.svg') }}') no-repeat center; z-index: 1100;">
    <div class="d-flex justify-content-between text-center justify-content-md-center">
        <div class="d-flex justify-content-center align-items-center gap-2">
            <h2 class="text-uppercase my-auto">
                {{ config('app.name', 'Laravel Dashboard') }}
            </h2>
        </div>
        <div class="d-block d-md-none">
            <button type="button" class="btn-close btn-close-white"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar"
                    aria-controls="sidebar"
                    aria-label="Close"
            ></button>
        </div>
    </div>
    <hr/>
    <ul class="nav nav-pills flex-column mb-auto gap-0 flex-nowrap">
        @foreach(config('dashboard.sidebar') as $item)
            @php
                $subRoutes = [];
                $noMenuRoutes = [];
                if(!array_key_exists('route', $item)) {
                    $subRoutes = [];
                    foreach($item['submenu'] as $subItem) {
                        $subRoutes[] = config('dashboard.prefix').$subItem['route'];
                    }
                }
                $noMenuRoutes = [];
                if(array_key_exists('noMenuRoutes', $item)) {
                    foreach($item['noMenuRoutes'] as $noMenuRoute) {
                        $noMenuRoutes[] = config('dashboard.prefix').$noMenuRoute;
                    }
                }
                $slug = str_replace(' ', '-', $item['title']);

                $guards = [];
                if(array_key_exists('guard', $item)) {
                    $guards[] = $item['guard'];
                }
                if(array_key_exists('submenu', $item)) {
                    foreach($item['submenu'] as $subItem) {
                        if(array_key_exists('guard', $subItem)) {
                            $guards[] = $subItem['guard'];
                        }
                    }
                }
            @endphp
            @if((array_key_exists('guard', $item) && auth()->user()->canAny($guards)) || !array_key_exists('guard', $item))
                <li class="nav-item py-1">
                    @if(!array_key_exists('route', $item))
                        <a class="nav-link @if(in_array(Route::currentRouteName(), $subRoutes) || in_array(Route::currentRouteName(), $noMenuRoutes)) active @endif p-1 px-3 pe-auto user-select-none"
                           aria-current="page" data-bs-toggle="collapse" href="#{{ $slug }}Collapse" role="button"
                           aria-expanded="@if(in_array(Route::currentRouteName(), $subRoutes) || in_array(Route::currentRouteName(), $noMenuRoutes)) true @else false @endif"
                           aria-controls="#{{ $slug }}Collapse">
                            @else
                                <a href="{{ route(config('dashboard.prefix').$item['route']) }}"
                                   class="nav-link @if(request()->routeIs(config('dashboard.prefix').$item['route'])) active @endif"
                                   aria-current="page">
                                    @endif

                                    <div class="d-flex align-items-center gap-2">
                                        @if(config('dashboard.icons') == 'svg')
                                            @if(array_key_exists('route', $item))
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600"
                                                     fill="@if(request()->routeIs(config('dashboard.prefix').$item['route'])) #252834 @else #ffffff @endif"
                                                     style="width: 30px; height: 30px;">
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600"
                                                             fill="@if(in_array(Route::currentRouteName(), $subRoutes) || in_array(Route::currentRouteName(), $noMenuRoutes)) #252834 @else white @endif"
                                                             style="width: 25px; height: 25px; padding:1px;" class="">
                                                            @endif

                                                            <path d="{{ $item['icon'] }}"/>

                                                            @if(array_key_exists('route', $item))
                                                        </svg>
                                                        @else
                                                </svg>
                                            @endif
                                        @elseif(config('dashboard.icons') == 'font-awesome')
                                            <i class="fas fa-{{ $item['icon'] }} fa-fw"></i>
                                        @endif
                                        <span class="routeText">{{ $item['title'] }}</span>
                                    </div>

                                    @if(array_key_exists('route', $item))
                                </a>
                                @else
                        </a>
                    @endif

                    @if(array_key_exists('submenu', $item))
                        <div
                                class="collapse @if(in_array(Route::currentRouteName(), $subRoutes) || in_array(Route::currentRouteName(), $noMenuRoutes)) show @endif"
                                id="{{ $slug }}Collapse">
                            <ul class="d-flex flex-column align-items-end mt-2 pb-0 nav nav-pills">
                                @foreach($item['submenu'] as $index => $subItem)
                                    @if((array_key_exists('guard', $subItem) && auth()->user()->can($subItem['guard'])) || !array_key_exists('guard', $subItem))
                                        <li class="nav-item" style="width: 90%;">
                                            <a href="{{ route(config('dashboard.prefix').$subItem['route']) }}"
                                               class="nav-link @if(request()->routeIs(config('dashboard.prefix').$subItem['route'])) active @endif p-1 px-2"
                                               aria-current="page">
                                                <div class="d-flex align-items-center gap-2">
                                                    @if(config('dashboard.icons') == 'svg')
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750 750"
                                                             fill="@if(request()->routeIs($subItem['route'])) #252834 @else #ffffff @endif"
                                                             style="width: 30px; height: 30px;">
                                                            <path d="{{ $subItem['icon'] }}"/>
                                                        </svg>
                                                    @elseif(config('dashboard.icons') == 'font-awesome')
                                                        <i class="fas fa-{{ $subItem['icon'] }} fa-fw"></i>
                                                    @endif
                                                    <span class="routeText">{{ $subItem['title'] }}</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
                <hr class="my-1"/>
            @endcan
        @endforeach
    </ul>
    <ul class="nav nav-pills flex-column mb-0">
        <li class="nav-item" id="hoverHighlight" style="height: 60px;">
            <a href="{{ route(config('dashboard.prefix').'logout') }}" class="nav-link py-2 px-3" aria-current="page">
                <div class="d-flex align-items-center gap-2">
                    @if(config('dashboard.icons') == 'svg')
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 750 750" fill="#ffffff" id="logoutIcon"
                             style="width: 30px; height: 30px;">
                            <path
                                    d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/>
                        </svg>
                    @elseif(config('dashboard.icons') == 'font-awesome')
                        <i class="fas fa-sign-out-alt fa-fw"></i>
                    @endif
                    <span>Logout</span>
                </div>
            </a>
        </li>
    </ul>
</div>

@push('scripts')
    <script>

        const hoverHighlight = document.getElementById('hoverHighlight');

        hoverHighlight.addEventListener('mouseover', () => {
            hoverHighlight.firstElementChild.classList.add('active');
            document.getElementById('logoutIcon').setAttribute('fill', '#252834');
        });

        hoverHighlight.addEventListener('mouseout', () => {
            hoverHighlight.firstElementChild.classList.remove('active');
            document.getElementById('logoutIcon').setAttribute('fill', '#ffffff');
        });

        const activeNavLink = document.querySelector('.nav-link.active');
        const activeNavLinkOffset = activeNavLink.offsetTop;
        const sideBarHeight = document.getElementById('sidebar').offsetHeight;
        if (activeNavLinkOffset > sideBarHeight - 200) {
            document.getElementById('sidebar').scrollTop = activeNavLinkOffset - (sideBarHeight - 400);
        }
    </script>
@endpush
