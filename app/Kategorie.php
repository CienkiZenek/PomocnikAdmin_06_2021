<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class Kategorie extends Model
{
    use HasFactory;
    protected $table = 'kategorie';
    protected $fillable =['kategoria', 'opis', 'dzial_id', 'dodal_user', 'status', 'dodal_user'];


    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

   public function dzialy(){
        return $this->belongsTo(Dzialy::class, 'dzial_id', 'id');}

    public function hasla(){
        return $this->hasMany(Zagadnienia::class, 'kategoria_id', 'id');
    }
    public function setKategoriaAttribute($value){
        $this->attributes['kategoria']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
}
