<?php

namespace App\Http\Controllers;

use App\Miejsca;
use App\Media;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\User;

class MiejscaController extends Controller
{

    protected function validator($data){

        $walidated= Validator::make($data, [
            'tytul'=>'required|max:200',
            'link'=>'required|url',
            'media_id'=>'required',
            'status'=>'required',
            'dodal_user'=>'nullable',
            'dodal_user_nazwa'=>'nullable',
            'opis'=>'nullable',
            'rodzaj'=>'required',


        ])->validate();

        return $walidated;
    }


    public function index(){
        $Wyniki=Miejsca::orderBy('created_at', 'desc')->paginate(9);
        return view('tresc.listy.miejsca-lista', compact('Wyniki'));
    }

    public function formularzNowe(){

        $Media=Media::orderBy('nazwa', 'asc')->get();
        return view('tresc.dodawanie.miejsca-dodawanie', compact('Media'));
    }


    public function create(Request $request)
    {
       //$data=$request->all();
        $data = $this->validator($request->all());
        $data = Arr::add($data, 'dodal_user', 1);
        $data = Arr::add($data, 'dodal_user_nazwa', 'Admin');
Miejsca::create($data);
        session()->flash('komunikat', "Informacja o nowym miejscu dyskusji zostało dodane");
        return redirect('/listaMiejsca');
    }

    public function edit($id){

        $miejsce = Miejsca::findOrFail($id);
        $Media=Media::orderBy('nazwa', 'asc')->get();
        $linkiDoListy='/listaMiejsca';
        $nazwaListy='Lista miejsc dyskusji';
        $user=User::findOrFail($miejsce->dodal_user);
        return view('tresc.edycja.miejsca-edycja', ['miejsce'=>$miejsce, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy, 'Media'=>$Media, 'user'=>$user]);
    }


    public function update(Request $request, $id)
    {
        $miejsce = Miejsca::findOrFail($id);
        $data = $request->all();
        $data = $this->validator($request->all());
        $miejsce->update($data);
        Log::info($data);
        $linkiDoListy='/listaMiejsca';
        $Media=Media::orderBy('nazwa', 'asc')->get();
        $nazwaListy='Lista miejsc dyskusji';
        session()->flash('komunikat', "Miejsce dyskusji zostało zaktualizowane!");
        return view('tresc.edycja.miejsca-edycja', ['miejsce'=>$miejsce, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy, 'Media'=>$Media]);
//return $data;
    }

    public function destroy($id)
    {
        $miejsca = Miejsca::findOrFail($id);
        $miejsca->delete();
        session()->flash('komunikat', "Miejsce dyskusji zostało usunięte!");
        return redirect('/listaMiejsca');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Miejsca::where('tytul', 'like', "%$szukane%")->orWhere('opis', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.miejsca-lista', compact('Wyniki'));
    }




}
