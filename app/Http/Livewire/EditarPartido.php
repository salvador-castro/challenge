<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class EditarPartido extends Component
{

    public $game;



    public function render()
    {
        return view('livewire.editar-partido');
    }

    public function cambiarEquipo($id)
    {
        $team = Team::find($id);
        $team->local = !$team->local;
        $team->save();

        $this->game->refresh();
    }

    public function eliminar($id)
    {
        $team = Team::find($id);
        $team->delete();

        $this->game->refresh();
    }

}
