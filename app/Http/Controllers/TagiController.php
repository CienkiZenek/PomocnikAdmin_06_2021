<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Tagi;
use App\Zagadnienia;


class TagiController extends Controller
{
    protected function validator($data){
        $walidated= Validator::make($data, [
            'nazwa'=>'required|min:3'
        ])->validate();
        return $walidated;
    }


    public function index(){
        $Wyniki=Tagi::orderBy('nazwa', 'asc')->paginate(9);

        return view('tresc.listy.tagi-lista', compact('Wyniki'));
    }

    public function create(Request $request)
    {
       /* $data = $request->validate([
            'nazwa'=>'required|min:3'
        ]);*/
        $data = $this->validator($request->all());

        //$data=$request->all();
        $data = Arr::add($data, 'dodal_user', 1);
        Tagi::create($data);
        session()->flash('komunikat', "Nowy tag została dodana");
        return redirect('/listaTagi');
    }

    public function edit($id){

        $tag = Tagi::findOrFail($id);
        $linkiDoListy='/listaTagi';
        $nazwaListy='Lista tagów';
        return view('tresc.edycja.tagi-edycja', ['tag'=>$tag, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $tag = Tagi::findOrFail($id);
      //  $data = $request->all();

        $data = $this->validator($request->all());
        $tag->update($data);
        $linkiDoListy='/listaTagi';
        $nazwaListy='Lista tagów';
        session()->flash('komunikat', "Tag został zaktualizowany!");
        return view('tresc.edycja.tagi-edycja', ['tag'=>$tag, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $tag = Tagi::findOrFail($id);
        $tag->delete();
        session()->flash('komunikat', "Tag został usunięty!");
        return redirect('/listaTagi');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Tagi::where('nazwa', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.tagi-lista', compact('Wyniki'));
    }
}
