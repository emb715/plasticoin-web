<div x-data="{ menu: false }">
    <header id="header" class="static pin-t pin-x bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <nav id="menu" class="flex flex-wrap pt-2 pb-2">
                <div class="w-full flex justify-between px-4">
                    <div id="logo" class="flex text-white items-center pt-2 pr-4">
                        <a href="{{ route('site.index') }}">
                            <img src="{{ asset('assets/logo.png') }}" class="w-64">
                        </a>
                    </div>

                    <div class="flex items-center lg:hidden">
                        <button
                            class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white"
                            @click="menu = !menu">
                            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>
                                    Menu
                                </title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>

                    <div class="w-full flex-grow hidden lg:flex md:items-center md:w-auto pt-2 pb-2 pl-4 text-right">
                        <div class="text-sm lg:flex-grow">

                            <a href="{{ route('site.us') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Nosotros
                            </a>

                            <a href="{{ route('site.collection-center.index') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Centros de Acopio
                            </a>

                            <a href="{{ route('site.benefit.index') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Obtener beneficios
                            </a>

                            <a href="{{ route('site.company.index') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Empresas
                            </a>

                        </div>
                        <div class="ml-8">

                            @guest

                                <a href="{{ route('login') }}"
                                    class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-2">
                                    Ingresar
                                </a>

                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 font-semibold text-primary no-underline uppercase border-2 border-primary rounded-lg hover:bg-white">
                                    Registrarse
                                </a>
                            @else

                                <div class="flex flex-wrap items-center">

                                    <div x-on:click.away="open = false" class="ml-3 relative" x-data="{ open: false }">

                                        <div>
                                            <button x-on:click="open = !open; console.log('asd')"
                                                class="max-w-xs flex flex-wrap items-center rounded-full text-black focus:outline-none focus:shadow-solid"
                                                id="user-menu" aria-label="User menu" aria-haspopup="true"
                                                x-bind:aria-expanded="open">

                                                <p
                                                    class="hidden ml-3 text-cool-gray-700 text-sm leading-5 font-medium lg:block">
                                                    {{ Auth::user()->name }}
                                                </p>
                                                <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-cool-gray-400 lg:block"
                                                    x-description="Heroicon name: chevron-down"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>

                                        </div>
                                        <div x-show="open"
                                            x-description="Profile dropdown panel, show/hide based on dropdown state."
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="z-10 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
                                            style="display: none;">
                                            <div class="text-left py-1 rounded-md bg-white shadow-xs">

                                                <div class="px-4 py-3">
                                                    <p class="text-sm">
                                                        Loggeado con
                                                    </p>
                                                    <p class="text-sm font-medium text-gray-900 truncate mb-3">
                                                        {{ Auth::user()->email}}
                                                    </p>
                                                    <div class="flex items-center text-sm">
                                                        <p>
                                                            <span class="mr-2">Plasticoins</span>
                                                            {{ Auth::user()->plasticoins_sum_amount }}
                                                        </p>
                                                        <img src="{{ asset('assets/images/plasticoins.png') }}" class="ml-2 h-6">
                                                    </div>
                                                </div>
                                                <div class="border-t border-gray-200"></div>

                                                <a href="{{ route('site.transfer.create') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Transferir plasticoins
                                                </a>

                                                <a href="{{ route('profile') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    Perfil
                                                </a>

                                                <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">
                                                    @csrf
                                                    <button type="submit" class="w-full text-left">
                                                        Salir
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="w-full my-8 lg:hidden" x-show="menu">
                    <div class="text-sm lg:flex-grow px-4">

                        <a href="{{ route('site.us') }}"
                            class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                            Nosotros
                        </a>

                        <a href="{{ route('site.collection-center.index') }}"
                            class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                            Centros de Acopio
                        </a>

                        <a href="{{ route('site.benefit.index') }}"
                            class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                            Obtener Beneficios
                        </a>

                        <a href="{{ route('site.company.index') }}"
                            class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                            Empresas
                        </a>

                        @guest

                            <a href="{{ route('register') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Registrarse
                            </a>

                            <a href="{{ route('login') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Ingresar
                            </a>

                        @else

                            <div class="w-4/5 mx-auto border-t border-primary my-8"></div>

                            <div class="w-full flex text-base justify-between">

                                <div class="flex">
                                    <p>
                                        <span class="mr-2">Plasticoins</span>
                                        {{ Auth::user()->plasticoins_sum_amount }}
                                    </p>
                                    <img src="{{ asset('assets/images/plasticoins.png') }}" class="ml-2 h-6">
                                </div>
                            </div>

                            <a href="{{ route('site.transfer.create') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Transferir plasticoins
                            </a>

                            <a href="{{ route('profile') }}"
                                class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                Perfil
                            </a>

                            <form action="{{ route('logout') }}" method="POST" class="block mt-4 lg:inline-block lg:mt-0 text-primary text-base no-underline hover:text-secondary mr-4">
                                @csrf
                                <button type="submit" class="w-full text-left">
                                    Salir
                                </button>
                            </form>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>