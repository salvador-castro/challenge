<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ComunityMembers extends Component
{
    public $comunity;

    public function render()
    {
        return view('livewire.comunity-members');
    }


    public function eliminar($id)
    {
        $this->comunity->players()->detach($id);
    }

    public function aceptar($id)
    {
        $this->comunity->players()->updateExistingPivot($id, [
            'ownerConfirmed' => true,
            'guestConfirmed' => true,
        ]);
    }

    public function hacerAdmin($id)
    {
        $this->comunity->players()->updateExistingPivot($id, [
            'admin' => true,
        ]);
    }

    public function quitarAdmin($id)
    {
        $this->comunity->players()->updateExistingPivot($id, [
            'admin' => false,
        ]);
    }
}
