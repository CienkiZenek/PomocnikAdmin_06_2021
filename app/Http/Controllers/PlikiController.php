<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Pliki;

class PlikiController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'plik'=>'required|file',
            'plik_nazwa'=>'required|file',
            'dzial'=>'required',
            'id_pozycja'=>'required',
            'dodal_user'=>'required'
        ])->validate();
        return $walidated;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $dzial)
    {
        $id_pozycja=$request->id_pozycja;
       //$data = $this->validator($request->all());
        $data=$request->all();

        if(isset($data['plik'])) {
            //$path = $request->file('plik')->store('pliki_bibliograf', '');
            $path = $request->file('plik')->storeAs(
                'pliki_bibliograf', $request->file('plik')->getClientOriginalName()
            );
            $data['plik'] = $path;
        }
        //$data = Arr::add($data, 'dodal_user', 1);
        Pliki::create($data);


        if($dzial=='hasla'){
            session()->flash('komunikat', "Dodano nowy plik do hasła!");
            return redirect(route('edycjaHasla', $id_pozycja).'#pliki');
        }
        else {
            session()->flash('komunikat', "Dodano nowy plik do zagadnienia!");
            return redirect(route('edycjaZagadnienia', $id_pozycja).'#pliki');
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $dzial)
    {
        $plik = Pliki::findOrFail($id);
        $id_pozycja=$plik->id_pozycja;
        $plik->delete();
        Storage::delete($plik->plik);

        if($dzial=='hasla'){
            session()->flash('komunikat', "Plik do hasła został usunięty!");
            return redirect(route('edycjaHasla', $id_pozycja).'#pliki');
        }
        else {
            session()->flash('komunikat', "Plik do zagadnienia został usunięty!");
            return redirect(route('edycjaZagadnienia', $id_pozycja).'#pliki');
        }

    }
}
