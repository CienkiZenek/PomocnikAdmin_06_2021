<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Kategorie;
use App\Dzialy;
use App\Zagadnienia;
use App\Hasla;
use Illuminate\Support\Facades\Log;

class KategorieController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'kategoria'=>'required|min:3',
            'dzial_id'=>'required',
            'status'=>'required',
            'opis'=>'nullable'

        ])->validate();
        return $walidated;
    }

    public function index(){
         $Wyniki=Kategorie::orderBy('kategoria', 'asc')->paginate(12);
       // $Wyniki='';
        return view('tresc.listy.kategorie-lista', compact('Wyniki'));
    }


    public function nowaFormularz()
    {
        $Wyniki=Dzialy::orderBy('dzial', 'asc')->get();

        return view('tresc.dodawanie.kategorie-dodawanie', compact('Wyniki'));
    }


    public function create(Request $request)
    {
        //$data=$request->all();
        $data = $this->validator($request->all());
        $data = Arr::add($data, 'dodal_user', 1);
        Kategorie::create($data);
        session()->flash('komunikat', "Nowa kategoria została dodana");
        return redirect('/listaKategorie');
    }

    public function edit($id){

        $kat = Kategorie::findOrFail($id);
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get();
        $linkiDoListy='/listaKategorie';
        $nazwaListy='Lista kategorii';
        return view('tresc.edycja.kategorie-edycja', ['kat'=>$kat, 'dzialy'=>$dzialy, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $kat = Kategorie::findOrFail($id);
        // dział przed zmianą:
       $old_dzial_id=$kat->dzial_id;
        //$data = $request->all();
        $data = $this->validator($request->all());

        $kat->update($data);
        // aktualizacja działów w hasłach i zagadnieniach
// gdy zmienia się dział:

        if($old_dzial_id!=$request->dzial_id){

$hasla_do_zmian=Zagadnienia::where('dzial_id', $old_dzial_id)->get();
            foreach ($hasla_do_zmian as $zmiana) {
                $zmiana->update(['dzial_id' => $request->dzial_id]);
            }
            $zagadnienia_do_zmian=Zagadnienia::where('dzial_id', $old_dzial_id)->get();
            foreach ($zagadnienia_do_zmian as $zmiana2) {
                $zmiana2->update(['dzial_id' => $request->dzial_id]);
            }

        }

        $dzialy=Dzialy::orderBy('dzial', 'asc')->get();

       session()->flash('komunikat', "Kategoria została zaktualizowana!");
        $linkiDoListy='/listaKategorie';
        $nazwaListy='Lista kategorii';
        return view('tresc.edycja.kategorie-edycja', ['kat'=>$kat, 'dzialy'=>$dzialy, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $kat = Kategorie::findOrFail($id);
        $kat->delete();
        session()->flash('komunikat', "Kategoria została usunięta!");
        return redirect('/listaKategorie');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Kategorie::where('kategoria', 'like', "%$szukane%")
            ->orWhere('opis', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.kategorie-lista', compact('Wyniki'));
    }

    public function listaRozwijana (Request $request){

        $katLista=Kategorie::where('dzial_id', $request->id)->get();
        return response()->json($katLista);
    }
}
