<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Dzialy extends Model
{
    use HasFactory;
    protected $table = 'dzialy';
    protected $fillable =['dzial', 'opis', 'dodal_user', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'dodal_user', 'id');}

    public function kategorie(){
        return $this->hasMany(Kategorie::class, 'dzial_id', 'id');
    }
    public function setDzialAttribute($value){
$this->attributes['dzial']=$value;
$this->attributes['slug']=Str::slug($value, '_');
    }

}
