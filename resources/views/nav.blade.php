<nav x-data="{ open: false }" class="min-w-full top-0 z-50 bg-white border-b border-gray-100 shadow">
    <!-- Primary Navigation Menu -->
    <div class="centrar">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/panel">
                        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto">
                            <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
                            <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
                          </svg>
                          
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a class="{{$estatus == 1
                        ? 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
                        : 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition'}}"  wire:click="$set('estatus', '1')">
                        Productos
                    </a>
                       
                    <a class="{{$estatus == 2
                        ? 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
                        : 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition'}}"  wire:click="$set('estatus', '2')">
                        Bodegas
                    </a>
        
                    <a class="{{$estatus == 3
                        ? 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition'
                        : 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition'}}"  wire:click="$set('estatus', '3')">
                        Inventario
                    </a>
                </div>
            </div>

            <div class="hidden md:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                href="{{ route('logout') }}" data-turbo="false">Cerrar Sesion</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>


</nav>
