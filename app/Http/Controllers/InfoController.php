<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Info;

class InfoController extends Controller
{
    public function index(){
        $Wyniki=Info::orderBy('created_at', 'desc')->paginate(9);
       // $Wyniki='';
        return view('tresc.listy.info-lista', compact('Wyniki'));
    }
    public function create(Request $request)
    {
        $data=$request->all();
        // $data = $this->validator($request->all());
        //$data = Arr::add($data, 'user_id', 10);
        Info::create($data);
        session()->flash('komunikat', "Nowe info zostało dodane");
        return redirect('/infoLista');
    }

    public function edit($id){

        $info = Info::findOrFail($id);
        $linkiDoListy='/listaInfo';
        $nazwaListy='Lista info';
        return view('tresc.edycja.Info-edycja', ['info'=>$info, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $info = Info::findOrFail($id);

        $data = $request->all();
        $info->update($data);
        $linkiDoListy='/listaInfo';
        $nazwaListy='Lista info';
        session()->flash('komunikat', "info zostało zaktualizowane!");
        return view('tresc.edycja.info-edycja', ['info'=>$info, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        $info->delete();
        session()->flash('komunikat', "Info zostało usunięte!");
        return redirect('/infoLista');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Info::orWhere('tytul', 'like', "%$szukane%")
            ->orWhere('naglowek', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->orWhere('link', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.info-lista', compact('Wyniki'));
    }
}
