<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class Productos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $buscar=null;
    public $perPage = 10;
    public $perPageOptions = [5, 10, 15, 20, 50];
    public $isOpen,$nombre,$codigo,$producto_id;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $productos = Producto::where('user_id',auth()->user()->id)
                            ->where('nombre','like','%'.$this->buscar.'%')
                            ->orWhere('codigo','like','%'.$this->buscar.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate($this->perPage);
        return view('livewire.productos',compact('productos'));
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function eliminar($id){
        Producto::destroy($id);
        session()->flash('message', 'Producto eliminado con exito.');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->codigo = '';
        $this->producto_id = '';
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'codigo' => 'required',
        ]);

        Producto::updateOrCreate(['id' => $this->producto_id], [
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('message',$this->producto_id ? 'Producto actualizado con exito.' : 'Producto creado con exito.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        $this->nombre = $producto->nombre;
        $this->codigo = $producto->codigo;
        $this->producto_id=$producto->id;
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
