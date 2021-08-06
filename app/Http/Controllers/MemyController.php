<?php

namespace App\Http\Controllers;

use App\Memy;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class MemyController extends Controller
{


    protected function validator($data){
        $walidated= Validator::make($data, [
            'podpis'=>'required|min:3',
            'mem'=>'required|image|max:1024',
            'status'=>'required',
            'tytul'=>'required'

        ])->validate();
        return $walidated;
    }
    protected function validatorUpdate($data){
        $walidated= Validator::make($data, [
            'podpis'=>'required|min:3',
            'mem'=>'nullable',
            'status'=>'required',
            'tytul'=>'required'

        ])->validate();
        return $walidated;
    }

    public function index(){
        $Wyniki=Memy::orderBy('podpis', 'asc')->paginate(12);
       // $Wyniki='';
        return view('tresc.listy.memy-lista', compact('Wyniki'));
    }
    public function create(Request $request)
    {
        //$data=$request->all();
         $data = $this->validator($request->all());

        if(isset($data['mem'])) {
            //$path = $request->file('mem')->store('memy');
            $path = $request->file('mem')->storeAs(
                'memy', $request->file('mem')->getClientOriginalName()
            );

            $data['mem'] = $path;
        }
        $data = Arr::add($data, 'dodal_user', 1);
        Memy::create($data);
        session()->flash('komunikat', "Nowy mem została dodana");
        return redirect('/listaMemy');
    }

    public function edit($id){

        $mem = Memy::findOrFail($id);
        $linkiDoListy='/listaMemy';
        $nazwaListy='Lista memów';
        return view('tresc.edycja.memy-edycja', ['mem'=>$mem, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);
    }


    public function update(Request $request, $id)
    {
        $mem = Memy::findOrFail($id);
        //$data = $request->all();
        $oldMem=$mem->mem;
        $data = $this->validatorUpdate($request->all());
        if(isset($data['mem'])) {
            //$path = $request->file('mem')->store('memy');
            $path = $request->file('mem')->storeAs(
                'memy', $request->file('mem')->getClientOriginalName()
            );
            $data['mem']=$path;
        }
        $mem->update($data);

        if(isset($data['mem'])) {
            Storage::delete($oldMem);
        }
        $linkiDoListy='/listaMemy';
        $nazwaListy='Lista memów';
        session()->flash('komunikat', "Mem został zaktualizowany!");
        return view('tresc.edycja.memy-edycja', ['mem'=>$mem, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);

    }

    public function destroy($id)
    {
        $mem = Memy::findOrFail($id);
        $mem->delete();
        Storage::delete($mem->mem);
        session()->flash('komunikat', "Mem został usunięty!");
        return redirect('/listaMemy');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Memy::where('podpis', 'like', "%$szukane%")->orWhere('opis', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.memy-lista', compact('Wyniki'));
    }
}
