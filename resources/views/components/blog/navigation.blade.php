<nav x-data="{ open: false }"> 
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('main') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-black" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-blog.nav-link :href="route('about')" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-blog.nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-blog.nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                        {{ __('Blog') }}
                    </x-blog.nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-blog.nav-link :href="route('galerie')" :active="request()->routeIs('galerie')">
                        {{ __('Galerie') }}
                    </x-blog.nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-blog.nav-link :href="route('impressum')" :active="request()->routeIs('impressum')">
                        {{ __('Impressum') }}
                    </x-blog.nav-link>
                </div>
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> --}}
                {{--     <x-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')"> --}}
                {{--         {{ __('Calendar') }} --}}
                {{--     </x-nav-link> --}}
                {{-- </div> --}}
                
            </div>

            <!-- Settings Dropdown -->

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-black transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-blog.responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-blog.responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-blog.responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-blog.responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-blog.responsive-nav-link :href="route('galerie')" :active="request()->routeIs('galerie')">
                {{ __('Galerie') }}
            </x-blog.responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-blog.responsive-nav-link :href="route('impressum')" :active="request()->routeIs('impressum')">
                {{ __('Impressum') }}
            </x-blog.responsive-nav-link>
        </div>

    </div>
</nav>

