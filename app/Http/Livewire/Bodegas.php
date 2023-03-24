<?php

namespace App\Http\Livewire;

use App\Models\Bodega;
use Livewire\Component;
use Livewire\WithPagination;

class Bodegas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $buscar=null;
    public $perPage = 10;
    public $perPageOptions = [5, 10, 15, 20, 50];
    public $isOpen,$nombre,$bodega_id;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function render()
    {
        $bodegas = Bodega::where('user_id',auth()->user()->id)
        ->where('nombre','like','%'.$this->buscar.'%')
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.bodegas',compact('bodegas'));
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function eliminar($id){
        Bodega::destroy($id);
        session()->flash('message', 'Bodega eliminado con exito.');
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
        $this->bodega_id = '';
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
        ]);

        Bodega::updateOrCreate(['id' => $this->bodega_id], [
            'nombre' => $this->nombre,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('message',$this->bodega_id ? 'Bodega actualizado con exito.' : 'Bodega creado con exito.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function editar($id)
    {
        $bodega = Bodega::findOrFail($id);
        $this->nombre = $bodega->nombre;
        $this->bodega_id=$bodega->id;
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
