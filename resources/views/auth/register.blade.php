<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{ config('app.name') }}
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form  action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Nombre
                    </label>
                    <input
                        class="mt-2 p-2 border-blue-600 focus:border-blue-600 focus:ring focus:ring-blue-800 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        name="name" required="required" autofocus="autofocus"
                       >
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Correo
                    </label>
                    <input
                        class="mt-2 p-2 border-blue-600 focus:border-blue-600 focus:ring focus:ring-blue-800 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                       type="email" name="email" required="required" autofocus="autofocus"
                       >
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="password">
                        Clave
                    </label>
                    <input
                        class="mt-2 p-2 border-blue-600 focus:border-blue-600 focus:ring focus:ring-blue-800 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        id="password" type="password" name="password" required="required"
                        autocomplete="current-password">
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="current-password">
                        Confirmar Clave
                    </label>
                    <input
                        class="mt-2 p-2 border-blue-600 focus:border-blue-600 focus:ring focus:ring-blue-800 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        id="password_confirmation" type="password" name="password_confirmation" required="required"
                        autocomplete="password_confirmation">
                </div>
            </div>
            <div class="flex items-center justify-between mt-6">

                <button type="submit" class="rounded w-full p-2 text-indigo-100 bg-indigo-500 hover:bg-indigo-700">
                    Registrarse
                </button>
            </div>
            <div class="pt-5 mt-6 border-t border-slate-200">
                <div class="text-sm">
                    ¿Ya tienes una cuenta? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="/login">Iniciar Sesion</a>
                </div>
                <!-- Warning -->
                <div class="mt-5">
                    <div class="bg-amber-100 text-amber-600 px-3 py-2 rounded">
                        <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"></path>
                        </svg>
                        <span class="text-sm">
                           PRUEBA TECNICA: OLIVER TORRES
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
