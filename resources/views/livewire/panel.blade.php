<div>
    @include('nav')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ($estatus == 1)
                    @livewire('productos')
                @elseif ($estatus == 2)
                    @livewire('bodegas')
                @else
                    @livewire('inventario')
                @endif
            </div>
        </div>
    </div>
</div>
