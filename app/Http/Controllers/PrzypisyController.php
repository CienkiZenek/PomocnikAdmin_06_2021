<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Przypisy;
use Illuminate\Support\Facades\Validator;

class PrzypisyController extends Controller
{

    protected function validator($data){
        $walidated= Validator::make($data, [
            'tresc'=>'required|min:3',
           'id_pozycja'=>'required',
           'numer'=>'required',
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
    public function create(Request $request)
    {
        $id_pozycja=$request->id_pozycja;
       // $data = $this->validator($request->all());
        $data=$request->all();
        Przypisy::create($data);
        session()->flash('komunikat', "Dodano nowy przypis do zagadnienia");
        return redirect(route('edycjaZagadnienia', $id_pozycja).'#przypisy');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function destroy($id)
    {
        $przypis = Przypisy::findOrFail($id);
        $id_pozycja=$przypis->id_pozycja;
        $przypis->delete();

            session()->flash('komunikat', "PrzypisyLiv do zagadnienia został usunięty!");
            return redirect(route('edycjaZagadnienia', $id_pozycja).'#przypisy');

    }
}
