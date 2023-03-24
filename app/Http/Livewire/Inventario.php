<?php

namespace App\Http\Livewire;

use App\Models\Bodega;
use App\Models\BodegaProducto;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Inventario extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $buscar=null;
    public $perPage = 10;
    public $perPageOptions = [5, 10, 15, 20, 50];
    public $isOpen,$producto_id,$bodega_id,$inventario_id,$precio;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $inventarios = BodegaProducto::where('user_id',auth()->user()->id)
                                    ->paginate($this->perPage);
        $bodegas = Bodega::where('user_id',auth()->user()->id)->get();
        $productos = Producto::where('user_id',auth()->user()->id)->get();
        return view('livewire.inventario',compact('inventarios','bodegas','productos'));
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function eliminar($id){
        BodegaProducto::destroy($id);
        session()->flash('message', 'Producto eliminado del inventario con exito.');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->bodega_id = Bodega::where('user_id',auth()->user()->id)->first()->id;
        $this->producto_id = Producto::where('user_id',auth()->user()->id)->first()->id;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->producto_id = '';
        $this->bodega_id= '';
        $this->inventario_id = '';
        $this->precio='';
    }

    public function store()
    {
        $this->validate([
            'producto_id' => 'required',
            'bodega_id' => 'required',
            'precio'=>'required'
        ]);
        session()->flash('message',$this->inventario_id ? 'Inventario actualizado con exito.' : 'Producto añadido a inventario con exito.');

        BodegaProducto::updateOrCreate(['id' => $this->inventario_id], [
            'bodega_id' => $this->bodega_id,
            'producto_id' => $this->producto_id,
            'precio'=>$this->precio,
            'user_id'=>auth()->user()->id
        ]);

        $this->closeModal();
        $this->resetInputFields();
    }

    public function editar($id)
    {
        $inventario = BodegaProducto::findOrFail($id);
        $this->producto_id = $inventario->producto_id;
        $this->bodega_id = $inventario->bodega_id;
        $this->precio = $inventario->precio;
        $this->inventario_id=$inventario->id;
        $this->openModal();
    }

    public function sortBy($field){
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

}