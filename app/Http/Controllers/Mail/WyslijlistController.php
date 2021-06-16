<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\ListUser;
use App\Mail\ListyIZSK;
use App\Mail\ListyWszyscy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\Listy;
use Illuminate\Support\Str;


class WyslijlistController extends Controller
{
   /* public $user;
    public $users;*/
    /*use App\User;
    public $user;

    public function __constructor(){


}*/

    /*public function wyslij(){
        $user=User::first();
        //return 'AAAAAAAAAAAAAAA';
        Mail::to('aaa@aaa.aa')->locale('pl')->send(new Listy());

        session()->flash('komunikat', "List został wysłany!");
        return redirect('/');
    }*/

    /*public function wyslijWszystkimTest(){
        $users=User::all();
        foreach ($users as $odbiorca) {
            Mail::to($odbiorca)->send(new Listy($odbiorca));
        }
        session()->flash('komunikat', "Listy do wszystkich zostały wysłane!");
        return redirect('/');

    }*/

    /*Formularz do listu */
    public function wyslijWszystkimForm(){
        return view('wiadomosciForm.formListWszyscy');
    }
    /*Formularz do listu */
    public function wyslijIZSKForm(){
        return view('wiadomosciForm.formListIZSK');
    }
    /*Formularz do listu do pojedyńczego użytkownika*/
    public function wyslijUserForm($user){
        $user2 = User::findOrFail($user);
        return view('wiadomosciForm.formListUser', ['user'=>$user2]);
            }

    /*Wysyłanie do listu do wszystkich*/
    public function wyslijWszystkim(Request $request){

        $tresc= $request['tresc'];
        $users=User::aktywni()->get();
        //$users=User::all();
        foreach ($users as $odbiorca) {

            if($odbiorca->hasVerifiedEmail()){
            Mail::to($odbiorca)->send(new ListyWszyscy($odbiorca, $tresc));

        }
        }
        session()->flash('komunikat', "Listy do wszystkich zostały wysłane!");
        return redirect(route('listy_do'));
        //return view('wiadomosciForm.formListWszyscy');
    }

    /*Wysyłanie do listu do członkow IZŚK*/
    public function wyslijIZSK(Request $request){

        $tresc= $request['tresc'];
        $users=User::izsk()->get();

        foreach ($users as $odbiorca) {
            if ($odbiorca->hasVerifiedEmail()) {
                Mail::to($odbiorca)->send(new ListyIZSK($odbiorca, $tresc));
            }
        }
        session()->flash('komunikat', "Listy do członków IZŚK zostały wysłane!");
        return redirect(route('listy_do'));

    }



    /*Wysyłanie do listu do pojedyńczego użytkownika*/

    public function wyslijUser(Request $request, User $user){

        //return view('wiadomosciForm.formListUser');
        //return $id;
        // session()->flash('komunikat', "List do użytkownika zostały wysłane!");
       //  return redirect(route('edycjaUzytkownika', $user));
      // return redirect(route('listy_do'));
        $tresc= $request['tresc'];
        Mail::to($user)->send(new ListUser($user, $tresc));
        //Mail::to($user)->send();
        session()->flash('komunikat', "List do użytkownika został wysłany!");
        return redirect(route('edycjaUzytkownika', $user));

    }

}
