<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Hasla extends Model
{
    use HasFactory;
    protected $table = 'hasla';
    protected $fillable =[
        'haslo',
        'tresc',
        'kategoria_id',
        'dzial_id',
        'status',
        'dodal_user',
        'historia_zmian',
        'linkSlownikPdf',
        'procent_tresci',
        'trescLinku'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    /*public function hasla(){
        return $this->belongsTo(Zagadnienia::class, 'haslo_id', 'id');}*/

    public function kategorie(){
        return $this->belongsTo(Kategorie::class, 'kategoria_id', 'id');}

    public function dzialy(){
        return $this->belongsTo(Dzialy::class, 'dzial_id', 'id');}

    public function zagadnienia(){
        return $this->hasMany(Zagadnienia::class, 'haslo_id', 'id');
    }
    public function tagi(){
        return $this->belongsToMany(Tagi::class,'hasla_tagi', 'hasla_id','tagi_id');
    }

    public function setHasloAttribute($value){
        $this->attributes['haslo']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
