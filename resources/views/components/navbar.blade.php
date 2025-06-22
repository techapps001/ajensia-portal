<div class="navbar-header border-b border-neutral-200 dark:border-neutral-600">
    <div class="flex items-center justify-between">
        <div class="col-auto">
            <div class="flex flex-wrap items-center gap-[16px]">
                <button type="button" class="sidebar-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon non-active"></iconify-icon>
                    <iconify-icon icon="iconoir:arrow-right" class="icon active"></iconify-icon>
                </button>
                <button type="button" class="sidebar-mobile-toggle d-flex !leading-[0]">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon !text-[30px]"></iconify-icon>
                </button>
                <form class="navbar-search">
                    <input type="text" name="search" placeholder="Search">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>

            </div>
        </div>
        <div class="col-auto">
            <div class="flex flex-wrap items-center gap-3">
                <button type="button" id="theme-toggle" class="w-10 h-10 bg-neutral-200 dark:bg-neutral-700 dark:text-white rounded-full flex justify-center items-center">
                    <span id="theme-toggle-dark-icon" class="hidden">
                        <i class="ri-sun-line"></i>
                    </span>
                    <span id="theme-toggle-light-icon" class="hidden">
                        <i class="ri-moon-line"></i>
                    </span>
                </button>

                <!-- Language Dropdown Start  -->
                <div class="hidden sm:inline-block">
                    <button data-dropdown-toggle="dropdownInformation" class="has-indicator w-10 h-10 bg-neutral-200 dark:bg-neutral-700 dark:text-white rounded-full flex justify-center items-center" type="button">
                        <img src="{{ asset('assets/images/lang-flag.png') }}" alt="image" class="w-6 h-6 object-cover rounded-full">
                    </button>

                    <div id="dropdownInformation" class="z-10 hidden bg-white dark:bg-neutral-700 rounded-lg shadow-lg dropdown-menu-sm p-3">
                        <div class="py-3 px-4 rounded-lg bg-primary-50 dark:bg-primary-600/25 mb-4 flex items-center justify-between gap-2">
                            <div>
                                <h6 class="text-lg text-neutral-900 font-semibold mb-0">{{ __('Choose Your Language') }}</h6>
                            </div>
                        </div>

                        <div class="max-h-[400px] overflow-y-auto scroll-sm pe-2">
                            <div class="mt-4 flex flex-col gap-4">
                                @foreach (languages() as $key => $language)
                                    <div class="form-check style-check flex items-center justify-between">
                                        <label class="form-check-label line-height-1 font-medium text-secondary-light" for="lang-{{ $key }}">
                                            <span class="text-black hover-bg-transparent hover-text-primary flex items-center gap-3">
                                                {{-- Optional: Use dynamic flag logic or match static flags --}}
                                                <img src="{{ asset('assets/images/flags/' . $key . '.png') }}" onerror="this.src='{{ asset('assets/images/lang-flag.png') }}'" alt="{{ $language }}" class="w-9 h-9 bg-success-subtle text-success-600 rounded-full shrink-0">
                                                <span class="text-base font-semibold mb-0">{{ Str::ucfirst($language) }}</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input rounded-full" name="language" type="radio" id="lang-{{ $key }}" value="{{ $key }}" onchange="window.location.href='{{ route('lang.change', $key) }}'" @if($key == getActiveLanguage()) checked @endif>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if (Auth::user()->type == 'super admin')
                            <div class="border-t pt-3 mt-4">
                                @permission('language create')
                                    <a href="#" data-url="{{ route('create.language') }}"
                                        class="text-primary text-sm font-medium inline-block mb-2" data-ajax-popup="true"
                                        data-title="{{ __('Create New Language') }}">
                                        {{ __('Create Language') }}
                                    </a><br>
                                @endpermission
                                @permission('language manage')
                                    <a href="{{ route('lang.index', [Auth::user()->lang]) }}"
                                        class="text-primary text-sm font-medium inline-block">
                                        {{ __('Manage Languages') }}
                                    </a>
                                @endpermission
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Language Dropdown End  -->
                <!-- Message Dropdown Start  -->
                <button data-dropdown-toggle="dropdownMessage" class="has-indicator w-10 h-10 bg-neutral-200 dark:bg-neutral-700 rounded-full flex justify-center items-center" type="button">
                    <iconify-icon icon="mage:email" class="text-neutral-900 dark:text-white text-xl"></iconify-icon>
                </button>
                <div id="dropdownMessage" class="z-10 hidden bg-white dark:bg-neutral-700 rounded-2xl overflow-hidden shadow-lg max-w-[394px] w-full">
                    <div class="py-3 px-4 rounded-lg bg-primary-50 dark:bg-primary-600/25 m-4 flex items-center justify-between gap-2">
                        <h6 class="text-lg text-neutral-900 font-semibold mb-0">Messaage</h6>
                        <span class="w-10 h-10 bg-white dark:bg-neutral-600 text-primary-600 dark:text-white font-bold flex justify-center items-center rounded-full">05</span>
                    </div>
                    <div class="scroll-sm !border-t-0">
                        <div class="max-h-[400px] overflow-y-auto">
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-3.png') }}" alt="Joseph image">
                                        <span class="absolute end-[2px] bottom-[2px] w-2.5 h-2.5 bg-success-500 border border-white rounded-full dark:border-gray-600"></span>
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Kathryn Murphy</h6>
                                        <p class="mb-0 text-sm line-clamp-1">hey! there i'm...</p>
                                    </div>
                                </div>
                                <div class="shrink-0 flex flex-col items-end gap-1">
                                    <span class="text-sm text-neutral-500">12:30 PM</span>
                                    <span class="w-4 h-4 text-xs bg-warning-600 text-white rounded-full flex justify-center items-center">8</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-4.png') }}" alt="Joseph image">
                                        <span class="absolute end-[2px] bottom-[2px] w-2.5 h-2.5 bg-success-500 border border-white rounded-full dark:border-gray-600"></span>
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Kathryn Murphy</h6>
                                        <p class="mb-0 text-sm line-clamp-1">hey! there i'm...</p>
                                    </div>
                                </div>
                                <div class="shrink-0 flex flex-col items-end gap-1">
                                    <span class="text-sm text-neutral-500">12:30 PM</span>
                                    <span class="w-4 h-4 text-xs bg-warning-600 text-white rounded-full flex justify-center items-center">8</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-5.png') }}" alt="Joseph image">
                                        <span class="absolute end-[2px] bottom-[2px] w-2.5 h-2.5 bg-success-500 border border-white rounded-full dark:border-gray-600"></span>
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Kathryn Murphy</h6>
                                        <p class="mb-0 text-sm line-clamp-1">hey! there i'm...</p>
                                    </div>
                                </div>
                                <div class="shrink-0 flex flex-col items-end gap-1">
                                    <span class="text-sm text-neutral-500">12:30 PM</span>
                                    <span class="w-4 h-4 text-xs bg-warning-600 text-white rounded-full flex justify-center items-center">8</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-6.png') }}" alt="Joseph image">
                                        <span class="absolute end-[2px] bottom-[2px] w-2.5 h-2.5 bg-success-500 border border-white rounded-full dark:border-gray-600"></span>
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Kathryn Murphy</h6>
                                        <p class="mb-0 text-sm line-clamp-1">hey! there i'm...</p>
                                    </div>
                                </div>
                                <div class="shrink-0 flex flex-col items-end gap-1">
                                    <span class="text-sm text-neutral-500">12:30 PM</span>
                                    <span class="w-4 h-4 text-xs bg-warning-600 text-white rounded-full flex justify-center items-center">8</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-7.png') }}" alt="Joseph image">
                                        <span class="absolute end-[2px] bottom-[2px] w-2.5 h-2.5 bg-success-500 border border-white rounded-full dark:border-gray-600"></span>
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Kathryn Murphy</h6>
                                        <p class="mb-0 text-sm line-clamp-1">hey! there i'm...</p>
                                    </div>
                                </div>
                                <div class="shrink-0 flex flex-col items-end gap-1">
                                    <span class="text-sm text-neutral-500">12:30 PM</span>
                                    <span class="w-4 h-4 text-xs bg-warning-600 text-white rounded-full flex justify-center items-center">8</span>
                                </div>
                            </a>
                        </div>

                        <div class="text-center py-3 px-4">
                            <a href="javascript:void(0)" class="text-primary-600 dark:text-primary-600 font-semibold hover:underline text-center">See All Message </a>
                        </div>
                    </div>
                </div>
                <!-- Message Dropdown End  -->
                <!-- Notification Start  -->
                <button data-dropdown-toggle="dropdownNotification" class="has-indicator w-10 h-10 bg-neutral-200 dark:bg-neutral-700 rounded-full flex justify-center items-center" type="button">
                    <iconify-icon icon="iconoir:bell" class="text-neutral-900 dark:text-white text-xl"></iconify-icon>
                </button>
                <div id="dropdownNotification" class="z-10 hidden bg-white dark:bg-neutral-700 rounded-2xl overflow-hidden shadow-lg max-w-[394px] w-full">
                    <div class="py-3 px-4 rounded-lg bg-primary-50 dark:bg-primary-600/25 m-4 flex items-center justify-between gap-2">
                        <h6 class="text-lg text-neutral-900 font-semibold mb-0">Notification</h6>
                        <span class="w-10 h-10 bg-white dark:bg-neutral-600 text-primary-600 dark:text-white font-bold flex justify-center items-center rounded-full">05</span>
                    </div>
                    <div class="scroll-sm !border-t-0">
                        <div class="max-h-[400px] overflow-y-auto">
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative w-11 h-11 bg-success-200 dark:bg-success-600/25 text-success-600 flex justify-center items-center rounded-full">
                                        <iconify-icon icon="bitcoin-icons:verify-outline" class="text-2xl"></iconify-icon>
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Congratulations</h6>
                                        <p class="mb-0 text-sm line-clamp-1">Your profile has been Verified. Your profile has been Verified</p>
                                    </div>
                                </div>
                                <div class="shrink-0">
                                    <span class="text-sm text-neutral-500">23 Mins ago</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-4.png') }}" alt="Joseph image">
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Ronald Richards</h6>
                                        <p class="mb-0 text-sm line-clamp-1">You can stitch between artboards</p>
                                    </div>
                                </div>
                                <div class="shrink-0">
                                    <span class="text-sm text-neutral-500">23 Mins ago</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative w-11 h-11 bg-primary-100 dark:bg-primary-600/25 text-primary-600 flex justify-center items-center rounded-full">
                                        AM
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Arlene McCoy</h6>
                                        <p class="mb-0 text-sm line-clamp-1">Invite you to prototyping</p>
                                    </div>
                                </div>
                                <div class="shrink-0">
                                    <span class="text-sm text-neutral-500">23 Mins ago</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative">
                                        <img class="rounded-full w-11 h-11" src="{{ asset('assets/images/notification/profile-6.png') }}" alt="Joseph image">
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Annette Black</h6>
                                        <p class="mb-0 text-sm line-clamp-1">Invite you to prototyping</p>
                                    </div>
                                </div>
                                <div class="shrink-0">
                                    <span class="text-sm text-neutral-500">23 Mins ago</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 justify-between gap-1">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 relative w-11 h-11 bg-primary-100 dark:bg-primary-600/25 text-primary-600 flex justify-center items-center rounded-full">
                                        DR
                                    </div>
                                    <div>
                                        <h6 class="text-sm fw-semibold mb-1">Darlene Robertson</h6>
                                        <p class="mb-0 text-sm line-clamp-1">Invite you to prototyping</p>
                                    </div>
                                </div>
                                <div class="shrink-0">
                                    <span class="text-sm text-neutral-500">23 Mins ago</span>
                                </div>
                            </a>
                        </div>

                        <div class="text-center py-3 px-4">
                            <a href="javascript:void(0)" class="text-primary-600 dark:text-primary-600 font-semibold hover:underline text-center">See All Notification </a>
                        </div>
                    </div>
                </div>
                <!-- Notification End  -->


                <button data-dropdown-toggle="dropdownProfile" class="flex justify-center items-center rounded-full" type="button">
                    <img src="{{ asset('assets/images/user.png') }}" alt="image" class="w-10 h-10 object-fit-cover rounded-full">
                </button>
                <div id="dropdownProfile" class="z-10 hidden bg-white dark:bg-neutral-700 rounded-lg shadow-lg dropdown-menu-sm p-3">
                    <div class="py-3 px-4 rounded-lg bg-primary-50 dark:bg-primary-600/25 mb-4 flex items-center justify-between gap-2">
                        <div>
                            <h6 class="text-lg text-neutral-900 font-semibold mb-0">{{ Auth::user()->name }}</h6>
                        </div>
                        <button type="button" class="hover:text-danger-600">
                            <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                        </button>
                    </div>

                    <div class="max-h-[400px] overflow-y-auto scroll-sm pe-2">
                        <ul class="flex flex-col">
                            <li>
                                @permission('user profile manage')
                                <a class="text-black px-0 py-2 hover:text-primary-600 flex items-center gap-4" href="{{ route('profile') }}">
                                    <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>  My Profile
                                </a>
                                @endpermission
                            </li>
                            <li>
                                <a class="text-black px-0 py-2 hover:text-danger-600 flex items-center gap-4"  href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                     <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> {{ __('Logout') }}
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
