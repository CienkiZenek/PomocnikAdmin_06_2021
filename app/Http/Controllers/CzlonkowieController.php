<?php

namespace App\Http\Controllers;

use App\Czlonkowie;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
class CzlonkowieController extends Controller
{
    public function index(){
       // $Wyniki=Czlonkowie::orderBy('name', 'asc')->paginate(12);
        $Wyniki='';
        return view('tresc.listy.czlonkowie-lista', compact('Wyniki'));
    }

    public function create(Request $request)
    {
        $data=$request->all();
        // $data = $this->validator($request->all());
        //$data = Arr::add($data, 'user_id', 10);
        Czlonkowie::create($data);
        session()->flash('komunikat', "Nowy członek został dodany");
        return redirect('/listaCzlonkowie');
    }

    public function edit($id){

        $czlonek = Czlonkowie::findOrFail($id);

        $linkiDoListy='/listaCzlonkowie';
        $nazwaListy='Lista członków';
        return view('tresc.edycja.czlonkowie-edycja', ['czlonek'=>$czlonek, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $czlonek = Czlonkowie::findOrFail($id);
        $data = $request->all();
        $czlonek->update($data);
        $linkiDoListy='/listaCzlonkowie';
        $nazwaListy='Lista członków';
        session()->flash('komunikat', "Członek został zaktualizowany!");
        return view('tresc.edycja.czlonkowie-edycja', ['czlonek'=>$czlonek, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $czlonek = Czlonkowie::findOrFail($id);
        $czlonek->delete();
        session()->flash('komunikat', "Członek został usunięty!");
        return redirect('/listaCzlonkowie');
    }
    public function search(Request $request){

        /*$szukane=$request->get('szukane');
        $Wyniki=Propozycje::where('tytul', 'like', "%$szukane%")->orWhere('opis', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);*/
        return view('tresc.listy.czlonkowie-lista', compact('Wyniki'));
    }
}
