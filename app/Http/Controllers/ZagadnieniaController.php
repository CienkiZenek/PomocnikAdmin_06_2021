<?php

namespace App\Http\Controllers;

use App\Zagadnienia;
use App\Dzialy;
use App\Kategorie;
use App\Hasla;
use App\Tagi;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Services\TagiService;
use App\Bibliografia;
use App\Pliki;
use App\Linki;
use App\Przypisy;


class ZagadnieniaController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'zagadnienie'=>'required|min:3',
            'dzial_id'=>'required',
            'kategoria_id'=>'required',
            'haslo_id'=>'required',
            'status'=>'required',
            'procent_tresci'=>'required',
            'historia_zmian'=>'nullable',
            'dodal_user'=>'nullable',
            'tresc'=>'nullable',
            'w_skrocie'=>'nullable',
            'wiecej'=>'nullable',
            'zajawka'=>'nullable|max:210',
            'zajawka_pokaz'=>'nullable',

                         'rozszerz'=>'nullable',
                         'obrazek1'=>'nullable|image|max:4096',
                         'obrazek2'=>'nullable|image|max:4096',
                         'tytulObrazek1'=>'nullable',
                         'tytulObrazek2'=>'nullable',
                         'podpisObrazek1'=>'nullable',
                         'podpisObrazek2'=>'nullable',
                         'linkSlownikPdf'=>'nullable',/**/
            'trescLinku'=>'nullable'

        ])->validate();
        return $walidated;
    }


    public function index(){
         $Wyniki=Zagadnienia::orderBy('zagadnienie', 'asc')->paginate(10);
       // $Wyniki='';
        return view('tresc.listy.zagadnienia-lista', compact('Wyniki'));
    }

    public function karuzela(){
        $Wyniki=Zagadnienia::where('zajawka_pokaz', 'Tak')->paginate(10);
        // $Wyniki='';
        return view('tresc.listy.zagadnienia-lista', compact('Wyniki'));
    }

    public function nowyFormularz()
    {

        $dzialy=Dzialy::orderBy('dzial', 'asc')->get();
        return view('tresc.dodawanie.zagadnienia-dodawanie', ['dzialy'=>$dzialy]);
    }

    public function create(Request $request)
    {
       $data=$request->all();
       //$data = $this->validator($request->all());
        $data = Arr::add($data, 'dodal_user', 1);
        Zagadnienia::create($data);
        session()->flash('komunikat', "Nowe zagadnienie zostało dodane");
        return redirect(route('listaZagadnienia'));
    }

    public function edit($id){

        $zagadnienie = Zagadnienia::findOrFail($id);
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get();
        $KategorieStartowe=Kategorie::where('dzial_id', $zagadnienie->dzial_id )->orderBy('kategoria', 'asc')->get(); // Wybieranie kategorii, które należą do tego samego działu, co kategoria tego hasła!
        $HaslaStartowe=Hasla::where('kategoria_id', $zagadnienie->kategoria_id )->orderBy('haslo', 'asc')->get(); // Wybieranie haseł, które należą do tej samej kategorii, co hasło tego zagadnienia!

        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
         /* Wybieranie Przypisów, Bibliografi, linków i plików powiązanych z tym zagadnieniem*/
        $przypisy=Przypisy::where('id_pozycja', $id)->orderBy('numer', 'asc')->get();
        $biblografia=Bibliografia::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $linki=Linki::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $pliki=Pliki::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('created_at', 'asc')->get();


        $linkiDoListy='/listaZagadnienia';
        $nazwaListy='Lista zagadnień';
        return view('tresc.edycja.zagadnienia-edycja', ['zagadnienie'=>$zagadnienie,
            'dzialy'=>$dzialy,
            'tagi'=>$tagi,
            'kategorie'=>$KategorieStartowe,
            'hasla'=>$HaslaStartowe,
            'przypisy'=>$przypisy,
            'bibliografia'=>$biblografia,
            'linki'=>$linki,
            'pliki'=>$pliki,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy
        ]);
    }




    public function update(Request $request, $id)
    {
      //$data =$request->all();
      $data = $this->validator($request->all());
      /*dd($request['zagadnienie']);*/
      /*dd( $data);*/
        $zagadnienie = Zagadnienia::findOrFail($id);
        $historia=$zagadnienie['historia_zmian'].' Zmieniono (Admin): '.Now();
        $data['historia_zmian'] = $zagadnienie['historia_zmian'].' Zmieniono (Admin): '.Now();
        //$data['historia_zmian'] = $historia;

        // dodawanie/aktualizacja obrazków
        $oldObrazek1=$zagadnienie->obrazek1;
        $oldObrazek2=$zagadnienie->obrazek2;
        if(isset($data['obrazek1'])){
           // $path = $request->file('obrazek1')->store('obrazki');
            $path = $request->file('obrazek1')->storeAs(
                'obrazki', $request->file('obrazek1')->getClientOriginalName()
            );
            $data['obrazek1']=$path;
        }
        if(isset($data['obrazek2'])){
            //$path = $request->file('obrazek2')->store('obrazki');
            $path = $request->file('obrazek2')->storeAs(
                'obrazki', $request->file('obrazek2')->getClientOriginalName()
            );

            $data['obrazek2']=$path;
        }
        // AKTUALIZACJA WŁASCIWA:
        $zagadnienie->update($data);

        if(isset($data['obrazek1'])) {
            Storage::delete($oldObrazek1);
        }
        if(isset($data['obrazek2'])) {
            Storage::delete($oldObrazek2);
        }
// zmienne do przekazania do widoku:
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get();
        $KategorieStartowe=Kategorie::where('dzial_id', $zagadnienie->dzial_id )->orderBy('kategoria', 'asc')->get(); // Wybieranie kategorii, które należą do tego samego działu, co kategoria tego hasła!
        $HaslaStartowe=Hasla::where('kategoria_id', $zagadnienie->kategoria_id )->orderBy('haslo', 'asc')->get(); // Wybieranie haseł, które należą do tej samej kategorii, co hasło tego zagadnienia!

        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        /* Wybieranie Przypisów, Bibliografi, linków i plików powiązanych z tym zagadnieniem*/
        $przypisy=Przypisy::where('id_pozycja', $id)->orderBy('numer', 'asc')->get();
        $biblografia=Bibliografia::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $linki=Linki::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $pliki=Pliki::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('created_at', 'asc')->get();

        $linkiDoListy='/listaZagadnienia';
        $nazwaListy='Lista zagadnień';
        session()->flash('komunikat', "Zagadnienie zostało zaktualizowane!");
        return view('tresc.edycja.zagadnienia-edycja', ['zagadnienie'=>$zagadnienie,
            'dzialy'=>$dzialy,
            'tagi'=>$tagi,
            'kategorie'=>$KategorieStartowe,
            'hasla'=>$HaslaStartowe,
            'bibliografia'=>$biblografia,
            'przypisy'=>$przypisy,
            'linki'=>$linki,
            'pliki'=>$pliki,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $zagadnienie = Zagadnienia::findOrFail($id);
        $zagadnienie->delete();
        Storage::delete($zagadnienie->obrazek1);
        Storage::delete($zagadnienie->obrazek2);
        session()->flash('komunikat', "Kategoria zostało usunięte!");
        return redirect(route('listaZagadnienia'));
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Zagadnienia::where('zagadnienie', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->orWhere('w_skrocie', 'like', "%$szukane%")
            ->orWhere('wiecej', 'like', "%$szukane%")
            ->orWhere('zajawka', 'like', "%$szukane%")
            ->orWhere('rozszerz', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.zagadnienia-lista', compact('Wyniki'));
    }

    // funkcja, która jest wywoływan po dodaniu/odłaczeniu tagu do zagadnienia - identyczn jak edit(),
    // ale jest dodatkowo przekazywana zmienna 'tagiZmiana'=>'tak', która powoduje przewinięcie okna do sekcji z tagami

    public function zagadnieniaPoTagi($id){

        $zagadnienie = Zagadnienia::findOrFail($id);
        // zmienne do przekazania do widoku:
        $dzialy=Dzialy::orderBy('dzial', 'asc')->get();
        $KategorieStartowe=Kategorie::where('dzial_id', $zagadnienie->dzial_id )->orderBy('kategoria', 'asc')->get(); // Wybieranie kategorii, które należą do tego samego działu, co kategoria tego hasła!
        $HaslaStartowe=Hasla::where('kategoria_id', $zagadnienie->kategoria_id )->orderBy('haslo', 'asc')->get(); // Wybieranie haseł, które należą do tej samej kategorii, co hasło tego zagadnienia!

        $tagi=Tagi::orderBy('nazwa', 'asc')->get();
        /* Wybieranie Bibliografi, linków i plików powiązanych z tym haslem*/
        $biblografia=Bibliografia::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $linki=Linki::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('tresc', 'asc')->get();
        $pliki=Pliki::where('dzial', 'zagadnienia')->where('id_pozycja', $id)->orderBy('created_at', 'asc')->get();
        $przypisy=Przypisy::where('id_pozycja', $id)->orderBy('numer', 'asc')->get();

        $linkiDoListy='/listaZagadnienia';
        $nazwaListy='Lista zagadnień';
        session()->flash('komunikat', "Tagi zostały zmienione!");

        return view('tresc.edycja.zagadnienia-edycja', ['zagadnienie'=>$zagadnienie,
            'dzialy'=>$dzialy,
            'tagi'=>$tagi,
            'kategorie'=>$KategorieStartowe,
            'hasla'=>$HaslaStartowe,
            'bibliografia'=>$biblografia,
            'przypisy'=>$przypisy,
            'linki'=>$linki,
            'pliki'=>$pliki,
            'linkiDoListy'=>$linkiDoListy,
            'nazwaListy'=>$nazwaListy,
            'tagiZmiana'=>'Tak',]);

    }


    public function tagDodaj(Request $request){
        $zagadnienie = Zagadnienia::findOrFail($request->zagadnienia_id)->tagi()->attach($request->tag_id);
        //DB::table('zagadnienia_tagi')->insert(['zagadnienia_id' => $request->haslo_id,'tagi_id' => $request->tag_id]);

    }
    public function tagUsun(Request $request){
        $zagadnienie = Zagadnienia::findOrFail($request->zagadnienia_id)->tagi()->detach($request->tag_id);

    }



}
