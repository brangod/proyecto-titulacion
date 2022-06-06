<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListaUsuarios extends Component
{
    use WithPagination;

    public $modal = false;
    public $user, $rolname;
    public $buscar = '';

    public function updatedBuscar()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.lista-usuarios', [
            'users' => User::where('name', 'like', '%' . $this->buscar . '%')
                ->orWhere('boleta', 'like', '%' . $this->buscar . '%')
                ->paginate(8),
            'roles' => Role::all()
        ]);
    }

    public function crear()
    {
        $this->limpiar();
        $this->abrirmodal();
    }

    public function guardar()
    {
        if (auth()->id() == $this->user->id) {
            session()->flash('mensaje', 'No es posible cambiar el rol');
            $this->cerrarmodal();
            $this->limpiar();
        } else {
            if ($this->rolname == '') {
                session()->flash('mensaje', 'elige un rol para asignar');
                $this->cerrarmodal();
                $this->limpiar();}
            else{
            $this->user->syncRoles($this->rolname);
            session()->flash('mensaje', 'Rol Asignado Con Exito');
            $this->cerrarmodal();
            $this->limpiar();
            }
        }
    }
    public function editar($id)
    {
        $this->user = User::find($id);
        $this->abrirmodal();
    }

    public function historial()
    {
        
    }

    public function limpiar()
    {
        $this->user_id = '';
        $this->rolname = '';
    }
    public function abrirmodal()
    {
        $this->modal = TRUE;
    }
    public function cerrarmodal()
    {
        $this->modal = false;
    }
}
