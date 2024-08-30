<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CajeroRed extends Component
{
    use WithPagination;
    public $red;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->users = $this->red->users;
    }

    public function render()
    {
        $filter = $this->search;
        $admins = User::where(function ($query) use ($filter) {
                return $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(5);

        return view('livewire.cajero-red', [
            'admins' => $admins,
        ]);
    }


    public function agregar($id)
    {
        $user = User::find($id);
        $this->red->users()->attach($user);

        $this->red = $this->red->refresh();
        $this->users = $this->red->users;

        session()
            ->flash('message', "Se agregó a {$user->name} a la red");
    }

    public function quitar($id)
    {
        $user = User::find($id);
        $this->red->users()->detach($user);

        $this->red = $this->red->refresh();
        $this->users = $this->red->users;



        session()
            ->flash('message', "Se quitó a {$user->name} de la red");
    }
}
