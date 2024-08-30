<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListadoMovimientosUser extends Component
{

    public $user;

    // public function mount($user)
    // {
    //     $this->user = $user;
    // }

    public function render()
    {
        $movimientos = [];
        return view('livewire.listado-movimientos-user', compact(
            'movimientos'
        ));
    }
}
