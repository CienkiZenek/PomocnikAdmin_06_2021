<?php

namespace App\Http\Controllers;

use App\Bibliografia;
use App\Hasla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BibliografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validator($data){
        $walidated= Validator::make($data, [
            'tresc'=>'required|min:3',
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
       $data = $this->validator($request->all());
        //$data=$request->all();
        Bibliografia::create($data);


        if($dzial=='hasla'){
            session()->flash('komunikat', "Dodano nową pozycję bibliograficzną do hasła");
            return redirect(route('edycjaHasla', $id_pozycja).'#bibliografia');
        }
        else {
            session()->flash('komunikat', "Dodano nową pozycję bibliograficzną do zagadnienia");
            return redirect(route('edycjaZagadnienia', $id_pozycja).'#bibliografia');
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
        $bibl = Bibliografia::findOrFail($id);
        $id_pozycja=$bibl->id_pozycja;
        $bibl->delete();

        if($dzial=='hasla'){
            session()->flash('komunikat', "Pozycja bibliograficzna z hasła została usunięta!");
        return redirect(route('edycjaHasla', $id_pozycja).'#bibliografia');
        }
        else {
            session()->flash('komunikat', "Pozycja bibliograficzna z zagadnienia została usunięta!");
            return redirect(route('edycjaZagadnienia', $id_pozycja).'#bibliografia');
        }
    }
}
