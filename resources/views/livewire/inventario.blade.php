<div>
    <h1 class="font-semibold text-gray-700 text-ellipsis text-center pt-2">Listado de Inventario</h1>
    <div class="rounded-lg border border-gray-200 shadow-md m-5 ">
        <div class="flex justify-around">
            <select wire:model="perPage" class="ml-3 my-3">
                @foreach ($perPageOptions as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
            <select wire:model="buscar" class="m-3 rounded-lg w-full shadow-lg hover:bg-gray-50">
                <option value="todas">Todas las bodegas</option>
                @foreach ($bodegas as $bodega)
                    <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                @endforeach
            </select>

            <button type="submit"wire:click="create()"
                class="m-3 block w-full mr-8 rounded-md mt-3 p-2 text-indigo-100 bg-indigo-500 hover:bg-indigo-700">
                Agregar
            </button>

        </div>
        @if ($inventarios->count() > 0)
            @if (session()->has('message'))
                <div class="bg-green-200 p-3 mb-3">{{ session('message') }}</div>
            @endif

            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="cursor-pointer px-2 py-2 text-right" wire:click="sortBy('id')">
                            ID
                            <span class="inline-block w-4 h-4 ml-1 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3l-6 6h12l-6-6z" />
                                    <path d="M10 17l6-6H4l6 6z" />
                                </svg>
                            </span>

                        </th>
                        <th class="cursor-pointer px-2 py-2 text-center">
                            Producto
                            <span class="inline-block w-4 h-4 ml-1 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3l-6 6h12l-6-6z" />
                                    <path d="M10 17l6-6H4l6 6z" />
                                </svg>
                            </span>

                        </th>
                        <th wire:click="sortBy('bodega_id')" class="cursor-pointer text-center py-2">
                            Bodega
                            <span class="inline-block w-4 h-4 ml-1 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3l-6 6h12l-6-6z" />
                                    <path d="M10 17l6-6H4l6 6z" />
                                </svg>
                            </span>

                        </th>
                        <th wire:click="sortBy('precio')" class="cursor-pointer text-center py-2">
                            Precio
                            <span class="inline-block w-4 h-4 ml-1 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3l-6 6h12l-6-6z" />
                                    <path d="M10 17l6-6H4l6 6z" />
                                </svg>
                            </span>

                        </th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($inventarios as $inventario)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">

                                <div class="text-sm">
                                    <div class="text-gray-400">{{ $inventario->id }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                    {{ $inventario->producto->nombre }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $inventario->bodega->nombre }}</td>
                            <td class="px-6 py-4">{{ $inventario->precio }}</td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <div class="cursor-pointer " title="Editar"
                                        wire:click="editar({{ $inventario->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </div>
                                    <div class="cursor-pointer " title="Eliminar"
                                        wire:click="eliminar({{ $inventario->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                            x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center font-semibold text-md py-6">
                No se encontraron registros
            </div>
        @endif
        <div class="p-1">
            {{ $inventarios->links() }}
        </div>
    </div>

    {{-- MODAL --}}
    <div class="fixed z-10 inset-0 overflow-y-auto" style="display: {{ $isOpen ? 'block' : 'none' }}">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                {{ !$this->inventario_id ? 'Añadir Producto a Inventario' : 'Actializar Inventario' }}
                            </h3>
                            <div class="mt-2">
                                <form>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="inventario_id">
                                            Seleccione la bodega
                                        </label>
                                        <select wire:model="bodega_id"
                                            class="right-2 w-full p-2 shadow-lg hover:bg-gray-50">
                                            @foreach ($bodegas as $bodega)
                                                <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="producto_id">
                                            Seleccione el producto
                                        </label>
                                        <select wire:model="producto_id"
                                            class="right-2 w-full p-2 shadow-lg hover:bg-gray-50">
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                                            Ingrese el precio
                                        </label>
                                        <input type="number" wire:model="precio"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        @error('precio')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="store" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700">
                        {{ $this->inventario_id ? 'Actualizar' : 'Añadir' }}
                    </button>
                    <button wire:click="closeModal" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 opacity-50 mr-2 text-base font-medium text-white hover:bg-gray-800">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
