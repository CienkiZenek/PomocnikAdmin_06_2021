<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Zagadnienia extends Model
{
    use HasFactory;
    protected $table = 'zagadnienia';
    protected $fillable =['zagadnienie',
        'tresc',
        'wiecej',
        'zajawka_tytul',
        'zajawka',
        'zajawka_pokaz',
        'rozszerz',
        'dzial_id',
        'kategoria_id',
        'haslo_id',
        'dodal_user',
        'status',
        'historia_zmian',
        'dodal_user',
        'obrazek1',
        'obrazek2',
        'obrazek_karuzela',
        'tytulObrazek1',
        'tytulObrazek2',
        'podpisObrazek1',
        'podpisObrazek2',
        'ramka_mala',
        'ramka_duza',
        'linkSlownikPdf',
        'procent_tresci',
        'trescLinku'
        ];


    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function kategorie(){
        return $this->belongsTo(Kategorie::class, 'kategoria_id', 'id');}

    public function dzialy(){
        return $this->belongsTo(Dzialy::class, 'dzial_id', 'id');}

    public function hasla(){
        return $this->belongsTo(Hasla::class, 'haslo_id', 'id');}

    public function tagi(){
        return $this->belongsToMany(Tagi::class,'zagadnienia_tagi', 'zagadnienia_id','tagi_id');
    }

    public function getUrlobrazek1Attribute(){
        return Storage::url($this->obrazek1);}
    public function getUrlobrazek2Attribute(){
        return Storage::url($this->obrazek2);}

    public function setZagadnienieAttribute($value){
        $this->attributes['zagadnienie']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }


}
