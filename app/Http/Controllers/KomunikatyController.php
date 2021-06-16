<?php

namespace App\Http\Controllers;

use App\Komunikaty;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
class KomunikatyController extends Controller
{
    public function index(){
        $Wyniki=Komunikaty::orderBy('created_at', 'desc')->paginate(9);
       // $Wyniki='';
        return view('tresc.listy.komunikaty-lista', compact('Wyniki'));
    }
    public function create(Request $request)
    {
        $data=$request->all();
        // $data = $this->validator($request->all());
        //$data = Arr::add($data, 'user_id', 10);
        Komunikaty::create($data);
        session()->flash('komunikat', "Nowy komunikat został dodany!");
        return redirect('/listaKomunikaty');
    }

    public function edit($id){

        $kom = Komunikaty::findOrFail($id);

        $linkiDoListy='/listaKomunikaty';
        $nazwaListy='Lista komunikatów';
        return view('tresc.edycja.komunikaty-edycja', ['kom'=>$kom, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $kom = Komunikaty::findOrFail($id);
        $data = $request->all();
        $kom->update($data);
        $linkiDoListy='/listaKomunikaty';
        $nazwaListy='Lista komunikatów';
        session()->flash('komunikat', "Komunikat został zaktualizowany!");
        return view('tresc.edycja.komunikaty-edycja', ['kom'=>$kom, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $kom = Komunikaty::findOrFail($id);
        $kom->delete();
        session()->flash('komunikat', "Komunikat został usunięty!");
        return redirect('/listaKomunikaty');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Komunikaty::where('tytul', 'like', "%$szukane%")
            ->orWhere('naglowek', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->orWhere('link', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.komunikaty-lista', compact('Wyniki'));
    }

}
