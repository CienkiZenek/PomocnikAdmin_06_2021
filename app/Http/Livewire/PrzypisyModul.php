<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Przypisy;
use App\Zagadnienia;


class PrzypisyModul extends Component
{
    /* przypisy-modul */

    public $przypisy, $tresc, $numer, $id_pozycja, $dodal_user;
    public $count = 0;

    /*public $id_zagadnienia;
    public $przypis;*/

    /*public function mount($przypisy)
    {
        $this->przypisy = $przypisy;

    }*/

    public function create()
    {

        Przypisy::create([
            'tresc'=>$this->tresc,
            'numer'=>$this->numer,
            'id_pozycja'=>$this->id_pozycja,
            'dodal_user'=>1,
        ]);
        $this->czyscInput();
        $this->przypisy=Przypisy::where('id_pozycja', $this->id_pozycja)->orderBy('numer', 'asc')->get();
       // $this->resetInput();
    }

    public function czyscInput(){
        $this->tresc=null;
        $this->numer=null;


    }

    public function usunPrzypis($id)
    {
        $przypis = Przypisy::where('id', $id);
        $przypis->delete();
        $this->przypisy=Przypisy::where('id_pozycja', $this->id_pozycja)->orderBy('numer', 'asc')->get();

            }




    public function render()
    {

      // $przyp_nowe=Przypisy::where('id_pozycja', $this->id_pozycja)->orderBy('numer', 'asc')->get();
      // return view('livewire.przypisy-modul', ['przypisy'=>$przyp_nowe, 'zmiana'=>'zmiana']);
       return view('livewire.przypisy-modul');

    }
}
