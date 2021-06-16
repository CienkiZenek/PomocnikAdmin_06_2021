<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propozycje;
use App\Propozycje_uwagi;
use App\User;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class PropozycjeUwagiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lista)
    {
        switch ($lista) {

            case 'Wszystkie':
                $Wyniki=Propozycje_uwagi::orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Nowa':
                $Wyniki=Propozycje_uwagi::where('status', 'Nowa')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Oczekuje':
                $Wyniki=Propozycje_uwagi::where('status', 'Oczekuje')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Dodane':
                $Wyniki=Propozycje_uwagi::where('status', 'Dodane')->orderBy('created_at', 'asc')->paginate(12);
                break;

            case 'Usunięta':
                $Wyniki=Propozycje_uwagi::where('status', 'Usunięta')->orderBy('created_at', 'asc')->paginate(12);
                break;
            default:
                $Wyniki=Propozycje_uwagi::orderBy('created_at', 'asc')->paginate(12);
                break;
        }

        //$Wyniki=Propozycje_uwagi::orderBy('created_at', 'asc')->paginate(12);


        return view('tresc.listy.propozycjeUwagi-lista', ['Wyniki'=>$Wyniki, 'lista'=>$lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uwaga = Propozycje_uwagi::findOrFail($id);
        $linkiDoListy='/listaPropozycjeUwagi';
        $nazwaListy='Lista uwag do propozycji';
        $user=User::findOrFail($uwaga->dodal_user);
        $propozycja=Propozycje::findOrFail($uwaga->propozycja_id);
        return view('tresc.edycja.propozycjeUwagi-edycja', ['uwaga'=>$uwaga,
            'linkiDoListy'=>$linkiDoListy,
            'user'=>$user,
            'lista'=>'Wszystkie',
            'nazwaListy'=>$nazwaListy,
            'propozycja'=>$propozycja]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uwaga = Propozycje_uwagi::findOrFail($id);
        $data = $request->all();
       $historia=$uwaga['historia_zmian'].' Zmieniono: '.Now();
        $data['historia_zmian'] = $historia;
        $uwaga->update($data);
        $linkiDoListy='/listaPropozycjeUwagi';
        $nazwaListy='Lista uwag do propozycji';
        $user=User::findOrFail($uwaga->dodal_user);
        $propozycja=Propozycje::findOrFail($uwaga->propozycja_id);
        session()->flash('komunikat', "Uwaga została zaktualizowana!");
        return view('tresc.edycja.propozycjeUwagi-edycja', ['uwaga'=>$uwaga,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy,
            'user'=>$user,
            'lista'=>'Wszystkie',
            'propozycja'=>$propozycja]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uwaga = Propozycje_uwagi::findOrFail($id);
        $uwaga->delete();
        session()->flash('komunikat', "Uwaga do propozycji została usunięta!");
        return redirect('/listaPropozycjeUwagi');
    }

    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Propozycje_uwagi::where('naglowek', 'like', "%$szukane%")->orWhere('tresc', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.propozycjeUwagi-lista', compact('Wyniki'));
    }
}
