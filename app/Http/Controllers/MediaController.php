<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class MediaController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'nazwa'=>'required|min:3',
            'link'=>'nullable',
            'logo'=>'nullable'

        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Media::orderBy('nazwa', 'asc')->paginate(10);
        return view('tresc.listy.media-lista', compact('Wyniki'));
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());
        $path = $request->file('logo')->store('logaMedia');
        $data['logo']=$path;
        Media::create($data);
        session()->flash('komunikat', "Nowe medium zostało dodane!");
        return redirect('/listaMedia');
    }



    public function edit($id)
    {
        $medium = Media::findOrFail($id);
        $linkiDoListy='/listaMedia';
        $nazwaListy='Lista mediów';
        return view('tresc.edycja.media-edycja', ['medium'=>$medium, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);


    }



    public function update(Request $request, $id)
    {
        $medium = Media::findOrFail($id);
        $data = $this->validator($request->all());



        if(isset($data['logo'])) {
            $oldLogo=$medium->logo;
            $path = $request->file('logo')->store('logaMedia');
            $data['logo']=$path;
        }
        $medium->update($data);
        if(isset($data['logo'])) {
            Storage::delete($oldLogo);
        }

        $linkiDoListy='/listaMedia';
        $nazwaListy='Lista mediów';
        session()->flash('komunikat', "Medium został zaktualizowany!");
        return view('tresc.edycja.media-edycja', ['medium'=>$medium, 'linkiDoListy'=>$linkiDoListy, 'nazwaListy'=>$nazwaListy]);


    }

    public function destroy($id)
    {
        $medium = Media::findOrFail($id);
        $medium->delete();
        if(isset($medium['logo'])) {
            Storage::delete($medium->logo);
        }


        session()->flash('komunikat', "Medium zostało usunięte!");
        return redirect('/listaMedia');
    }
    public function search(Request $request){

        $szukane=$request->get('szukane');
        $Wyniki=Media::where('nazwa', 'like', "%$szukane%")
            ->paginate(9);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.media-lista', compact('Wyniki'));
    }

}
