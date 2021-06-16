<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dzialy;
use App\Kategorie;
use App\Zagadnienia;
use App\Hasla;
use App\Memy;
use App\Tagi;
use App\Znalezione;
use App\Miejsca;
use App\Przypisy;


class MenuController extends Controller
{
    public function index(){

        /*return phpinfo();*/
        $users=User::orderBy('name', 'asc')->get();
        $dzialy=Dzialy::all();
        $kategorie=Kategorie::all();
        $hasla=Zagadnienia::all();
        $zagadnienia=Zagadnienia::all();
        $memy=Memy::all();
        $tagi=Tagi::all();
        $znalezione=Znalezione::all();
        $miejsca=Miejsca::all();

        return view('tresc.menu-glowne', ['users'=>$users,
            'dzialy'=>$dzialy,
            'kategorie'=>$kategorie,
            'hasla'=>$hasla,
            'zagadnienia'=>$zagadnienia,
            'memy'=>$memy,
            'tagi'=>$tagi,
            'znalezione'=>$znalezione,
            'miejsca'=>$miejsca

            ]);
    }

    public function listy_do(){

        return view('tresc.listy_do');
    }
    public function livewire(){
        $id=7;
        $zagadnienie = Zagadnienia::findOrFail($id);
        $przypisy=Przypisy::where('id_pozycja', $id)->orderBy('numer', 'asc')->get();
        return view('test', ['zagadnienie'=>$zagadnienie, 'przypisy'=>$przypisy]);
    }

}
