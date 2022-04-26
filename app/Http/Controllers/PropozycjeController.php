<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Propozycje;
use App\User;
use App\Propozycje_uwagi;


class PropozycjeController extends Controller
{
    public function index($lista){

        switch ($lista) {

            case 'Wszystkie':
                $Wyniki=Propozycje::orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Nowa':
                $Wyniki=Propozycje::where('status', 'Nowa')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Oczekuje':
                $Wyniki=Propozycje::where('status', 'Oczekuje')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Wykorzystana':
                $Wyniki=Propozycje::where('status', 'Wykorzystana')->orderBy('created_at', 'asc')->paginate(12);
                break;
            case 'Archiwalna':
                $Wyniki=Propozycje::where('status', 'Archiwalna')->orderBy('created_at', 'asc')->paginate(12);
                break;

            case 'Usunięta':
                $Wyniki=Propozycje::where('status', 'Usunięta')->orderBy('created_at', 'asc')->paginate(12);
                break;
            default:
                $Wyniki=Propozycje::orderBy('created_at', 'asc')->paginate(12);
                break;
        }
       // $Wyniki=Propozycje::orderBy('created_at', 'asc')->paginate(12);
       // $Wyniki='';
        return view('tresc.listy.propozycje-lista', ['Wyniki'=>$Wyniki, 'lista'=>$lista]);
    }

    public function create(Request $request)
    {
        $data=$request->all();
        // $data = $this->validator($request->all());
        $data = Arr::add($data, 'user_id', 10);
        Propozycje::create($data);
        session()->flash('komunikat', "Nowa propozycja została dodana");
        return redirect('/listaPropozycje');
    }

    public function edit($id){

        $propozycja = Propozycje::findOrFail($id);
        $linkiDoListy='/listaPropozycje';
        $nazwaListy='Lista propozycji';
        $user=User::findOrFail($propozycja->dodal_user);
        // tworzenie zmienych z uwagami do propozycji - wg. ich statusu
        $uwagi_usuniete=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Usunięta')->orderBy('created_at', 'asc')->get();
        $uwagi_oczekujace=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Oczekuje')->orderBy('created_at', 'asc')->get();
        $uwagi_nowe=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Nowa')->orderBy('created_at', 'asc')->get();
        $uwagi_dodane=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Dodana')->orderBy('created_at', 'asc')->get();


        return view('tresc.edycja.propozycje-edycja', ['propozycja'=>$propozycja,
            'linkiDoListy'=>$linkiDoListy,
            'user'=>$user,
            'nazwaListy'=>$nazwaListy,
            'lista'=>'Wszystkie',
            'uwagi_usuniete'=>$uwagi_usuniete,
            'uwagi_oczekujace'=>$uwagi_oczekujace,
            'uwagi_nowe'=>$uwagi_nowe,
            'uwagi_dodane'=>$uwagi_dodane
            ]);
    }


    public function update(Request $request, $id)
    {
        $propozycja = Propozycje::findOrFail($id);
        $data = $request->all();
        $propozycja->update($data);
        $linkiDoListy='/listaPropozycje';
        $nazwaListy='Lista propozycji';
        $user=User::findOrFail($propozycja->dodal_user);
        // tworzenie zmienych z uwagami do propozycji - wg. ich statusu
        $uwagi_usuniete=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Usunięta')->orderBy('created_at', 'asc')->get();
        $uwagi_oczekujace=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Oczekuje')->orderBy('created_at', 'asc')->get();
        $uwagi_nowe=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Nowa')->orderBy('created_at', 'asc')->get();
        $uwagi_dodane=Propozycje_uwagi::where('propozycja_id', $id)->where('status', 'Dodana')->orderBy('created_at', 'asc')->get();


        session()->flash('komunikat', "Propozycja została zaktualizowana!");
        return view('tresc.edycja.propozycje-edycja', ['propozycja'=>$propozycja,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy,
            'user'=>$user,
            'lista'=>'Wszystkie',
            'uwagi_usuniete'=>$uwagi_usuniete,
            'uwagi_oczekujace'=>$uwagi_oczekujace,
            'uwagi_nowe'=>$uwagi_nowe,
            'uwagi_dodane'=>$uwagi_dodane
        ]);

    }

    public function destroy($id)
    {
        $propozycje = Propozycje::findOrFail($id);
        $propozycje->delete();
        session()->flash('komunikat', "Propozycja została usunięta!");
        return redirect(route('listaPropozycje', 'Wszystkie'));
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Propozycje::where('naglowek', 'like', "%$szukane%")->orWhere('tresc', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.propozycje-lista', compact('Wyniki'));
    }
}
