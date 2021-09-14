<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Zagadnienia;
use App\Hasla;
use App\Dzialy;
use App\Kategorie;
use App\Bibliografia;
use App\Pliki;
use App\Linki;
use App\Tagi;


class HaslaController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'haslo'=>'required|min:3',
            'dzial_id'=>'required',
            'kategoria_id'=>'required',
            'historia_zmian'=>'nullable',
            'dodal_user'=>'nullable',
           'procent_tresci'=>'required',
           /* 'status'=>'required',*/
            'tresc'=>'nullable',
            'linkSlownikPdf'=>'nullable',
            'trescLinku'=>'nullable'

        ])->validate();
        return $walidated;
    }
    public function index(){
        $Wyniki=Hasla::orderBy('haslo', 'asc')->paginate(10);
        //$Wyniki='';
        return view('tresc.listy.hasla-lista', compact('Wyniki'));
    }

    public function create(Request $request)
    {
       // $data=$request->all();
        $data = $this->validator($request->all());
       $data = Arr::add($data, 'dodal_user', 1);
        Hasla::create($data);
        session()->flash('komunikat', "Nowe haslo została dodana");
        return redirect('/listaHasla');
    }

    public function edit($id){

        $haslo = Hasla::findOrFail($id);
        $linkiDoListy='/listaHasla';
        $nazwaListy='Lista haseł';
        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get(); // lista działow, gdyby trzeab było zmienić dzial
        $KategorieStartowe=Kategorie::where('dzial_id', $haslo->dzial_id )->orderBy('kategoria', 'asc')->get(); // Wybieranie kategorii, które należą do tego samego działu, co kategoria tego hasła!
        /* Wybieranie Bibliografi, linków i plików powiązanych z tym haslem*/
        $biblografia=Bibliografia::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $linki=Linki::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $pliki=Pliki::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('created_at', 'asc')->get();

        return view('tresc.edycja.hasla-edycja', ['haslo'=>$haslo,
            'linkiDoListy'=>$linkiDoListy,
            'tagi'=>$tagi,
            'nazwaListy'=>$nazwaListy,
            'dzialy'=>$dzialy,
            'bibliografia'=>$biblografia,
            'linki'=>$linki,
            'pliki'=>$pliki,
            'KategorieStartowe'=>$KategorieStartowe]);
    }


    public function update(Request $request, $id)
    {
        $haslo = Hasla::findOrFail($id);

       //$data = $request->all();
       $data = $this->validator($request->all());
        $historia=$haslo['historia_zmian'].' Zmieniono (Admin): '.Now();
        $data['historia_zmian'] = $historia;
        $haslo->update($data);
        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        $linkiDoListy='/listaHasla';
        $nazwaListy='Lista haseł';
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get(); // lista działow, gdyby trzeab było zmienić dzial
        $KategorieStartowe=Kategorie::where('dzial_id', $haslo->dzial_id )->orderBy('kategoria', 'asc')->get(); // Wybieranie kategorii, które należą do tego samego działu, co kategoria tego hasła!
        /* Wybieranie Bibliografi, linków i plików powiązanych z tym haslem*/
        $biblografia=Bibliografia::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $linki=Linki::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $pliki=Pliki::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('created_at', 'asc')->get();

        session()->flash('komunikat', "Hasło zostało zaktualizowane!");

        return view('tresc.edycja.hasla-edycja', ['haslo'=>$haslo,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy,
            'tagi'=>$tagi,
            'dzialy'=>$dzialy,
            'bibliografia'=>$biblografia,
            'linki'=>$linki,
            'pliki'=>$pliki,
            'KategorieStartowe'=>$KategorieStartowe]);

    }

    public function destroy($id)
    {
        $haslo = Hasla::findOrFail($id);
        /*Usuwanie powiązanych plików, linków i bibliografii*/
        $biblgrafie=Bibliografia::where('dzial', 'hasla')->where('id_pozycja', $id)->get();
        $linki=Linki::where('dzial', 'hasla')->where('id_pozycja', $id)->get();
        $pliki=Pliki::where('dzial', 'hasla')->where('id_pozycja', $id)->get();

        foreach ($biblgrafie as $bibl) {
            $bibl->delete();
        }
        foreach ($linki as $link) {
            $link->delete();
        }
        foreach ($pliki as $plik) {
            $plik->delete();
            Storage::delete($plik->plik);
        }
        $haslo->delete();
        session()->flash('komunikat', "Hasło zostało usunięte!");
        return redirect('/listaHasla');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Hasla::where('haslo', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.hasla-lista', compact('Wyniki'));
    }

    public function noweFormularz(){

        $Wyniki=Dzialy::orderBy('dzial', 'asc')->get();
        return view('tresc.dodawanie.hasla-dodawanie', ['Wyniki'=>$Wyniki]);
    }

    public function listaRozwijana (Request $request){

        $haslaLista=Hasla::where('kategoria_id', $request->id)->get();
        return response()->json($haslaLista);
    }



    // funkcja, która jest wywoływan po dodaniu/odłaczeniu tagu do hasła - identyczn jak edit(),
    // ale jest dodatkowo przekazywana zmienna 'tagiZmiana'=>'tak', która powoduje przewinięcie okna do sekcji z tagami

    public function haslaPoTagi($id)
    {

        $haslo = Hasla::findOrFail($id);
        $linkiDoListy='/listaHasla';
        $nazwaListy='Lista haseł';
        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get(); // lista działow, gdyby trzeab było zmienić dzial
        $KategorieStartowe=Kategorie::where('dzial_id', $haslo->dzial_id )->orderBy('kategoria', 'asc')->get(); // Wybieranie kategorii, które należą do tego samego działu, co kategoria tego hasła!
        /* Wybieranie Bibliografi, linków i plików powiązanych z tym haslem*/
        $biblografia=Bibliografia::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $linki=Linki::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $pliki=Pliki::where('dzial', 'hasla')->where('id_pozycja', $id)->orderBy('created_at', 'asc')->get();

        return view('tresc.edycja.hasla-edycja', ['haslo'=>$haslo,
            'linkiDoListy'=>$linkiDoListy,
            'tagi'=>$tagi,
            'nazwaListy'=>$nazwaListy,
            'dzialy'=>$dzialy,
            'bibliografia'=>$biblografia,
            'linki'=>$linki,
            'pliki'=>$pliki,
            'KategorieStartowe'=>$KategorieStartowe,
            'tagiZmiana'=>'Tak']);

    }

    public function tagDodaj(Request $request){
        $haslo = Hasla::findOrFail($request->haslo_id)->tagi()->attach($request->tag_id);

    }
    public function tagUsun(Request $request){
        $haslo = Hasla::findOrFail($request->haslo_id)->tagi()->detach($request->tag_id);

    }

}
