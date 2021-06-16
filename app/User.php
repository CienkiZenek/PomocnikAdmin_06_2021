<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\MustVerifyEmail;
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'stan',
        'ranga',
        'uprawnienia',
        'izsk',
        'izsk_warunek',
        'imie',
        'nazwisko',
        'ulica_nazwa',
        'ulica_numer',
        'miejscowosc',
        'kod',
        'zgoda_regulamin',
        'listy_odbiera',
        'zgoda_listy_red',
        'zgoda_listy_innych'
    ];


    /**
     *
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function znalezione(){
        return  $this->hasMany(Znalezione::class, 'dodal_user', 'id');
    }

    public function miejsca(){
        return  $this->hasMany(Miejsca::class, 'dodal_user', 'id');
    }

    public function propozycje(){
        return  $this->hasMany(Propozycje::class, 'dodal_user', 'id');
    }
    public function uwagi_propozycje(){
        return  $this->hasMany(Propozycje_uwagi::class, 'dodal_user', 'id');
    }

    public function uwagi_zagadnienia(){
        return  $this->hasMany(Zagadnienia_uwagi::class, 'dodal_user', 'id');
    }

    public function scopeAktywni($query){
        return $query->where('stan','Aktywny'); }


    public function scopeIZSK($query){
        return $query->where('izsk', 'Tak')->where('izsk_warunek', true)->where('stan','Aktywny'); }



}
