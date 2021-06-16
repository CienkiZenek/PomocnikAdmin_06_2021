<?php

namespace App\Http\Controllers;

use App\Dzialy;
use App\Kategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
class DzialyController extends Controller
{
    protected function validator($data){
        $walidated= Validator::make($data, [
            'dzial'=>'required|min:3',
            'status'=>'required',
            'opis'=>'nullable'
        ])->validate();
        return $walidated;
    }

    public function index(){
        //$Wyniki=Dzialy::orderBy('dzial', 'asc')->get();
        $Wyniki=Dzialy::orderBy('dzial', 'asc')->paginate(10);
        //$Wyniki='';
        return view('tresc.listy.dzialy-lista', compact('Wyniki'));
    }

    public function create(Request $request)
    {
       // $data=$request->all();
        $data = $this->validator($request->all());
        // $data = $this->validator($request->all());
        $data = Arr::add($data, 'dodal_user', 10);
        Dzialy::create($data);
        session()->flash('komunikat', "Nowy dział został dodan");
        return redirect('/listaDzialy');
    }

    public function edit($slug){

        //$dzial = Dzialy::findOrFail($id);
        $dzial = Dzialy::whereSlug($slug)->firstOrFail();

        $linkiDoListy='/listaDzialy';
        $nazwaListy='Lista działów';
        return view('tresc.edycja.dzialy-edycja', ['dzial'=>$dzial, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $dzial = Dzialy::findOrFail($id);

       // $data = $request->all();
        $data = $this->validator($request->all());
        $dzial->update($data);

        session()->flash('komunikat', "Dział został zaktualizowany!");
        $linkiDoListy='/listaDzialy';
        $nazwaListy='Lista działów';
        return view('tresc.edycja.dzialy-edycja', ['dzial'=>$dzial, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $dzial = Dzialy::findOrFail($id);
        // sprawdzenie czy nie ma kategorii w tym dziale
        $katDzial=Kategorie::where('dzial_id', $dzial->id)->get();
if($katDzial->count()>0) {
    session()->flash('komunikat', "Dział NIE może być usunięty!");
    //return redirect('/dzialy/'.$id);
    return redirect()->route('edycjaDzialy',$id);
}
        if($katDzial->count()==0) {
    $dzial->delete();
    session()->flash('komunikat', "Dział został usunięty!");
            return redirect('/listaDzialy');
}





    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Dzialy::where('dzial', 'like', "%$szukane%")->orWhere('opis', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.dzialy-lista', compact('Wyniki'));
    }
}
