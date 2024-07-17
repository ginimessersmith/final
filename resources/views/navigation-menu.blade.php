<!--<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (auth()->user()->hasCliente() || auth()->user()->is_admin ||  auth()->user()->is_cajero )
                    <x-nav-link href="{{ route('pizzas.index') }}" :active="request()->routeIs('pizzas.index')">
                        {{ __('Menú') }}
                    </x-nav-link>
                    @endif

                    @if (auth()->user()->hasCliente() ||  auth()->user()->is_cajero)
                    <x-nav-link href="{{ route('detalle_pedido.index') }}" :active="request()->routeIs('detalle_pedido.index')">
                        {{ __('Carrito de compras') }}
                    </x-nav-link>
                    @endif


                    @if (auth()->user()->is_admin ||  auth()->user()->is_cajero)
                    <x-nav-link href="{{ route('pedidos.index') }}" :active="request()->routeIs('pedidos.index')">
                        {{ __('Historial de pedidos') }}
                    </x-nav-link>
                    @endif

                    @if (auth()->user()->is_cliente)
                    <x-nav-link href="{{ route('pedidos.pedido_cliente') }}" :active="request()->routeIs('pedidos.pedido_cliente')">
                        {{ __('Tus pedidos') }}
                    </x-nav-link>
                    @endif


                    @if (auth()->user()->is_admin )
                    <form action="{{ route('search.index') }}" method="GET" class="m-3 flex">
                        <x-input id="search" class="block w-full h-full" type="text" name="search" :value="old('search')" placeholder="Busqueda general" />
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </x-button>
                    </form>
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('clientes.index') }}" :active="request()->routeIs('clientes.index')">
                        {{ __('Clientes') }}
                    </x-nav-link>
                    @endif
                    @if ( auth()->user()->is_cajero || auth()->user()->is_cliente)
                    <form action="{{ route('search.results') }}" method="GET" class="m-3 flex">
                        <x-input id="search" class="block w-full h-full" type="text" name="search" :value="old('search')" placeholder="Busqueda general" />
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </x-button>
                    </form>
                    @endif
                    @if (auth()->user()->is_cajero)
                    <x-nav-link href="{{ route('cajero.view') }}" :active="request()->routeIs('cajero.view')">
                        {{ __('Cajero') }}
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative flex items-center">
                    <span class="text-gray-500 text-sm mr-3 ms-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-button class="ms-4 bg-red-500 text-white">
                            {{ __('Cerrar sesión') }}
                        </x-button>
                    </form>
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (auth()->user()->hasCliente())
            <x-responsive-nav-link href="{{ route('pizzas.index') }}" :active="request()->routeIs('pizzas.index')">
                {{ __('Menú') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('detalle_pedido.index') }}" :active="request()->routeIs('detalle_pedido.index')">
                {{ __('Carrito de compras') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('pedidos.index') }}" :active="request()->routeIs('pedidos.index')">
                {{ __('Historial de pedidos') }}
            </x-responsive-nav-link>
            @endif
            @if (auth()->user()->is_admin)
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('clientes.index') }}" :active="request()->routeIs('clientes.index')">
                {{ __('Clientes') }}
            </x-responsive-nav-link>
            <form action="{{ route('search.index') }}" method="GET" class="m-3 flex">
                <x-input id="search" class="block w-full h-full" type="text" name="search" :value="old('search')" placeholder="Busqueda general" />
                <x-button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </x-button>
            </form>
            @endif
            @if (auth()->user()->is_cajero)
            <x-responsive-nav-link href="{{ route('cajero.view') }}" :active="request()->routeIs('cajero.view')">
                {{ __('Cajero') }}
            </x-responsive-nav-link>
             <x-responsive-nav-link href="{{ route('pedidos.index') }}" :active="request()->routeIs('pedidos.index')">
                {{ __('Historial de pedidos') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav> -->

<nav class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (auth()->user()->hasCliente())
                    <x-nav-link href="{{ route('pizzas.index') }}" :active="request()->routeIs('pizzas.index')">
                        {{ __('Menú') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('detalle_pedido.index') }}" :active="request()->routeIs('detalle_pedido.index')">
                        {{ __('Carrito de compras') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('pedidos.pedido_cliente') }}" :active="request()->routeIs('pedidos.pedido_cliente')">
                        {{ __('Historial de pedidos') }}
                    </x-nav-link>
                    <form action="{{ route('search.results') }}" method="GET" class="m-3 flex">
                        <x-input id="search" class="block w-full h-full" type="text" name="search" :value="old('search')" placeholder="Busqueda general" />
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </x-button>
                    </form>
                    {{-- @if (auth()->user()->is_cliente)
                    <x-nav-link href="{{ route('pedidos.pedido_cliente') }}" :active="request()->routeIs('pedidos.pedido_cliente')">
                        {{ __('Tus pedidos') }}
                    </x-nav-link>
                    @endif --}}
                    @endif
                    @if (auth()->user()->is_admin)
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('clientes.index') }}" :active="request()->routeIs('clientes.index')">
                        {{ __('Clientes') }}
                    </x-nav-link>

                    <!-- Formulario de Búsqueda -->
                    <form action="{{ route('search.index') }}" method="GET" class="m-3 flex">
                        <x-input id="search" class="block w-full h-full" type="text" name="search" :value="old('search')" placeholder="Busqueda general" />
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </x-button>
                    </form>
                    @endif
                    @if (auth()->user()->is_cajero)
                    <x-nav-link href="{{ route('pizzas.index') }}" :active="request()->routeIs('pizzas.index')">
                        {{ __('Menú') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('cajero.view') }}" :active="request()->routeIs('cajero.view')">
                        {{ __('Pedidos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('detalle_pedido.index') }}" :active="request()->routeIs('detalle_pedido.index')">
                        {{ __('Carrito de compras') }}
                    </x-nav-link>
                    <form action="{{ route('search.results') }}" method="GET" class="m-3 flex">
                        <x-input id="search" class="block w-full h-full" type="text" name="search" :value="old('search')" placeholder="Busqueda general" />
                        <x-button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </x-button>
                    </form>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Botón de cambio de tema -->
                <button id="theme-toggle" class="p-2 rounded-md bg-gray-800 dark:bg-gray-200 text-gray-800 dark:text-gray-200">
                    <span id="theme-toggle-dark-icon" class="hidden">🌙</span> <!-- Emoji luna -->
                    <span id="theme-toggle-light-icon" class="hidden">☀️</span> <!-- Emoji sol -->
                </button>

                <!-- Simple User Information and Logout -->
                <div class="ml-3 relative flex items-center">
                    <span class="text-gray-500 text-sm mr-3 ms-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-button class="ms-4 bg-red-500 text-white hover:bg-red-700" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
