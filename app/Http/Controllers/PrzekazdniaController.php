<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Przekazdnia;
use App\Tagi;

class PrzekazdniaController extends Controller
{
    protected function validator($data){

        $walidated= Validator::make($data, [
            'tytul'=>'required|min:10',
                        'status'=>'required',
                        'naglowek'=>'nullable',
                        'tresc'=>'nullable',
                        'ramka1'=>'nullable',
                        'ramka2'=>'nullable',
            


        ])->validate();

        return $walidated;
    }


    public function index(){
        $Wyniki=Przekazdnia::orderBy('created_at', 'desc')->paginate(9);
        return view('tresc.listy.przekazdnia-lista', compact('Wyniki'));
    }

    public function nowyFormularz(){


        return view('tresc.dodawanie.przekazdnia-dodawanie');
    }


    public function create(Request $request)
    {
        //$data=$request->all();
        $data = $this->validator($request->all());
        $data = Arr::add($data, 'dodal_user', 1);
        $data = Arr::add($data, 'dodal_user_nazwa', 'Redaktor naczelny');
        Przekazdnia::create($data);
        session()->flash('komunikat', "Nowy Przekaz dnia został dodany");
        return redirect(route('listaPrzekazDnia'));
    }

    public function edit($id){

        $przekaz = Przekazdnia::findOrFail($id);
        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        $linkiDoListy='/listaPrzekazDnia';
        $nazwaListy='Lista Przekazów dnia';

        return view('tresc.edycja.przekazdnia-edycja', ['przekaz'=>$przekaz,
            'tagi'=>$tagi,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $przekaz = Przekazdnia::findOrFail($id);
       // $data = $request->all();
        $data = $this->validator($request->all());
        $przekaz->update($data);
       // Log::info($data);
        $linkiDoListy='/listaPrzekazDnia';
        $nazwaListy='Lista Przekazów dnia';
        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        session()->flash('komunikat', "Przekaz dnia został zaktualizowany!");
        return view('tresc.edycja.przekazdnia-edycja', ['przekaz'=>$przekaz,
            'tagi'=>$tagi,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy]);
//return $data;
    }

    public function destroy($id)
    {
        $przekazdnia = Przekazdnia::findOrFail($id);
        $przekazdnia->delete();
        session()->flash('komunikat', "Przekaz dnia został usunięty!");
        return redirect('/listaPrzekazDnia');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Przekazdnia::where('tytul', 'like', "%$szukane%")
            ->orWhere('naglowek', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->orWhere('ramka1', 'like', "%$szukane%")
            ->orWhere('ramka2', 'like', "%$szukane%")
            ->paginate(9);
               $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.przekazdnia-lista', compact('Wyniki'));
    }



    public function zagadnieniaPoTagi($id){

        $przekaz = Przekazdnia::findOrFail($id);
        $linkiDoListy='/listaPrzekazDnia';
        $nazwaListy='Lista Przekazów dnia';
        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        session()->flash('komunikat', "Powiązania ze słowami kluczowymi zostały zmienione!");
        return view('tresc.edycja.przekazdnia-edycja', ['przekaz'=>$przekaz,
            'tagi'=>$tagi,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy,
            'tagiZmiana'=>'Tak'
            ]);

    }

    public function tagDodaj(Request $request){
        $przekaz = Przekazdnia::findOrFail($request->przekazdnia_id)->tagi()->attach($request->tag_id);


    }
    public function tagUsun(Request $request){
        $przekaz = Przekazdnia::findOrFail($request->przekazdnia_id)->tagi()->detach($request->tag_id);

    }

}
