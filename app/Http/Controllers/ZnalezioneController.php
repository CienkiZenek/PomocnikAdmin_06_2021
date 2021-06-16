<?php

namespace App\Http\Controllers;

use App\Zagadnienia;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Znalezione;
use App\Media;
use Illuminate\Support\Facades\Log;
use App\User;

class ZnalezioneController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'nazwa'=>'required|min:3',
            'media_id'=>'required',
            'rodzaj'=>'required',
            'dodal_user'=>'nullable',
            'dodal_user_nazwa'=>'nullable',
            'status'=>'required',
            'link'=>'required|url',
            'komentarz'=>'required|min:9'

        ])->validate();
        return $walidated;
    }

    public function index(){
        $Wyniki=Znalezione::orderBy('nazwa', 'asc')->paginate(10);
        return view('tresc.listy.znalezione-lista', compact('Wyniki'));
    }


public function formularzNowe(){

    $Media=Media::orderBy('nazwa', 'asc')->get();
    return view('tresc.dodawanie.znalezione-dodawanie', compact('Media'));
}


    public function create(Request $request)
    {
       // $data=$request->all();
       $data = $this->validator($request->all());
       // Log::info($data);
       $data = Arr::add($data, 'dodal_user', 1);
       $data = Arr::add($data, 'dodal_user_nazwa', 'Admin');

        Znalezione::create($data);
        session()->flash('komunikat', "Nowy link został dodan");
        return redirect(route('listaZnalezione'));
    }

    public function edit($id){

        $znal = Znalezione::findOrFail($id);
        $Media=Media::orderBy('nazwa', 'asc')->get();
        $linkiDoListy='/listaZnalezione';
        $nazwaListy='Lista znalezionych w sieci';
        $user=User::findOrFail($znal->dodal_user);
        return view('tresc.edycja.znalezione-edycja', ['znal'=>$znal, 'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy, 'Media'=>$Media, 'user'=>$user]);
    }


    public function update(Request $request, $id)
    {
        $znal = Znalezione::findOrFail($id);
        //$data = $request->all();

        $data = $this->validator($request->all());
       // Log::info($data);
        $znal->update($data);
        $Media=Media::orderBy('nazwa', 'asc')->get();
        $linkiDoListy='/listaZnalezione';
        $nazwaListy='Lista znalezionych w sieci';
        session()->flash('komunikat', "Znalezione zostało zaktualizowane!");
        return view('tresc.edycja.znalezione-edycja', ['znal'=>$znal, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy, 'Media'=>$Media]);

    }

    public function destroy($id)
    {
        $znal = Znalezione::findOrFail($id);
        $znal->delete();
        session()->flash('komunikat', "Znalezione miejsce zostało usunięte!");
        return redirect('/listaZnalezione');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Znalezione::where('nazwa', 'like', "%$szukane%")
            ->orWhere('link', 'like', "%$szukane%")
            ->orWhere('komentarz', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.znalezione-lista', compact('Wyniki'));
    }
}
