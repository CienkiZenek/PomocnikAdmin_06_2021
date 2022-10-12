<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zagadnienia_uwagi;
use App\Zagadnienia;
use App\Hasla;
use App\User;
use Illuminate\Support\Arr;

class ZagadnieniaUwagiController extends Controller
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
                $Wyniki=Zagadnienia_uwagi::orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Nowa':
                $Wyniki=Zagadnienia_uwagi::where('status', 'Nowa')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Oczekuje':
                $Wyniki=Zagadnienia_uwagi::where('status', 'Oczekuje')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Dodane':
                $Wyniki=Zagadnienia_uwagi::where('status', 'Dodane')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Usunięta':
                $Wyniki=Zagadnienia_uwagi::where('status', 'Usunięta')->orderBy('created_at', 'asc')->paginate(12);
                break;

            default:
                $Wyniki=Zagadnienia_uwagi::orderBy('created_at', 'asc')->paginate(12);
                break;
        }


        return view('tresc.listy.zagadnieniaUwagi-lista', ['Wyniki'=>$Wyniki, 'lista'=>$lista]);
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


        $uwaga = Zagadnienia_uwagi::findOrFail($id);
        $linkiDoListy='/listaZagadnieniaUwagi';
        $nazwaListy='Lista uwag do zagadnień lub haseł';
        $user=User::findOrFail($uwaga->dodal_user);
        // czy obsługujemy uwagę do hała czy do zagadnienia
        if(isset($uwaga->zagadnienie_id)&& $uwaga->zagadnienie_id>0){
        $zagadnienie=Zagadnienia::findOrFail($uwaga->zagadnienie_id);
        return view('tresc.edycja.zagadnieniaUwagi-edycja', ['uwaga'=>$uwaga,
            'linkiDoListy'=>$linkiDoListy,
            'user'=>$user,
            'lista'=>'Wszystkie',
            'uwagaDo'=>'zagadnienie',
            'nazwaListy'=>$nazwaListy,
            'zagadnienie'=>$zagadnienie]);
        }
        else if(isset($uwaga->haslo_id) && $uwaga->haslo_id>0) {
            $haslo=Hasla::findOrFail($uwaga->haslo_id);
            return view('tresc.edycja.zagadnieniaUwagi-edycja', ['uwaga'=>$uwaga,
                'linkiDoListy'=>$linkiDoListy,
                'user'=>$user,
                'lista'=>'Wszystkie',
                'uwagaDo'=>'haslo',
                'nazwaListy'=>$nazwaListy,
                'haslo'=>$haslo
                ]);
            return view('tresc.edycja.zagadnieniaUwagi-edycja');
        }

        else {

            session()->flash('komunikat', "Błąd przy wyświatlaniu uwagi!");
            return redirect(route('listaZagadnieniaUwagi', 'Wszystkie'));
        }/**/


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
        $uwaga = Zagadnienia_uwagi::findOrFail($id);
        $data = $request->all();
        $historia=$uwaga['historia_zmian'].' Zmieniono: '.Now();
        $data['historia_zmian'] = $historia;
        $uwaga->update($data);
        $linkiDoListy='/listaZagadnieniaUwagi';
        $nazwaListy='Lista uwag do zagadnień lub haseł';
        $user=User::findOrFail($uwaga->dodal_user);
        $zagadnienie=Zagadnienia::findOrFail($uwaga->zagadnienie_id);
        session()->flash('komunikat', "Propozycja została zaktualizowana!");

       /* return view('tresc.edycja.zagadnieniaUwagi-edycja', ['uwaga'=>$uwaga,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy,
            'user'=>$user,
            'zagadnienie'=>$zagadnienie]);*/

        if(isset($uwaga->zagadnienie_id)&& $uwaga->zagadnienie_id>0){
            $zagadnienie=Zagadnienia::findOrFail($uwaga->zagadnienie_id);
            return view('tresc.edycja.zagadnieniaUwagi-edycja', ['uwaga'=>$uwaga,
                'linkiDoListy'=>$linkiDoListy,
                'user'=>$user,
                'lista'=>'Wszystkie',
                'uwagaDo'=>'zagadnienie',
                'nazwaListy'=>$nazwaListy,
                'zagadnienie'=>$zagadnienie]);
        }
        else {

            $haslo=Hasla::findOrFail($uwaga->haslo_id);
            return view('tresc.edycja.zagadnieniaUwagi-edycja', ['uwaga'=>$uwaga,
                'linkiDoListy'=>$linkiDoListy,
                'user'=>$user,
                'lista'=>'Wszystkie',
                'uwagaDo'=>'haslo',
                'nazwaListy'=>$nazwaListy,
                'haslo'=>$haslo]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uwaga = Zagadnienia_uwagi::findOrFail($id);
        $uwaga->delete();
        session()->flash('komunikat', "Uwaga do zagadnienia została usunięta!");
        return redirect(route('listaZagadnieniaUwagi', 'Wszystkie'));
    }

    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Zagadnienia_uwagi::where('naglowek', 'like', "%$szukane%")->orWhere('tresc', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.zagadnieniaUwagi-lista', compact('Wyniki'));
    }
}
