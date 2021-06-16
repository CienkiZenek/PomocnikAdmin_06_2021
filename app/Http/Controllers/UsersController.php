<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Znalezione;
use App\Miejsca;
use App\Propozycje;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    public function index(){

        $Wyniki=User::orderBy('name', 'asc')->paginate(12);
        return view('tresc.listy.users-lista', compact('Wyniki'));
    }

    public function edit(User $user){

        $linkiDoListy='/listaUzytkownikow';
        $nazwaListy='Lista użytkowników';
                return view('tresc.edycja.user-edycja', ['user'=>$user, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }

    public function update(Request $request, User $user)
    {
//dd($request->all());
       // $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);

      //  Log::info($user);
        $linkiDoListy='/listaUzytkownikow';
        $nazwaListy='Lista użytkowników';
        session()->flash('komunikat', "Dane użytkownika zostały zaktualizowane!");
        return view('tresc.edycja.user-edycja', ['user'=>$user, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
       // $Wyniki=User::orderBy('name', 'asc')->paginate(12);
        session()->flash('komunikat', "Uzytkownik usunięty!");

        //return view('tresc.listy.users-lista', compact('Wyniki'))->with('komunikat', 'Uzytkownik usunięty!');
        return redirect('/listaUzytkownikow');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=User::where('name', 'like', "%$szukane%")
            ->paginate(12);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.users-lista', compact('Wyniki'));
    }

    public function znalezione(User $user){
//$znalezione=User::$user()->znalezione()->get();
$Wyniki=$user->znalezione()->paginate(8);
       // return $user->miejsca()->get();
      //return $Wyniki;
        return view('tresc.listy.znalezione-lista', ['Wyniki'=>$Wyniki, 'odUsera'=>'tak', 'user'=>$user]);
    }
    public function miejsca(User $user){
        $Wyniki=$user->miejsca()->paginate(8);
        return view('tresc.listy.miejsca-lista', ['Wyniki'=>$Wyniki, 'odUsera'=>'tak', 'user'=>$user]);
    }
    public function propozycje(User $user){
        return 'Prop';
    }

    public function uwagi(User $user){
        return 'Uwagi';
    }

}
