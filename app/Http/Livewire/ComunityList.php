<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Player;
use Livewire\Component;
use App\Models\Comunity;
use Livewire\WithPagination;
use App\Notifications\SolicitarUnirme;

class ComunityList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // protected $queryString = ['search'];

    public $search = '';
    public $competencia = null;
    public $perPage = 10;


    public function render()
    {
        $comunities = Comunity::where('public', true)->get();
        return view('livewire.comunity-list', compact('comunities'));
    }

    public function pedirUnirme(Comunity $comunity, Player $player)
    {
        try {

            if ($comunity->playerIsMember($player)) {                
                throw new \Exception("Ya eres miembro de esta comunidad");
            } else {
                $comunity->players()->attach($player->id, [
                    'guestConfirmed' => true
                ]);
                foreach ($comunity->players as $key) {
                    if ($comunity->playerIsAdmin($key)){
                        $key->user->notify(new SolicitarUnirme($comunity));
                    }
                }
            }
            

            // $miniliga->user->notify(new \App\Notifications\Miniliga\SolicitarUnirte($miniliga,$user));
    
            session()
                ->flash('message', "Envitaste una solicitud para unirte a {$comunity->name} Correctamente.");
            
        }
        catch(\Exception $ex)
        {
            session()
                ->flash('message',"Error: {$ex->getMessage()}");
        }
    }
    public function aceptar(Comunity $comunity, Player $player)
    {
        try {
            $comunity->players()->updateExistingPivot($player->id, [
                'guestConfirmed' => true,
            ]);
            

            session()
                ->flash('message', "Aceptaste la invitación Correctamente, ya estás participando en {$comunity->name}.");
            
        }
        catch(\Exception $ex)
        {
            session()
                ->flash('message', "Error: {$ex->getMessage()}")->error()->important();
        }

    }
}
